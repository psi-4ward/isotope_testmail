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

class IsotopeTestmail extends Backend
{

	public function generate()
	{
		$this->import('BackendUser','User');

		$arrWidgets = array();

		$arrWidgets['sendTo'] = new TextField(array
		(
			'id'			=> 'sendTo',
			'name'			=> 'sendTo',
			'label'			=> 	$GLOBALS['TL_LANG']['tl_iso_mail_content']['sendTo'][0],
			'inputType'		=> 'text',
			'mandatory'		=> true,
			'rgxp'			=> 'email',
			'value'			=> $this->User->email
		));

		$arrWidgets['orderId'] = new TextField(array
		(
			'id'			=> 'orderId',
			'name'			=> 'orderId',
			'label'			=> 	$GLOBALS['TL_LANG']['tl_iso_mail_content']['orderId'][0],
			'inputType'		=> 'text',
			'rgxp'			=> 'digit'
		));

		if ($this->Input->post('FORM_SUBMIT') == 'tl_isotope_testmail')
		{
			// validate all widgets
			foreach($arrWidgets as $objWidget)
			{
				$objWidget->validate();
			}
			$error = false;
			foreach($arrWidgets as $objWidget)
			{
				if($objWidget->hasErrors())
				{
					$error=true;
				}
			}

			if (!$error)
			{
				// fetch the current language
				$objMailContent = $this->Database->prepare('SELECT pid,language FROM tl_iso_mail_content WHERE id=?')->execute($this->Input->get('id'));
				if(!$objMailContent->numRows)
				{
					$_SESSION['TL_ERROR'][] = "MailContent ID:{$this->Input->get('id')} not found!";
					$this->reload();
				}

				if(strlen($arrWidgets['orderId']->value))
				{
					// fetch order to the given id
					$objOrder = $this->Database->prepare('SELECT id FROM tl_iso_orders WHERE id=?')->limit(1)->execute($arrWidgets['orderId']->value);
					if(!$objOrder->numRows)
					{
						$_SESSION['TL_ERROR'][] = sprintf($GLOBALS['TL_LANG']['tl_iso_mail_content']['orderNotFoundError'], $arrWidgets['orderId']->value);
						$this->reload();
					}
				}
				else
				{
					// randomly fetch an order to gather some testdata
					$objOrder = $this->Database->prepare('SELECT id FROM tl_iso_orders ORDER BY RAND()')->limit(1)->execute();
					if(!$objOrder->numRows)
					{
						$_SESSION['TL_ERROR'][] = $GLOBALS['TL_LANG']['tl_iso_mail_content']['noOrderFoundError'];
						$this->reload();
					}
				}

				$objIsotopeOrder = new IsotopeOrder();
				$objIsotopeOrder->findBy('id',$objOrder->id);

				// send email through isotopes sendMail function
				$this->import('Isotope');
				$this->Isotope->sendMail($objMailContent->pid, $arrWidgets['sendTo']->value, $objMailContent->language, $objIsotopeOrder->email_data);
				$_SESSION['TL_CONFIRM'][] = sprintf($GLOBALS['TL_LANG']['tl_iso_mail_content']['sentMail'] ,$arrWidgets['sendTo']->value);
				setcookie('BE_PAGE_OFFSET', 0, 0, '/');
				$this->redirect($this->getReferer());
			}
		}


		// generate widgets
		$strWidgets = '';
		foreach($arrWidgets as $k => $objWidget)
		{
			$strWidgets .= '<div class="w50">';
			$strWidgets .= $objWidget->parse();
			$strWidgets .= '<p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['tl_iso_mail_content'][$k][1].'</p>';
			$strWidgets .= '</div>';
		}


		return '
		<div id="tl_buttons">
			<a href="'.$this->getReferer().'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBT']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
		</div>

		<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_iso_mail_content']['sendTestmail_header'].'</h2>'.$this->getMessages().'

		<form action="'.ampersand($this->Environment->request, true).'" id="tl_isotope_testmail" class="tl_form" method="post">
		<div class="tl_formbody_edit">
			<input type="hidden" name="FORM_SUBMIT" value="tl_isotope_testmail" />
			<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">

			<fieldset class="tl_tbox">'.
			$strWidgets
			.'</fieldset>
		</div>

		<div class="tl_formbody_submit">
			<div class="tl_submit_container">
			  <input type="submit" name="send" id="send" class="tl_submit" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['tl_iso_mail_content']['send']).'" />
			</div>
		</div>
		</form>';
	}
}
?>