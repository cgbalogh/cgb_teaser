#
# Table structure for table 'pages'
#
CREATE TABLE pages (

	tx_cgbteaser_teaserimage int(11) unsigned NOT NULL default '0',
	tx_cgbteaser_teasertext text,
	tx_cgbteaser_textonly smallint(5) unsigned DEFAULT '0' NOT NULL,
	tx_cgbteaser_teasertype int(11) DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (

	tx_cgbteaser_showpage text,
	tx_cgbteaser_mode int(11) DEFAULT '0' NOT NULL,

);
