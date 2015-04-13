<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Jobs Component
 *
 * @since 1.0
 */
final class JobsComponent extends \Jobs\Component\JobsComponent
{
	/**
	 * Default task name.
	 *
	 * @var string
	 */
	protected $defaultController = 'jobs.display';

	/**
	 * Prepare hook of this component.
	 *
	 * Do some customize initialise through extending this method.
	 *
	 * @return void
	 */
	public function prepare()
	{
		parent::prepare();
	}
}
