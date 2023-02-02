
CREATE TABLE IF NOT EXISTS `cot_market_types` (
  `type_id` int(10) unsigned NOT NULL auto_increment,
  `type_title` varchar(255) collate utf8_unicode_ci DEFAULT '',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

