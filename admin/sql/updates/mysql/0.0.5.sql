DROP TABLE IF EXISTS `#__quantum_users`, `#__quantum_files`;
 
CREATE TABLE IF NOT EXISTS `#__quantum_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(4) NOT NULL,
  `cell` int(12) NOT NULL,
  `tel` int(13) NOT NULL,
  `fax` int(13) NOT NULL,
  `subscribe` int(1) NOT NULL default 1,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__quantum_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
   `name` varchar(40) NOT NULL,
  `file_url` varchar(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;