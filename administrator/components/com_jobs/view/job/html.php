<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Windwalker\DI\Container;
use Windwalker\Model\Model;
use Windwalker\View\Engine\PhpEngine;
use Windwalker\View\Html\EditView;
use Windwalker\Xul\XulEngine;

// No direct access
defined('_JEXEC') or die;

/**
 * Jobs Jobs view
 *
 * @since 1.0
 */
class JobsViewJobHtml extends EditView
{
	/**
	 * The component prefix.
	 *
	 * @var  string
	 */
	protected $prefix = 'jobs';

	/**
	 * The component option name.
	 *
	 * @var string
	 */
	protected $option = 'com_jobs';

	/**
	 * The text prefix for translate.
	 *
	 * @var  string
	 */
	protected $textPrefix = 'COM_JOBS';

	/**
	 * The item name.
	 *
	 * @var  string
	 */
	protected $name = 'job';

	/**
	 * The item name.
	 *
	 * @var  string
	 */
	protected $viewItem = 'job';

	/**
	 * The list name.
	 *
	 * @var  string
	 */
	protected $viewList = 'jobs';

	/**
	 * Method to instantiate the view.
	 *
	 * @param Model            $model     The model object.
	 * @param Container        $container DI Container.
	 * @param array            $config    View config.
	 * @param SplPriorityQueue $paths     Paths queue.
	 */
	public function __construct(Model $model = null, Container $container = null, $config = array(), \SplPriorityQueue $paths = null)
	{
		$this->engine = new PhpEngine;

		parent::__construct($model, $container, $config, $paths);
	}

	/**
	 * Prepare data hook.
	 *
	 * @return  void
	 */
	protected function prepareData()
	{
		parent::prepareData();
	}
}
