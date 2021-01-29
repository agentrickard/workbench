<?php

namespace Drupal\workbench_tabs\Element;

use Drupal\Core\Render\Element;
use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides a render element for the status messages.
 *
 * Unlike Drupal\Core\Render\Element\StatusMessages, this element clears the
 * messages when it renders them, so that they are only displayed once on the
 * page.
 *
 * @RenderElement("workbench_tabs_status_messages")
 */
class StatusMessages extends RenderElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $class = get_class($this);

    return [
      '#pre_render' => [[$class, 'renderMessages']],
      '#message_type' => NULL,
      '#clear_queue' => TRUE,
    ];
  }

  /**
   * Clear the message queue when rendering the messages.
   */
  public static function renderMessages($element) {
    $messages = drupal_get_messages($element['#message_type'], $element['#clear_queue']);

    if (!empty($messages)) {
      $element = [
        '#theme' => 'workbench_tabs_status_messages',
        '#message_list' => $messages,
        '#status_headings' => [
          'status' => t('Status message'),
          'error' => t('Error message'),
          'warning' => t('Warning message'),
        ],
      ] + $element;
    }

    return $element;
  }

}
