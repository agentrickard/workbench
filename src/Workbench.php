<?php

/**
 * @file
 * Contains \Drupal\workbench\Workbench
 */

namespace Drupal\workbench;

use Drupal\workbench\WorkbenchInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

class Workbench implements WorkbenchInterface {

  /**
   * An array of links to render as part of the Workbench.
   */
  public $links = array();

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Constructs a Workbench object.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct() {
    $this->moduleHandler = \Drupal::service('module_handler');
    $this->links = $this->registerLinks();
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

    // @TODO: Rewrite as a plugin?

    $links = $this->moduleHandler->invokeAll('workbench');

    $this->setLinks($links);
  }


}
