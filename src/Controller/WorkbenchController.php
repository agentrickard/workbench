<?php

/**
 * @file
 * Contains \Drupal\workbench\Controller\WorkbenchController
 */

namespace Drupal\workbench\Controller;

use Drupal\workbench\WorkbenchInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\views\Views;

class WorkbenchController extends ControllerBase {

  public $blocks = array();
  public $renderedBlocks = array();

  /**
   * Returns the default Workbench page.
   */
  public function defaultPage() {
    $this->blocks = $this->moduleHandler()->invokeAll('workbench_content');
    $this->renderBlocks();
    $build['page'] = array(
      '#theme' => 'workbench_overview',
      '#header' => array('#markup' => 'Foo'),
      '#blocks' => $this->renderedBlocks,
      '#footer' => array('#markup' => 'Bar'),
    );
    return $build;
  }

  public function renderBlocks() {
    foreach ($this->blocks as $block) {
      if (isset($block['#view'])) {
        $view = Views::getView($block['#view']);
        $this->renderedBlocks[] = array(
          'title' => Views::getView($block['#view'])->getTitle(),
          'content' => views_embed_view($block['#view'], $block['#view_display'] ?: 'default'),
          'attributes' => isset($block['#attributes']['class']) ? implode(' ', $block['#attributes']['class']) : 'workbench-block',
        );
      }
      else {
        $this->renderedBlocks[] = array(
          'title' => $block['#title'],
          'content' => $block['#content'],
          'attributes' => isset($block['#attributes']['class']) ? implode(' ', $block['#attributes']['class']) : 'workbench-block',
        );
      }
    }
  }

}

