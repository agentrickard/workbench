<?php
/**
 * @file
 * Contains \Drupal\workbench\Plugin\Block\WorkbenchBlock.
 */

namespace Drupal\workbench\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Register a block that other modules may hook into.
 *
 * @Block(
 *   id = "workbench_block",
 *   admin_label = @Translation("Workbench information")
 * )
 */
class WorkbenchBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $args['node'] = \Drupal::routeMatch()->getParameter('node');
    $items = \Drupal::moduleHandler()->invokeAll('workbench_block', $args);
    if (empty($items)) {
      return array();
    }
    return array(
      '#markup' => '<div class="workbench-info-block">' . implode('<br />', $items) . '</div>',
      '#attached' => array(
        'library' => array('workbench/workbench.block'),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access workbench');
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return ['url.path'];
  }

}
