-- +--------------------------------------------------------------------+
-- | Copyright CiviCRM LLC. All rights reserved.                        |
-- |                                                                    |
-- | This work is published under the GNU AGPLv3 license with some      |
-- | permitted exceptions and without any warranty. For full license    |
-- | and copyright information, see https://civicrm.org/licensing       |
-- +--------------------------------------------------------------------+
--
-- Generated from schema.tpl
-- DO NOT EDIT.  Generated by CRM_Core_CodeGen
--
-- /*******************************************************
-- *
-- * Clean up the existing tables - this section generated from drop.tpl
-- *
-- *******************************************************/

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `lalg_cms_user`;

SET FOREIGN_KEY_CHECKS=1;
-- /*******************************************************
-- *
-- * Create new tables
-- *
-- *******************************************************/

-- /*******************************************************
-- *
-- * lalg_cms_user
-- *
-- * Mirror of various Drupal User fields
-- *
-- *******************************************************/
CREATE TABLE `lalg_cms_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique LalgCmsUser ID',
  `contact_id` int unsigned COMMENT 'FK to Contact',
  `user_id` int unsigned COMMENT 'Id of Drupal User',
  `username` varchar(60) COMMENT 'Login username',
  `email` varchar(254) COMMENT 'Email Address',
  `last_login` timestamp COMMENT 'Last User Login',
  `last_access` timestamp COMMENT 'Last User Access',
  `group_id` int unsigned COMMENT 'Id of Drupal Group',
  `group_name` varchar(254) COMMENT 'Drupal Group Name',
  `group_role` varchar(254) COMMENT 'Drupal Group Role',
  PRIMARY KEY (`id`),
  CONSTRAINT FK_lalg_cms_user_contact_id FOREIGN KEY (`contact_id`) REFERENCES `civicrm_contact`(`id`)
)
ENGINE=InnoDB;
