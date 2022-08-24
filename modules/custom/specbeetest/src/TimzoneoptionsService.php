<?php

namespace Drupal\specbeetest;

/**
 * Class TimzoneoptionsService.
 *
 * @package Drupal\mymodule\Services
 */
class TimzoneoptionsService {

  /**
   * Timezone options.
   *
   * @return \Drupal\Component\Render\MarkupInterface|string
   *   return options array.
   */
  public function getOptions() {
    $options = [];
    $options[''] = "--- SELECT ---";
    $options['America/Chicago'] = "America/Chicago";
    $options['America/New_York'] = "America/New_York";
    $options['Asia/Tokyo'] = "Asia/Tokyo";
    $options['Asia/Dubai'] = "Asia/Dubai";
    $options['Asia/Kolkata'] = "Asia/Kolkata";
    $options['Europe/Amsterdam'] = "Europe/Amsterdamo";
    $options['Europe/Oslo'] = "Europe/Oslo";
    $options['Europe/London'] = "Europe/London";

    return $options;

  }

}
