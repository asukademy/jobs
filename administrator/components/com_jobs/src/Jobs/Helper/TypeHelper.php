<?php
/**
 * Part of jobs project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Jobs\Helper;

/**
 * The TypeHelper class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class TypeHelper
{
	/**
	 * getTypeLabel
	 *
	 * @param string $type
	 *
	 * @return  string
	 */
	public static function getTypeLabel($type)
	{
		$map = [
			'full_time' => 'uk-badge-success',
			'part_time' => 'uk-badge-warning',
			'contract'  => '',
			'soho'      => 'uk-badge-danger',
		];

		if (isset($map[$type]))
		{
			return $map[$type];
		}

		return '';
	}
}
