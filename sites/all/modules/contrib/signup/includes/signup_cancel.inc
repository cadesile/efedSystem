<?php
// $Id: signup_cancel.inc,v 1.1.2.2 2008/12/20 04:28:56 dww Exp $


/**
 * @file
 * Code for the page to cancel a signup from a secure link.
 */

function signup_cancel_signup_page($sid, $token) {
  if (signup_valid_token($token, $sid, 'cancel')) {
    return drupal_get_form('signup_cancel_link_confirm_form', $sid);
  }
  drupal_set_message(t('Invalid link to cancel a signup.'), 'error');
  drupal_goto();
}

function signup_cancel_link_confirm_form($form_state, $sid) {
  $info = db_fetch_object(db_query("SELECT n.nid, n.title, s.* FROM {node} n INNER JOIN {signup_log} s ON n.nid = s.nid WHERE s.sid = %d", $sid));

  $form = array();
  $form['sid'] = array(
    '#type' => 'hidden',
    '#value' => $sid,
  );
  $form['nid'] = array(
    '#type' => 'hidden',
    '#value' => $info->nid,
  );
  $form['#submit'][] = 'signup_cancel_link_confirm_form_submit';

  // TODO: Should this include information to identify the username,
  // anon_mail, and possibly the custom signup form data, too?
  return confirm_form(
    $form,
    t('Are you sure you want to cancel the signup to %node_title?', array('%node_title' => $info->title)),
    'node/'. $info->nid,
    t('This action cannot be undone.'),
    t('Cancel signup'), t('Keep signup')
  );
}

function signup_cancel_link_confirm_form_submit($form, &$form_state) {
  signup_cancel_signup($form_state['values']['sid']);
  $form_state['redirect'] = 'node/'. $form_state['values']['nid'];
}

