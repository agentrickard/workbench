/**
 * @file
 * Collapse and expand the workbench_tabs messages.
 */

(function ($) {

  'use strict';

  var $messageTrigger = $('.workbench-tabs__trigger');
  var $messageContents = $('.workbench-tabs__message');

  var messageHeight = $messageContents.outerHeight(true);
  var messagesOpen = messageHeight > 0;

  Drupal.behaviors.workbenchTabs = {};

  Drupal.behaviors.workbenchTabs.attach = function() {
    // Open/Close functionality for rail navigation.
    $messageTrigger.once('workbenchTabsMessagesButtonClick').click(function(e) {
      e.preventDefault();
      Drupal.behaviors.workbenchTabs.toggleMessagesVisual();
    });

    // Lose focus on the trigger when the mouse leaves. Using .blur() in the
    // click handler breaks menus for users who are tabbing through.
    $messageTrigger.once('workbenchTabsMessagesButtonMouseout').mouseout(function() {
      $(this).blur();
    });

    // Close the drawer when we scroll past it.
    $(window).once('workbenchTabsMessagesScroll').on('scroll', function() {
      if (messagesOpen && $(window).scrollTop() > messageHeight) {

        // Reevaluate message height because user interactions can change it,
        // but we don't want to calculate this on every scroll event.
        messageHeight = $messageContents.outerHeight(true);
        if ($(window).scrollTop() > messageHeight) {
          Drupal.behaviors.workbenchTabs.closeMessages();

          // Scroll to the top of the page to prevent a jump.
          $(window).scrollTop(0);
        }
      }
    });
  };

  Drupal.behaviors.workbenchTabs.toggleMessagesVisual = function() {
    $messageContents.slideToggle('slow', function() {
      messagesOpen = $messageContents.is(':visible');
      Drupal.behaviors.workbenchTabs.toggleMessages(messagesOpen);
    });
  }

  /**
   * @param bool state
   *   Force opening or closing the messages.
   *   - true: open messages
   *   - false: close messages
   */
  Drupal.behaviors.workbenchTabs.toggleMessages = function(state) {
    if (state === true || state === false) {
      messagesOpen = !state;
    }
    else {
      messagesOpen = $messageContents.is(':visible');
    }

    if (messagesOpen) {
      Drupal.behaviors.workbenchTabs.closeMessages();
    }
    else {
      Drupal.behaviors.workbenchTabs.openMessages();
    }
  }

  Drupal.behaviors.workbenchTabs.closeMessages = function() {
    $messageTrigger.addClass('is-closed');
    $messageContents.addClass('is-closed');
    messagesOpen = false;
  }

  Drupal.behaviors.workbenchTabs.openMessages = function() {
    $messageTrigger.removeClass('is-closed');
    $messageContents
      .removeClass('is-closed')
      .attr('style', '');
    messageHeight = $messageContents.outerHeight(true);
    messagesOpen = true;
  }

})(jQuery);
