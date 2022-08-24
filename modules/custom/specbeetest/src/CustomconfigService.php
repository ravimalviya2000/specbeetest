<?php

namespace Drupal\specbeetest;

use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class CustomService.
 *
 * @package Drupal\mymodule\Services
 */
class CustomconfigService {

  /**
   * Drupal\Core\Config\ConfigFactoryInterface.
   *
   * @var settings
   *  Config Factory @var object.
   */
  protected $settings;

  /**
   * CustomService constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   Config Factory object.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {

    $this->settings = $config_factory->getEditable('specbeetest.admin_settings_form');
  }

  /**
   * Get data function return Array.
   *
   * @return \Drupal\Component\Render\MarkupInterface|adminconfig
   *   Array object return all config values.
   */
  public function getData() {
    $adminconfig = [];

    $adminconfig['specbeetest_country'] = $this->settings->get('specbeetest_country');
    $adminconfig['specbeetest_city'] = $this->settings->get('specbeetest_city');
    $adminconfig['specbeetest_timezon'] = $this->settings->get('specbeetest_timezon');
    return $adminconfig;
  }

}
