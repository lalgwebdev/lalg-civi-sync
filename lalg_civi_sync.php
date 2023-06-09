<?php

require_once 'lalg_civi_sync.civix.php';
// phpcs:disable
use CRM_LalgCiviSync_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function lalg_civi_sync_civicrm_config(&$config) {
  _lalg_civi_sync_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function lalg_civi_sync_civicrm_xmlMenu(&$files) {
  _lalg_civi_sync_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function lalg_civi_sync_civicrm_install() {
  _lalg_civi_sync_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function lalg_civi_sync_civicrm_postInstall() {
  _lalg_civi_sync_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function lalg_civi_sync_civicrm_uninstall() {
  _lalg_civi_sync_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function lalg_civi_sync_civicrm_enable() {
  _lalg_civi_sync_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function lalg_civi_sync_civicrm_disable() {
  _lalg_civi_sync_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function lalg_civi_sync_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _lalg_civi_sync_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function lalg_civi_sync_civicrm_managed(&$entities) {
  _lalg_civi_sync_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Add CiviCase types provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function lalg_civi_sync_civicrm_caseTypes(&$caseTypes) {
  _lalg_civi_sync_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Add Angular modules provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function lalg_civi_sync_civicrm_angularModules(&$angularModules) {
  // Auto-add module files from ./ang/*.ang.php
  _lalg_civi_sync_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function lalg_civi_sync_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _lalg_civi_sync_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function lalg_civi_sync_civicrm_entityTypes(&$entityTypes) {
  _lalg_civi_sync_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function lalg_civi_sync_civicrm_themes(&$themes) {
  _lalg_civi_sync_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function lalg_civi_sync_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function lalg_civi_sync_civicrm_navigationMenu(&$menu) {
//  _lalg_civi_sync_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _lalg_civi_sync_civix_navigationMenu($menu);
//}

/************************************************************/
/*     LALG Functions added manually                        */
/************************************************************/

/**
 * Implements hook_civicrm_coreResourceList().
 *    (hook_civirm_buildForm() does not seem to work on this page.)
 */
function lalg_civi_sync_civicrm_coreResourceList(&$items, $region) {
//  if ($region === 'html-header') {
//    Civi::resources()->addScriptFile(E::LONG_NAME, 'js/refreshCmsUsers.js', 0, $region);
  if (strpos($_SERVER['REQUEST_URI'], "lalgwf=4" ) !== false) {
	Civi::resources()->addScriptFile(E::LONG_NAME, 'js/refreshCmsUsers.js');
	Civi::resources()->addStyleFile(E::LONG_NAME, 'css/refreshCmsUsers.css');
  }
}


