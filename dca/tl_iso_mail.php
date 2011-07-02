<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
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
 * @copyright  Intelligent Spark 2011 
 * @author     Fred Bliss <http://www.intelligentspark.com> 
 * @package    IsotopeTestMail
 * @license    LGPL 
 * @filesource
 */


$GLOBALS['TL_DCA']['tl_iso_mail']['operations']['sendTest'] = array
(
	'label'				  => &$GLOBALS['TL_LANG']['tl_iso_mail']['sendTest'],
	'href'				  => 'key=testMail',
	'icon'				  => 'system/modules/isotope/html/test-email.png'
);

class tl_iso_mail_test extends Backend 
{
	
	public function sendTest()
	{
		//Gather form info & create a test email.  Send information to the test email indicated in the form.
		$this->import('Isotope');	
	
		//Build form interface
		
		
		//TO-DO: call isotope sendmail funciton
		if($this->Input->post('FORM_SUBMIT')=='tl_iso_mail_test')
		{
			//$this->Isotope->sendMail(...);
		}
		
		
		return $strBuffer;	
	}
	
}