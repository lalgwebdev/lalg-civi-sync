-- /*******************************************************
-- * Synchronise content from the Drupal database.
-- *   Table must exist.
-- *   Delete all rows, then
-- *   Insert from the SELECT to read the Data from Drupal
-- *******************************************************/

DELETE FROM lalg_cms_user;

SET @civi_db = DATABASE();
SET @cms_db = CONCAT(LEFT(@civi_db, LENGTH(@civi_db) -1), 'd');

SET @sql = CONCAT(
  'INSERT INTO lalg_cms_user
    SELECT a.id AS contact_id, w.uid AS user_id, w.name AS username, w.mail AS email, w.login AS last_login, w.access AS last_access, y.id AS group_id, y.label AS group_name, z.group_roles_target_id AS group_role
    FROM ', @civi_db, '.civicrm_contact AS a 
      JOIN ', @civi_db, '.civicrm_uf_match AS b on a.id = b.contact_id 
      JOIN ', @cms_db, '.users_field_data AS w ON b.uf_id = w.uid
      INNER JOIN ', @cms_db, '.group_content_field_data AS x ON x.entity_id = w.uid 
    	AND x.type IN ( "group-group_membership", "private-group_membership" )
      INNER JOIN ', @cms_db, '.groups_field_data AS y ON y.id = x.gid 
      LEFT JOIN ', @cms_db, '.group_content__group_roles AS z ON x.id = z.entity_id AND z.deleted = "0"
    WHERE y.type IN ("group")
    ORDER BY w.uid;'
);

PREPARE stmt FROM @sql;
EXECUTE stmt;
