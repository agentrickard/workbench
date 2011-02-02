<?php

/**
 * @file
 *  Workbench page callbacks.
 *
 * @copyright (C) Copyright 2010 Palantir.net
 */

/**
 * Page callback for the workbench content page.
 */
function workbench_content() {
  $output = array();
  // Allow other modules to add content here.
  $output['#attributes'] = array('class' => array('admin'));
  $output['#theme'] = 'workbench_element';
  $output['workbench_current_user'] = array(
    '#title' => t('My Profile'),
    '#markup' => views_embed_view('workbench_current_user'),
    '#attributes' => array('class' => array('left', 'clearfix')),
    '#theme' => 'workbench_element',
  );
  $output['workbench_edited'] = array(
    '#title' => t('Content I\'ve Edited'),
    '#markup' => views_embed_view('workbench_edited', 'block_1'),
    '#attributes' => array('class' => array('right', 'clearfix')),
    '#theme' => 'workbench_element',
  );
  $output['workbench_recent_content'] = array(
    '#title' => t('All Recent Content'),
    '#markup' => views_embed_view('workbench_recent_content', 'block_1'),
    '#attributes' => array('class' => array('clearfix'), 'style' => array('clear: both;')),
    '#theme' => 'workbench_element',
  );
  drupal_alter('workbench_content', $output);
  return $output;
}

/**
 * Simple page to show list of content type to create.
 */
function workbench_create() {
  $render = array();
  $render['workbench_create_default'] = _workbench_create();

  // Allow other modules to add content here.
  drupal_alter('workbench_create', $render);
  return $render;
}

/**
 * Emulate node/add.
 */
function _workbench_create() {
  $render = array();
  $render['#markup'] = '<h3>' . t('Create content') . '</h3>';

  $item = menu_get_item('node/add');
  $content = system_admin_menu_block($item);

  if (!empty($content)) {
    // Theme the arrray of content type creation links using node.module's theme function.
    $render['#markup'] .= theme('node_add_list', array('content' => $content));
  }
  else {
    $render['#markup'] .= t('You cannot create any new content. Please contact the site administrator.');
  }

  return $render;
}

