<?php
// $Id: data.views.inc,v 1.5 2009/07/19 13:32:45 alexb Exp $

/**
 * @file
 * Views hooks.
 */

/**
 * Implementation of hook_views_data().
 * 
 * Dynamically create views integration for any table Data manages.
 */
function data_views_data() {
  $data = array();

  $tables = data_get_all_tables();

  foreach ($tables as $table) {

    // Get schema and check wether there are field definitions.
    $schema = $table->get('table_schema');
    $meta = $table->get('meta');
    if (!isset($schema['fields'])) {
      continue;
    }

    $table_data = array();
    $table_data['table'] = array(
      'group' => $table->get('title'),
      );
    foreach ($schema['fields'] as $field_name => $field) {
      // If there is no label, generate one from field name.
      $title = empty($meta['fields'][$field_name]['label']) ? data_natural_name($field_name) : $meta['fields'][$field_name]['label'];

      $table_data[$field_name] = array(
        'title' => $title,
        'help' => $title,
        'field' => array(
          'handler' => _data_views_field_handler($field['type']),
          'help' => $title,
          'click sortable' => TRUE,
        ),
        'filter' => array(
          'handler' => _data_views_filter_handler($field['type']),
          'allow empty' => TRUE,
          'help' => t('Filter on %field', array('%field' => $title)),
        ),
        'argument' => array(
          'handler' => _data_viewsfield_argument($field['type']),
          'help' => $title,
        ),
        'sort' => array(
          'handler' => _data_viewsfield_sort($field['type']),
          'help' => t('Sort by %field', array('%field' => $title)),
        ),
      );      
    }

    // Tables with a primary key are base tables.
    if (isset($schema['primary key']) && count($schema['primary key']) >= 1) {
      $table_data['table']['base'] = array(
        'field' => current($schema['primary key']),
        'title' => $table->get('title'),
        'help' => t('Data table'),
        'weight' => 10, 
      );
    }

    // Add join information.
    if ($links = $table->get('links')) {
      $table_data['table']['join'] = array();
      foreach ($links as $link) {
        // @todo: See if left table has other tables it is linked to and link
        // all the way to the leftmost table.
        $table_data['table']['join'][$link['left_table']] = array(
          'left_field' => $link['left_field'],
          'field' => $link['right_field'],
          'type' => $link['inner_join'] ? 'INNER' : 'LEFT',
        );
      }
    }

    $data[$table->get('name')] = $table_data;
  }

  return $data;
}

/**
 * Return a views handler string for a given field type.
 *
 * @param $field_type
 *   Schema API field type.
 * @return
 *   Views handler string.
 */
function _data_views_filter_handler($type) {
  switch ($type) {
    case 'float':
    case 'numeric':
      return 'views_handler_filter_float';
    case 'int':
    case 'serial':
      return 'views_handler_filter_numeric';
    case 'datetime':
      // @TODO: make this conditional on whether the time is stored as a timestamp/datetime
      if (module_exists('date_api')) {
        return 'date_api_filter_handler';
      }
      return 'views_handler_filter_date';
  }
  return 'views_handler_filter_string';
}

// Return a field handler string for a given field type.
function _data_views_field_handler($type) {
  switch ($type) {
    case 'int':
    case 'float':
    case 'serial':
    case 'numeric':
      return 'views_handler_field_numeric';
    case 'datetime':
      return 'views_handler_field_date';
  }
  return 'views_handler_field';
}

// Return a argument handler string for a given field type.
function _data_viewsfield_argument($type) {
  switch ($type) {
    case 'int':
    case 'float':
    case 'serial':
    case 'numeric':
      return 'views_handler_argument_numeric';
    case 'datetime':
      return 'views_handler_argument_date';
    case 'varchar':
     return 'views_handler_argument_string';
  }
  return 'views_handler_argument';
}

// Return a sort handler string for a given field type.
function _data_viewsfield_sort($type) {
  switch ($type) {
    case 'datetime':
      return 'views_handler_sort_date';
  }
  return 'views_handler_sort';
}
