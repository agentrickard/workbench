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
    $build['page'] = array(
      '#markup' => 'Foo',
    );
    return $build;
  }

}
