<?php

namespace Drupal\workbench\Controller;

use Drupal\node\Controller\NodeController;
use Drupal\views\Views;
use Drupal\views\Plugin\Block\ViewsBlock;

/**
 * Class WorkbenchContentController.
 *
 * @package Drupal\workbench\Controller
 */
class WorkbenchContentController extends NodeController {

  /**
   * Simple page to show list of content type to create.
   *
   * @see hook_workbench_create_alter()
   *
   * @return array
   *    A Render API array of content creation options.
   */
  public function addPage() {
    $output = parent::addPage();
    // Allow other modules to add content here.
    \Drupal::moduleHandler()->alter('workbench_create', $output);

    return $output;
  }

  /**
   * Page callback for the workbench content page.
   *
   * Note that we add Views information to the array and render
   * the Views as part of the alter hook provided here.
   *
   * @see hook_workbench_content_alter()
   *
   * @return array
   *    A Render API array of content creation options.
   */
  public function content() {
    $blocks = array();
    // This left column is given a width of 35% by workbench.myworkbench.css.
    $blocks['workbench_current_user'] = array(
      '#title'        => t('My Profile'),
      '#view_id'      => 'workbench_current_user',
      '#view_display' => 'block_1',
      '#attributes'   => array('class' => array('workbench-left')),
    );
    // This right column is given a width of 65% by workbench.myworkbench.css.
    $blocks['workbench_edited'] = array(
      '#view_id'      => 'workbench_edited',
      '#view_display' => 'block_1',
      '#attributes'   => array('class' => array('workbench-right')),
    );
    $blocks['workbench_recent_content'] = array(
      '#view_id'      => 'workbench_recent_content',
      '#view_display' => 'block_1',
      '#attributes'   => array(
        'class' => array('workbench-full', 'workbench-spacer'),
      ),
    );

    // Allow other modules to alter the default page.
    \Drupal::moduleHandler()->alter('workbench_content', $blocks);

    $output = [];
    // ViewsBlock instance variables.
    $config = array();
    $definition = array();
    $definition['provider'] = 'views';
    $views_executable = \Drupal::service('views.executable');
    $view_storage = $this->entityManager()->getStorage('view');
    $user = $this->currentUser();

    foreach ($blocks as $key => $block) {
      if (!Views::getView($block['#view_id'])) {
        continue;
      }
      $view_id = $block['#view_id'];
      $display_id = $block['#view_display'];

      $block_id = "views_block:{$view_id}-{$display_id}";
      $plugin = new ViewsBlock($config, $block_id, $definition, $views_executable, $view_storage, $user);
      $build = $plugin->build();
      if (!isset($build['#attributes'])) {
        $build['#attributes'] = $block['#attributes'];
      }
      else {
        $build['#attributes'] = array_merge_recursive($build['#attributes'], $block['#attributes']);
      }
      $output[] = $build;
    }

    return array(
      'blocks'    => $output,
      '#prefix'   => '<div class="admin my-workbench">',
      '#suffix'   => '</div>',
      '#attached' => array(
        'library' => array('workbench/workbench.content'),
      ),
    );
  }

}
