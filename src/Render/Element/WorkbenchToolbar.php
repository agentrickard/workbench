<?php

namespace Drupal\workbench\Render\Element;

use Drupal\Core\Menu\MenuTreeParameters;
use Drupal\Core\Security\TrustedCallbackInterface;

/**
 * Generates the toolbar elements for Workbench.
 */
class WorkbenchToolbar implements TrustedCallbackInterface {

  /**
   * {@inheritdoc}
   */
  public static function trustedCallbacks() {
    return ['preRenderTray'];
  }

  /**
   * Render the Workbench toolbar tray.
   *
   * @param array $element
   *   The tray render array.
   *
   * @return array
   *   The tray render array with the Workbench items added.
   *
   * @see toolbar_prerender_toolbar_administration_tray()
   * @see drupal_render()
   */
  public static function preRenderTray(array $element) {
    $menu_tree = \Drupal::service('toolbar.menu_tree');
    $parameters = new MenuTreeParameters();
    $parameters->setMinDepth(1)->setMaxDepth(1);
    $tree = $menu_tree->load('workbench', $parameters);
    $manipulators = [
      ['callable' => 'menu.default_tree_manipulators:checkAccess'],
      ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort'],
      ['callable' => 'toolbar_menu_navigation_links'],
    ];
    $tree = $menu_tree->transform($tree, $manipulators);
    $element['administration_menu'] = $menu_tree->build($tree);
    return $element;
  }

}
