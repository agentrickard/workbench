<?php

namespace Drupal\workbench\Controller;

use Drupal\node\Controller\NodeController;
use Drupal\views\Views;
use Drupal\views\Plugin\Block\ViewsBlock;
use Drupal\views\Plugin\views\display\Embed;

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
    $blocks = [];
    // This left column is given a width of 35% by workbench.myworkbench.css.
    $blocks['workbench_current_user'] = [
      '#title'        => t('My Profile'),
      '#view_id'      => 'workbench_current_user',
      '#view_display' => 'block_1',
      '#attributes'   => ['class' => ['workbench-left']],
    ];
    // This right column is given a width of 65% by workbench.myworkbench.css.
    $blocks['workbench_edited'] = [
      '#view_id'      => 'workbench_edited',
      '#view_display' => 'block_1',
      '#attributes'   => ['class' => ['workbench-right']],
    ];
    $blocks['workbench_recent_content'] = [
      '#view_id'      => 'workbench_recent_content',
      '#view_display' => 'block_1',
      '#attributes'   => [
        'class' => ['workbench-full', 'workbench-spacer'],
      ],
    ];

    // Allow other modules to alter the default page.
    $context = 'overview';
    \Drupal::moduleHandler()->alter('workbench_content', $blocks, $context);

    return $this->renderBlocks($blocks);
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
  public function editedContent() {
    $blocks = [];
    $blocks['workbench_edited_content'] = [
      '#view_id'      => 'workbench_edited',
      '#view_display' => 'embed_1',
      '#attributes'   => [
        'class' => ['workbench-full'],
      ],
    ];

    // Allow other modules to alter the default page.
    $context = 'edits';
    \Drupal::moduleHandler()->alter('workbench_content', $blocks, $context);

    return $this->renderBlocks($blocks);
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
  public function allContent() {
    $blocks = [];
    $blocks['workbench_recent_content'] = [
      '#view_id'      => 'workbench_recent_content',
      '#view_display' => 'embed_1',
      '#render' => 'embed',
      '#attributes'   => [
        'class' => ['workbench-full'],
      ],
    ];

    // Allow other modules to alter the default page.
    $context = 'all';
    \Drupal::moduleHandler()->alter('workbench_content', $blocks, $context);
    return $this->renderBlocks($blocks);
  }

  /**
   * Render the registered blocks as output.
   *
   * @param $blocks
   *   An array of block items formatted for rendering a view.
   *
   * @see hook_workbench_content_alter()
   */
  public function renderBlocks($blocks) {
    $output = [];
    // Render each block element.
    foreach ($blocks as $key => $block) {
      if (!Views::getView($block['#view_id'])) {
        continue;
      }
      $view_id = $block['#view_id'];
      $display_id = $block['#view_display'];

      // Create a view embed for this content.
      $build = views_embed_view($view_id, $display_id);

      if (!isset($build['#attributes'])) {
        $build['#attributes'] = $block['#attributes'];
      }
      else {
        $build['#attributes'] = array_merge_recursive($build['#attributes'], $block['#attributes']);
      }
      $output[] = $build;
    }

    return [
      'blocks'    => $output,
      '#prefix'   => '<div class="admin my-workbench">',
      '#suffix'   => '</div>',
      '#attached' => [
        'library' => ['workbench/workbench.content'],
      ],
    ];
  }

}
