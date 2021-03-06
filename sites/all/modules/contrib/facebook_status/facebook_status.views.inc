<?php
// $Id$

/**
 * @file
 * Provide views data and handlers for the Facebook-style Statuses module.
 */

/**
 * Implementation of hook_views_data().
 */
function facebook_status_views_data() {
  //Basic table information.
  $data['facebook_status']['table']['group']  = t('Facebook-style Statuses');
  $data['users']['table']['join'] = array(
    'facebook_status' => array(
      'left_field' => 'uid',
      'field' => 'uid',
    ),
  );
  $data['facebook_status']['table']['join'] = array(
    'users' => array(
      'left_field' => 'uid',
      'field' => 'uid',
      'type' => 'INNER',
    ),
  );

  //Advertise this table as a possible base table.
  $data['facebook_status']['table']['base'] = array(
    'field' => 'uid',
    'title' => t('Facebook-style Statuses Updates'),
    'help' => t('Stores status updates.'),
    'weight' => 10,
  );

  //Declares the Status ID column.
  $data['facebook_status']['sid'] = array(
    'title' => t('Status ID'),
    'help' => t('The ID of the status update.'),
    'field' => array(
      'handler' => 'views_handler_field',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_numeric',
    ),
  );

  //Alias for Status ID to extend its use.
  $data['facebook_status']['sid_extra'] = array(
    'title' => t('Last Status per User'),
    'help' => t('Shows only the last status update for each user'),
    'filter' => array(
      'field' => 'sid',
      'handler' => 'facebook_status_views_handler_filter',
      'label' => t('Last Status per User'),
    ),
  );
  $data['facebook_status']['edit'] = array(
    'title' => t('Edit'),
    'help' => t('Shows a link to edit the status to users with permission to see it.'),
    'field' => array(
      'field' => 'sid',
      'handler' => 'facebook_status_views_handler_field_edit',
      'click sortable' => FALSE,
    ),
  );
  $data['facebook_status']['delete'] = array(
    'title' => t('Delete'),
    'help' => t('Shows a link to delete the status to users with permission to see it.'),
    'field' => array(
      'field' => 'sid',
      'handler' => 'facebook_status_views_handler_field_delete',
      'click sortable' => FALSE,
    ),
  );

  //Declares the Owner UID column.
  $data['facebook_status']['uid'] = array(
    'title' => t('User ID'),
    'help' => t('The User ID of the owner of the status.'),
    'field' => array(
      'handler' => 'views_handler_field',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_numeric',
    ),
  );

  //Declares the Poster UID column.
  $data['facebook_status']['pid'] = array(
    'title' => t('Poster UID'),
    'help' => t('The User ID of the poster of the status.'),
    'field' => array(
      'handler' => 'views_handler_field',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_numeric',
    ),
  );

  //Alias for Poster UID to use the name.
  $data['facebook_status']['pid_name'] = array(
    'title' => t('Poster Name'),
    'help' => t('The name of the user who posted the status.'),
    'field' => array(
      'field' => 'pid',
      'handler' => 'facebook_status_views_handler_field_poster',
      'click sortable' => FALSE,
    ),
    'filter' => array(
      'field' => 'pid',
      'handler' => 'views_handler_filter_user_name',
    ),
    'sort' => array(
      'field' => 'pid',
      'handler' => 'views_handler_sort',
    ),
    'argument' => array(
      'field' => 'pid',
      'handler' => 'views_handler_argument_user_uid',
    ),
  );

  //Alias for extras for the poster.
  $data['facebook_status']['pid_extra'] = array(
    'title' => t('Cross-Posting'),
    'help' => t('Handling that recognizes the difference between a user posting on its own profile and a user posting on another profile.'),
    'field' => array(
      'field' => 'pid',
      'handler' => 'facebook_status_views_handler_field_cross',
      'click sortable' => FALSE,
      'label' => t('Users'),
    ),
    'filter' => array(
      'field' => 'pid',
      'handler' => 'facebook_status_views_handler_filter_own',
      'label' => t('Restrict to own statuses'),
    ),
  );
  $data['facebook_status']['pid_extra_2'] = array(
    'title' => t('Not own statuses'),
    'help' => t("Does not show statuses posted to one's own profile."),
    'filter' => array(
      'field' => 'pid',
      'handler' => 'facebook_status_views_handler_filter_not_own',
      'label' => t("Restrict to others' statuses"),
    ),
  );
  $data['facebook_status']['crosspost_users_pics'] = array(
    'title' => t('Users with Pictures'),
    'help' => t("Either a themed username or the username of the poster and owner of the status, depending on the context, and including pictures."),
    'field' => array(
      'field' => 'pid',
      'handler' => 'facebook_status_views_handler_field_cross_pic',
      'click sortable' => FALSE,
      'label' => t('Users with Pictures'),
    ),
  );
  $data['facebook_status']['respond'] = array(
    'title' => t('Conversation link'),
    'help' => t('Links to the view of the conversation where appropriate.'),
    'field' => array(
      'field' => 'pid',
      'handler' => 'facebook_status_views_handler_field_respond',
      'click sortable' => FALSE,
      'label' => t('View conversation'),
    ),
  );

  //Declares the status message timestamp column.
  $data['facebook_status']['status_time'] = array(
    'title' => t('Created time'),
    'help' => t('The time the status message was posted.'),
    'field' => array(
      'handler' => 'views_handler_field_date',
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_date',
    ),
  );

  //Declares the status text column.
  $data['facebook_status']['status'] = array(
    'title' => t('Status text'),
    'help' => t('The text of the status update.'),
    'field' => array(
      'handler' => 'facebook_status_views_handler_field_status',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
  );

  return $data;
}

/**
 * Implementation of hook_views_data_alter().
 */
function facebook_status_views_data_alter(&$data) {
  $data['facebook_status']['users'] = array(
    'group' => t('Facebook-style Statuses'),
    'relationship' => array(
      'title' => t('Users'),
      'label' => t('Users'),
      'help' => t('Add a relationship to gain access to information related to the users who submitted the relevant statuses.'),
      'relationship table' => 'users',
      'relationship field' => 'uid',
      'base' => 'facebook_status',
      'field' => 'uid',
      'type' => 'INNER',
      'handler' => 'facebook_status_views_handler_relationship',
    ),
  );
}

/**
 * Implementation of hook_views_handlers().
 */
function facebook_status_views_handlers() {
  return array(
    'info' => array(
      'path' => drupal_get_path('module', 'facebook_status'),
    ),
    'handlers' => array(
      'facebook_status_views_handler_field_cross' => array(
        'parent' => 'views_handler_field',
      ),
      'facebook_status_views_handler_field_cross_pic' => array(
        'parent' => 'views_handler_field',
      ),
      'facebook_status_views_handler_field_delete' => array(
        'parent' => 'views_handler_field',
      ),
      'facebook_status_views_handler_field_edit' => array(
        'parent' => 'views_handler_field',
      ),
      'facebook_status_views_handler_field_poster' => array(
        'parent' => 'views_handler_field_user',
      ),
      'facebook_status_views_handler_field_respond' => array(
        'parent' => 'views_handler_field',
      ),
      'facebook_status_views_handler_field_status' => array(
        'parent' => 'views_handler_field',
      ),
      'facebook_status_views_handler_filter' => array(
        'parent' => 'views_handler_filter_boolean_operator',
      ),
      'facebook_status_views_handler_filter_own' => array(
        'parent' => 'views_handler_filter_boolean_operator',
      ),
      'facebook_status_views_handler_filter_not_own' => array(
        'parent' => 'views_handler_filter_boolean_operator',
      ),
      'facebook_status_views_handler_relationship' => array(
        'parent' => 'views_handler_relationship',
      ),
    ),
  );
}