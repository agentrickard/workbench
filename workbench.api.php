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
 * @param array $output
 *   A Render API array of content items, passed by reference.
 *
 * @see workbench_content()
 */
function hook_workbench_content_alter(&$output) {
  // Replace the default "Recent Content" view with our custom View.
  $output['workbench_recent_content']['#view_id'] = 'custom_view';
  $output['workbench_recent_content']['#view_display'] = 'block_2';
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
 * @see workbench_create()
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
 * @see workbench_block_view()
 */
function hook_workbench_block() {
  // Add editing information to this page (if it's a node).
  if ($node = \Drupal::routeMatch()->getParameter('node')) {
    if ($node->entityTypeId == 'node' && $node->access('update')) {
      return array(t('My Module: <em>You may edit this content.</em>'));
    }
    else {
      return array(t('My Module: <em>You may not edit this content.</em>'));
    }
  }
}
