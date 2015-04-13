<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
namespace Jobs\Config;

use Windwalker\System\Config\AbstractConfig;
use Windwalker\Helper\PathHelper;

// No direct access
defined('_JEXEC') or die;

/**
 * Jobs config.
 *
 * @since 1.0
 */
abstract class Config extends AbstractConfig
{
	/**
	 * Config file type.
	 *
	 * @var  string
	 */
	protected static $type = 'json';

	/**
	 * Get config file path.
	 *
	 * @return  string
	 */
	public static function getPath()
	{
		$type = static::$type;
		$ext  = (static::$type == 'yaml') ? 'yml' : $type;

		return PathHelper::getAdmin('com_jobs') . '/etc/config.' . $ext;
	}
}
