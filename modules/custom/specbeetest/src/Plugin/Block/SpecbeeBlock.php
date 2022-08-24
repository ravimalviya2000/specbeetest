<?php

namespace Drupal\specbeetest\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\specbeetest\CustomconfigService;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "SpecbeeBlock_block",
 *   admin_label = @Translation("SpecbeeBlock block"),
 *   category = @Translation("SpecbeeBlock Test"),
 * )
 */
class SpecbeeBlock extends BlockBase implements ContainerFactoryPluginInterface {
  /**
   * Drupal\specbeetest\CustomService.
   *
   * @var CustomService
   */
  protected $customservice;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
          $configuration,
          $plugin_id,
          $plugin_definition,
          $container->get('specbeetest.customconfig_services')
      );
  }

  /**
   * Constructs a ConfigForm.
   *
   * @param array $configuration
   *   Congiguration object.
   * @param string $plugin_id
   *   Plugin id variable.
   * @param mixed $plugin_definition
   *   Plugin definition variable.
   * @param \Drupal\specbeetest\CustomconfigService $customservice
   *   Service object.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CustomconfigService $customservice) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->customservice = $customservice;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $adminconfig = $this->customservice->getData();

    return [
      '#theme' => 'specbeetest_block',
      '#cache' => [
        'max-age' => 0,
      ],
      '#adminconfig' => $adminconfig,
    ];
  }

}
