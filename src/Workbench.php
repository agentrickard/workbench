<?php

/**
 * @file
 * Contains \Drupal\workbench\Workbench
 */

namespace Drupal\workbench;

use Drupal\workbench\WorkbenchInterface;

class Workbench implements WorkbenchInterface {

  /**
   * An array of links to render as part of the Workbench.
   */
  public $links = array();

  /**
   * Instantiate the Workbench links.
   */
  public function __construct() {
    $this->registerLinks();
  }

  /**
   * @inheritdoc
   */
  public function getLinks() {
    return $this->links;
  }

  /**
   * @inheritdoc
   */
  public function setLinks(array $links) {
    $this->links = $links;
  }

  /**
   * @inheritdoc
   */
  public function registerLinks() {
    $links = array();

    // @TODO: Inject the module handler?
    $this->setLinks($links);
  }


}
