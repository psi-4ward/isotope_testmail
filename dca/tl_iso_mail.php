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
	'icon'				  => 'system/modules/isotope_testmail/html/email-test.png'
);

class tl_iso_mail_test extends Backend
{

	public function sendTest()
	{
		//Gather form info & create a test email.  Send information to the test email indicated in the form.
		$this->import('Isotope');

		//Build form interface
		$arrData = array
		(
			'eval'	=> array('mandatory'=>true)
		);

		$objSendTo = new TextField($arrData, 'sendTo', null, 'sendTo');

		//TO-DO: call isotope sendmail funciton
		if($this->Input->post('FORM_SUBMIT')=='tl_mail_test')
		{
			$arrEmailAddresses = trimsplit(',',$this->Input->post('sendTo'));
			foreach($arrEmailAddresses as $email)
			{
				if(preg_match('\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b',$email))
					$arrEmails[] = $address;
			}

			if(count($arrEmails))
			{
				//TODO: fourth param should contain data for basic customer & order info.
				$this->Isotope->sendMail($this->id, implode($arrEmails), 'en', array());
			}
		}


		return '<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=testMail', '', $this->Environment->request)).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBT']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>

<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_iso_mail']['testMail'][1].'</h2>'.$this->getMessages().'

<form action="'.ampersand($this->Environment->request, true).'" id="tl_mail_test" class="tl_form" method="post">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_mail_test" />
<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">

<div class="tl_tbox block">
  <h3><label for="sendTo">'.$GLOBALS['TL_LANG']['tl_iso_mail']['sendTo'][0].'</label></h3>'.$objSendTo->generate().(strlen($GLOBALS['TL_LANG']['tl_iso_mail']['sendTo'][1]) ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['tl_iso_mail']['sendTo'][1].'</p>' : '').'
</div>

</div>

<div class="tl_formbody_submit">

<div class="tl_submit_container">
  <input type="submit" name="send" id="send" class="tl_submit" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['tl_iso_mail']['send'][0]).'" />
</div>

</div>
</form>';
	}

}