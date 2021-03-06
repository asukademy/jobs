<?php

namespace Jobs\Component;

use Jobs\Provider\JobsProvider;
use Windwalker\Component\Component;
use Windwalker\Debugger\Debugger;
use Windwalker\Helper\LanguageHelper;
use Windwalker\Helper\ProfilerHelper;

// No direct access
defined('_JEXEC') or die;

/**
 * Jobs Component
 *
 * @since 1.0
 */
abstract class JobsComponent extends Component
{
	/**
	 * Component name without `com_`.
	 *
	 * @var string
	 */
	protected $name = 'Jobs';

	/**
	 * Prepare hook of this component.
	 *
	 * Do some customize initialise through extending this method.
	 *
	 * @return void
	 */
	public function prepare()
	{
		if (JDEBUG)
		{
			Debugger::registerWhoops();
		}

		// Register provider
		$this->container->registerServiceProvider(new JobsProvider);

		// Load language
		$lang = $this->container->get('language');

		LanguageHelper::loadAll($lang->getTag(), $this->option);

		// Load asset
		$asset = $this->container->get('helper.asset');

		$asset->windwalker();

		// Register tasks
		TaskMapper::register($this);

		parent::prepare();
	}

	/**
	 * Post execute hook.
	 *
	 * @param mixed $result The return value of this component.
	 *
	 * @return  mixed  The return value of this component.
	 */
	protected function postExecute($result)
	{
		// Debug profiler
		if (JDEBUG)
		{
			$result .= "<hr />" . ProfilerHelper::render('Windwalker', true);
		}

		return parent::postExecute($result);
	}
}
