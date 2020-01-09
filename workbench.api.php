<?php

/**
 * @file
 * API documentation file for Workbench.
 */

/**
 * Allows modules to alter the default Workbench landing page.
 *
 * This hook is a convenience function to be used instead of
 * hook_page_alter(). In addition to the normal Render API elements,
 * you may also specify a #view and #view_display attribute, both
 * of which are strings that indicate which View to render on the page.
 *
 * The left and right columns in this output are given widths of 35% and 65%
 * respectively by workbench.my-workbench.css.
 *
 * Workbench assumes that all elements on the page are Views, keyed by the
 * '#view_id' and '#view_display' elements of the $output array.
 *
 * If you wish to substitute another renderable element, you may do so by
 * unsetting those paramaters and providing a render array of your own.
 *
 * @param array $output
 *   A Render API array of content items, passed by reference.
 * @param $context
 *   A string context for the request, defaults to overview|edits|all.
 *
 * @return array
 *   A renderable array or an array keyed with a #view_id and #view_display
 *   to indicate which View display to load onto the page.
 *
 * @see WorkbenchContentController::renderBlocks()
 */
function hook_workbench_content_alter(&$output, $context = NULL) {
  // Replace the default "Recent Content" view with our custom View.
  $output['workbench_recent_content']['#view_id'] = 'custom_view';
  $output['workbench_recent_content']['#view_display'] = 'block_2';

  // Replace the 'workbench_current_user' view entirely.
  $output['workbench_current_user'] = [
    '#type' => 'markup',
    '#markup' => t('Welcome to Fantasy Island!')
  ];
}

/**
 * Allows modules to alter the default content creation page.
 *
 * Worekbench supplies a Create Content tab which emulates core's
 * node/add page. The render array for this page may be modified
 * by other modules.
 *
 * @param array $output
 *   A Render API array of content items, passed by reference.
 *
 * @see WorkbenchContentController::addPage()
 */
function hook_workbench_create_alter(&$output) {
  if (\Drupal::currentUser()->hasPermission('use workbench_media add form')) {
    $output['#content']['article']->set('description', 'hello world');
  }
}

/**
 * Return Workbench status information in a block.
 *
 * To reduce clutter, modules are encouraged to use this hook
 * to provide debugging and other relevant information.
 *
 * @return array
 *   An array of message strings to print. The preferred format
 *   is a one line string in the format Title: <em>Message</em>.
 *
 * @see WorkbenchBlock::build()
 */
function hook_workbench_block() {
  // Add editing information to this page (if it's a node).
  if ($node = \Drupal::routeMatch()->getParameter('node')) {
    if ($node->entityTypeId == 'node' && $node->access('update')) {
      return [t('My Module: <em>You may edit this content.</em>')];
    }
    else {
      return [t('My Module: <em>You may not edit this content.</em>')];
    }
  }
}
