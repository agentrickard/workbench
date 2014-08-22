<?php

/**
 * @file
 * Contains \Drupal\workbench\WorkbenchInterface
 */

namespace Drupal\workbench;

interface WorkbenchInterface {

/**
 * Get the links for this workbench.
 */
public function getLinks();

/**
 * Set the links for this workbench.
 */
public function setLinks(array $links);

/**
 * Register the links for this workbench.
 */
public function registerLinks();

}
