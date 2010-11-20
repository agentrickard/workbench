<?php

/**
 * Simple page to show list of content type to create.
 */
function workbench_create() {
  $output = '<h1>' . t('Create content') . '</h1>';

  $items = array();
  foreach (node_type_get_types() as $type) {
    if (node_hook($type->type, 'form') && node_access('create', $type->type)) {
      $items[$type->type] = array(
        'title' => $type->name,
        'href' => 'node/add/' . $type->type,
        'description' => $type->description,
        'localized_options' => array(),
      );
    }
  }

  if (empty($items)) {
    $output .= t('You cannot create any new content. Please contact the site administrator.');
  }
  else {
    $output .= theme('node_add_list', array('content' => $items));
  }

  return $output;
}

/**
 * Page callback for the workbench content page.
 */
function workbench_content() {
  $render = array('#markup' => '');
  // Allow other modules to add content here.
  drupal_alter('workbench_content', $render);
  return $render;
}
