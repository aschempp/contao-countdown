<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id$
 */


class Countdown extends Frontend
{

	public function replaceTags($strTag)
	{
		$arrTag = trimsplit('::', $strTag);
		
		if ($arrTag[0] == 'countdown' && count($arrTag) == 4)
		{
			$objDate = new Date($arrTag[1]);
			
			$years = date('Y', $objDate->timestamp) - date('Y');
			$end = date('z', $objDate->timestamp);
			$start = date('z');
			
			$days = ($years * 365) + ($end - $start);
			
			if ($days > 0)
				return sprintf($arrTag[2], $days);
			else
				return $arrTag[3];
		}
		
		return false;
	}
}

