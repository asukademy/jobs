<?php
/**
 * Part of jobs project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Jobs\Uploader;

use Joomla\Filter;

/**
 * The Files class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class Files extends \Joomla\Input\Files
{
	/**
	 * The class constructor.
	 *
	 * @param   array  $source   The source argument is ignored. $_FILES is always used.
	 * @param   array  $options  An optional array of configuration options:
	 *                           filter : a custom JFilterInput object.
	 *
	 * @since   1.0
	 */
	public function __construct(array $source = null, array $options = array())
	{
		if (isset($options['filter']))
		{
			$this->filter = $options['filter'];
		}
		else
		{
			$this->filter = new Filter\InputFilter;
		}

		// Set the data source.
		if ($source)
		{
			$this->data = $source;
		}
		else
		{
			$this->data = & $_FILES;
		}

		// Set the options for the class.
		$this->options = $options;
	}
}
