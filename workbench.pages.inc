<?php

function workbench_page() {
  global $user;
  $output = check_plain($user->name);
  return $output;
}

/**
 * Simple page to show list of content type to create.
 */
function workbench_create() {
  $output = '<h1>' . t('Create new content') . '</h1>';
  $allowed = array();
  $types = node_type_get_types();
  foreach ($types as $type) {
    if (node_hook($type->type, 'form') && node_access('create', $type->type)) {
      $allowed[$type->type] = $type->name;
    }
  }
  if (empty($allowed)) {
    $output .= t('You cannot create any new content. Please contact the site administrator.');
  }
  else {
    $items = array();
    foreach ($allowed as $key => $value) {
      $items[] = l($value, "node/add/$key");
    }
    $output .= theme('item_list', array('items' => $items));
  }
  return $output;
}

function workbench_content() {
  $output = views_embed_view('workbench_content');
  return $output;
}

function workbench_review() {
  global $user;
  $output = check_plain($user->name);
  return $output;
}

function workbench_recent() {
  global $user;
  $output = check_plain($user->name);
  return $output;
}

function workbench_assets() {
  global $user;
  $output = check_plain($user->name);
  return $output;
}
