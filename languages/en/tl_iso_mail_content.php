<?php if(!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 * @package Isotope
 * @licence LGPL
 */

$GLOBALS['TL_LANG']['tl_iso_mail_content']['sendTestmail_header']	= 'Test E-Mail verschicken';
$GLOBALS['TL_LANG']['tl_iso_mail_content']['send']					= 'E-Mail verschicken';

$GLOBALS['TL_LANG']['tl_iso_mail_content']['sendTo']				= array('E-Mail Adresse','An diese E-Mail Adresse wird die Testmail geschickt.');
$GLOBALS['TL_LANG']['tl_iso_mail_content']['orderId']				= array('Bestellung-ID','Die E-Mail wird mit den Daten dieser Bestellung befüllt.');

$GLOBALS['TL_LANG']['tl_iso_mail_content']['orderNotFoundError']	= "The order ID %s was not found!";
$GLOBALS['TL_LANG']['tl_iso_mail_content']['noOrderFoundError']		= "Theres no order to use for testdata! Please do some testordering ;)";
$GLOBALS['TL_LANG']['tl_iso_mail_content']['sentMail']				= "Sent test e-mail to %s.";

?>