<?php

require_once 'fpptaqbhelper.civix.php';
// phpcs:disable
use CRM_Fpptaqbhelper_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function fpptaqbhelper_civicrm_config(&$config) {
  _fpptaqbhelper_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function fpptaqbhelper_civicrm_install() {
  _fpptaqbhelper_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function fpptaqbhelper_civicrm_postInstall() {
  _fpptaqbhelper_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function fpptaqbhelper_civicrm_uninstall() {
  _fpptaqbhelper_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function fpptaqbhelper_civicrm_enable() {
  _fpptaqbhelper_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function fpptaqbhelper_civicrm_disable() {
  _fpptaqbhelper_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function fpptaqbhelper_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _fpptaqbhelper_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function fpptaqbhelper_civicrm_entityTypes(&$entityTypes) {
  _fpptaqbhelper_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function fpptaqbhelper_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * For an array of menu items, recursively get the value of the greatest navID
 * attribute.
 * @param <type> $menu
 * @param <type> $max_navID
 */
function _fpptaqbhelper_get_max_navID(&$menu, &$max_navID = NULL) {
  foreach ($menu as $id => $item) {
    if (!empty($item['attributes']['navID'])) {
      $max_navID = max($max_navID, $item['attributes']['navID']);
    }
    if (!empty($item['child'])) {
      _fpptaqbhelper_get_max_navID($item['child'], $max_navID);
    }
  }
}

/**
 * Log CiviCRM API errors to CiviCRM log.
 */
function _fpptaqbhelper_log_api_error(API_Exception $e, string $entity, string $action, array $params) {
  $message = "CiviCRM API Error '{$entity}.{$action}': " . $e->getMessage() . '; ';
  $message .= "API parameters when this error happened: " . json_encode($params) . '; ';
  $bt = debug_backtrace();
  $error_location = "{$bt[1]['file']}::{$bt[1]['line']}";
  $message .= "Error API called from: $error_location";
  CRM_Core_Error::debug_log_message($message);
}

/**
 * CiviCRM API wrapper. Wraps with try/catch, redirects errors to log, saves
 * typing.
 */
function _fpptaqbhelper_civicrmapi(string $entity, string $action, array $params, bool $silence_errors = TRUE) {
  try {
    $result = civicrm_api3($entity, $action, $params);
  }
  catch (API_Exception $e) {
    _fpptaqbhelper_log_api_error($e, $entity, $action, $params);
    if (!$silence_errors) {
      throw $e;
    }
  }

  return $result;
}
