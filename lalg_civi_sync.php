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
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function lalg_civi_sync_civicrm_install() {
  _lalg_civi_sync_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function lalg_civi_sync_civicrm_enable() {
  _lalg_civi_sync_civix_civicrm_enable();
}

// --- Functions below this ship commented out. Uncomment as required. ---

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
