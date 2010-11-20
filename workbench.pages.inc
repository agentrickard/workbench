<?php

/**
 * Page callback for the workbench content page.
 */
function workbench_content() {
  $render = array('#markup' => '');
  // Allow other modules to add content here.
  drupal_alter('workbench_content', $render);
  return $render;
}

/**
 * Simple page to show list of content type to create.
 */
function workbench_create() {
  $render = array('#markup' => '');
  $render['workbench_create_default'] = _workbench_create();

  // Allow other modules to add content here.
  drupal_alter('workbench_create', $render);
  return $render;
}

/**
 * Emulate node/add.
 */
function _workbench_create() {
  $render['#markup'] = '<h3>' . t('Create content') . '</h3>';

  // Build an array of links to content type creation forms.
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
    $render['#markup'] .= t('You cannot create any new content. Please contact the site administrator.');
  }
  else {
    // Theme the arrray of content type creation links using node.module's theme function.
    $render['#markup'] .= theme('node_add_list', array('content' => $items));
  }
  return $render;
}

