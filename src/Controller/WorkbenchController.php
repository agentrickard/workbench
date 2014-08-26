<?php

/**
 * @file
 * Contains \Drupal\workbench\Controller\WorkbenchController
 */

namespace Drupal\workbench\Controller;

use Drupal\workbench\WorkbenchInterface;
use Drupal\Core\Controller\ControllerBase;

class WorkbenchController extends ControllerBase {

  /**
   * Returns the default Workbench page.
   */
  public function defaultPage() {
    $blocks = $this->moduleHandler()->invokeAll('workbench_content');
    $build['page'] = array(
      '#theme' => 'workbench_overview',
      '#header' => array('#markup' => 'Foo'),
      '#blocks' => array($blocks),
      '#footer' => array('#markup' => 'Bar'),
    );
    return $build;
  }

}
