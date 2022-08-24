<?php

namespace Drupal\specbeetest\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\specbeetest\TimzoneoptionsService;

/**
 * Admin config form for country,city and timezone.
 */
class AdminconfigForm extends ConfigFormBase {
  /**
   * Option variable define.
   *
   * @var \Drupal\specbeetest\TimzoneoptionsService
   */
  protected $options;

  /**
   * Constructor using for timezon serivce class variable assign.
   *
   * @param \Drupal\specbeetest\TimzoneoptionsService $options
   *   Options service assign to this parameter.
   */
  public function __construct(TimzoneoptionsService $options) {
    $this->options = $options;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    return new static(
          // Load the service required to construct this class.
          $container->get('specbeetest.timzoneoptions_services')
      );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'specbeetest.admin_settings_form',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'specbeetest_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('specbeetest.admin_settings_form');

    $form['specbeetest_country'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Country'),
      '#description' => $this->t('Country'),
      '#required' => TRUE,
      '#default_value' => $config->get('specbeetest_country'),
    ];

    $form['specbeetest_city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#description' => $this->t('City'),
      '#required' => TRUE,
      '#default_value' => $config->get('specbeetest_city'),
    ];

    $form['specbeetest_timezon'] = [
      '#title' => t('Timezone'),
      '#type' => 'select',
      '#description' => 'Select the desired Timezon.',
      '#options' => $this->options->getOptions(),
      '#required' => TRUE,
      '#default_value' => $config->get('specbeetest_timezon'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('specbeetest.admin_settings_form')
      ->set('specbeetest_country', $form_state->getValue('specbeetest_country'))
      ->set('specbeetest_city', $form_state->getValue('specbeetest_city'))
      ->set('specbeetest_timezon', $form_state->getValue('specbeetest_timezon'))
      ->save();
  }

}
