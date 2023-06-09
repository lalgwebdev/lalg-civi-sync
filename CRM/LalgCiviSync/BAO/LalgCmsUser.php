<?php
use CRM_LalgCiviSync_ExtensionUtil as E;

class CRM_LalgCiviSync_BAO_LalgCmsUser extends CRM_LalgCiviSync_DAO_LalgCmsUser {

  /**
   * Create a new LalgCmsUser based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_LalgCiviSync_DAO_LalgCmsUser|NULL
   *
  public static function create($params) {
    $className = 'CRM_LalgCiviSync_DAO_LalgCmsUser';
    $entityName = 'LalgCmsUser';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

}
