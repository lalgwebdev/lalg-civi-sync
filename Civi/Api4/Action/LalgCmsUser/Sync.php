<?php
namespace Civi\Api4\Action\LalgCmsUser;
use CRM_Core_DAO;
use Civi\Api4\Generic\Result;
use CRM_Utils_File;
use CRM_LalgCiviSync_ExtensionUtil as E;	// Civix utilities

/**
 * Custom Action on LalgCmsUser entity to refresh the data content from Drupal database.
 *
 * Provided by the LALG Civi Sync extension.
 *
 * @package Civi\Api4
 */
class Sync extends \Civi\Api4\Generic\AbstractAction { 

  /**
   * Every action must define a _run function to perform the work and place results in the Result object.
   *
   * This action simply runs an SQL script that does all the work.
   *
   * @param Result $result.     Contains number of records created.
   */
  public function _run(Result $result) {
    CRM_Utils_File::sourceSQLFile(
      CIVICRM_DSN,
      E::path('sql/sync.sql')
    );
	
	$sql = 'SELECT COUNT(*) FROM lalg_cms_user';
	$dao = CRM_Core_DAO::executeQuery($sql, options : ['result_buffering' => 1]);
    $dao->fetch();
//dpm($dao);
    $cnt = $dao->{"COUNT(*)"};
//dpm($cnt);
    //Return a result
	$result[] = [
      'count' => $cnt
    ];
  }
  
  /**
   * Declare ad-hoc field list for this action.
   *
   * @return array
   */
  public static function fields() {
    return [
      ['name' => 'count'],
    ];
  }

}