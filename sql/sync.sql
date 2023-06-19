-- /*******************************************************
-- * Synchronise content from the Drupal database.
-- *   Table must exist.
-- *   Delete all rows, then
-- *   Insert from the SELECT to read the Data from Drupal
-- *******************************************************/

TRUNCATE lalg_cms_user;

SET @civi_db = DATABASE();
SET @cms_db = CONCAT(LEFT(@civi_db, LENGTH(@civi_db) -1), 'd');

SET @sql = CONCAT(
  'INSERT INTO lalg_cms_user (user_id, username, email, last_login, last_access, group_id, group_name, group_role, contact_id, display_name)
  
  SELECT td1.uid AS user_id, td1.name AS username, td1.mail AS email,
	IF(td1.login = 0, CONVERT("2000-01-01 00:00:00", DATETIME), 
	  FROM_UNIXTIME(td1.login)) AS last_login, 
	IF(td1.access = 0, CONVERT("2000-01-01 00:00:00", DATETIME),
      FROM_UNIXTIME(td1.access)) AS last_access,
	td2.gid AS group_id, td3.label AS group_name, td4.group_roles_target_id AS group_role, tc1.contact_id AS contact_id, tc2.display_name AS display_name 
  FROM ', @cms_db, '.users_field_data AS td1
  LEFT JOIN ', @cms_db, '.group_content_field_data AS td2 ON td2.entity_id = td1.uid 
    AND td2.type IN ( "group-group_membership", "private-group_membership" )
  LEFT JOIN ', @cms_db, '.groups_field_data AS td3 ON td3.id = td2.gid 
  LEFT JOIN ', @cms_db, '.group_content__group_roles AS td4 ON td2.id = td4.entity_id AND td4.deleted = "0"
  LEFT JOIN civicrm_uf_match AS tc1 ON tc1.uf_id = td1.uid
  LEFT JOIN civicrm_contact AS tc2 ON tc2.id = tc1.contact_id

  ORDER BY td1.uid;'
);  

PREPARE stmt FROM @sql;
EXECUTE stmt;
