<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=global
 * [END_COT_EXT]
 */

/**
 * market module
 *
 * @package market
 * @version 2.5.2
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru, littledev.ru
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('market', 'module');
require_once cot_incfile('payments', 'module');

if(!$market_types)
{
	$market_types =  array();
	$sql_t = $db->query("SELECT * FROM $db_market_types");
	while ($item = $sql_t->fetch())
	{
		$market_types[$item['type_id']] = $item['type_title'];
	}
	$cache && $cache->db->store('market_types', $market_types, COT_DEFAULT_REALM, 3600);
}