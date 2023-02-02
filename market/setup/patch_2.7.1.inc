<?php
/**
 * 2.7.1
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('market', 'module');

global $db_market, $cfg;

if (!$db->fieldExists($db_market, "item_type"))
{
	$db->query("ALTER TABLE `$db_market` ADD COLUMN `item_type` INT( 11 ) NOT NULL DEFAULT '0'");
}