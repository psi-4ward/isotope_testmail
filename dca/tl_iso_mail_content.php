<?php if(!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 * @package Isotope
 * @licence LGPL
 */

$GLOBALS['TL_DCA']['tl_iso_mail_content']['list']['operations']['sendTestmail'] = array
(
	'label'               => &$GLOBALS['TL_LANG']['tl_iso_mail_content']['sendTestmail'],
	'href'                => 'key=sendTestmail',
	'icon'                => 'system/modules/isotope_testmail/html/mail-test.png'
);