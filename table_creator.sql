
CREATE TABLE IF NOT EXISTS `cms_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(280) NOT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `author` text NOT NULL,
  `approved` text NOT NULL,
  `tags` varchar(24) NOT NULL,
  `private` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=425 ;



CREATE TABLE IF NOT EXISTS `tblUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sidebar` text COLLATE utf8_unicode_ci NOT NULL,
  `gravatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cucss` text COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `rpt` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;


INSERT INTO `tblUser` (`id`, `username`, `password`, `email`, `pname`, `sidebar`, `gravatar`, `cucss`, `group`, `profile_url`, `rpt`) VALUES
(2, 'admin', '956xkFuvbOmIw', 'admin@localhost', 'localhost', '', 'admin@localhost', '', 'moderators', 'http://localhost/admin', '');


CREATE TABLE IF NOT EXISTS `tblInvites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(750) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

INSERT INTO `tblInvites` (`id`, `hash`, `username`) VALUES
(4, 'sampleinvite', '');

