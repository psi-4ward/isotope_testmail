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

$GLOBALS['TL_LANG']['tl_iso_mail_content']['orderNotFoundError']	= "Die Bestellung ID %s wurde nicht gefunden!";
$GLOBALS['TL_LANG']['tl_iso_mail_content']['noOrderFoundError']		= "Es existiert keine Bestellung die als Testdatensatz verwendet werden kann! Sie sollten zumindest eine Testbestellung ausführen.";
$GLOBALS['TL_LANG']['tl_iso_mail_content']['sentMail']				= "Test E-Mail an %s verschickt.";

?>