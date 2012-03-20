<?php if(!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Isotope eCommerce Workgroup 2011-2012
 * @author     Christoph Wiechert <christoph.wiechert@4wardmedia.de>
 * @author     Fred Bliss <fred.bliss@intelligentspark.com>
 * @package	   Isotope
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */

$GLOBALS['TL_LANG']['tl_iso_mail_content']['sendTestmail_header']	= 'Send a test e-mail';
$GLOBALS['TL_LANG']['tl_iso_mail_content']['send']					= 'send the e-mail';

$GLOBALS['TL_LANG']['tl_iso_mail_content']['sendTo']				= array('E-mail addresse','Test mails are being sent to this email address.');
$GLOBALS['TL_LANG']['tl_iso_mail_content']['orderId']				= array('Order ID','This data of this order is used to fille the email.');

$GLOBALS['TL_LANG']['tl_iso_mail_content']['orderNotFoundError']	= "The order ID %s was not found!";
$GLOBALS['TL_LANG']['tl_iso_mail_content']['noOrderFoundError']		= "Theres no order to use for testdata! Please do some testordering ;)";
$GLOBALS['TL_LANG']['tl_iso_mail_content']['sentMail']				= "Sent test e-mail to %s.";

?>