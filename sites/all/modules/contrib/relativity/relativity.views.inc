<?php
// $Id: relativity.views.inc,v 1.1.2.1 2009/04/20 21:07:09 darius Exp $

/**
 * @file
 *
 */

function relativity_views_data() {
drupal_set_message('View hook called.');
  $data['relativity']['table']['group'] = t('Node Relativity');

  $data['relativity']['table']['base'] = array(
    'field' => 'nid',
    'title' => t('Patient Node ID'),
    'help' => t('The Node ID of the patient node whom the images belong to.'),
  );

  $data['relativity']['table']['join'] = array(
    'node' => array(
      'left_field' => 'nid',
      'field' => 'nid',
    ),
  );

  $data['relativity']['nid'] = array(
    'title' => t('Child Node ID'),
    'help' => t('The Node ID of the child node.'),
    'field' => array(
      'handler' => 'views_handler_field_node',
      'click sortable' => TRUE,
    ),
  );

  $data['relativity']['parent_nid'] = array(
    'title' => t('Parent Node ID'),
    'help' => t('The Node ID of the parent node.'),
    'field' => array(
      'handler' => 'views_handler_field',
      'click sortable' => TRUE,
    ),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Node'),
    ),
  );

  return $data;
}
