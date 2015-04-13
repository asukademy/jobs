<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

use Windwalker\Router\CmsRouter;
use Windwalker\Router\Helper\RoutingHelper;

include_once JPATH_ADMINISTRATOR . '/components/com_jobs/src/init.php';

// Prepare Router
$router = CmsRouter::getInstance('com_jobs');

// Register routing config and inject Router object into it.
$router = RoutingHelper::registerRouting($router, 'com_jobs');

/**
 * JobsBuildRoute
 *
 * @param array &$query
 *
 * @return  array
 */
function JobsBuildRoute(&$query)
{
	$segments = array();

	$router = CmsRouter::getInstance('com_jobs');

	// Find menu matches, and return matched Itemid.
	$query = \Windwalker\Router\Route::build($query);

	// If _resource exists, we use resource key to build route.
	if (!empty($query['_resource']))
	{
		$segments = $router->build($query['_resource'], $query);

		unset($query['_resource']);
	}
	else
	{
		$segments = $router->buildByRaw($query);
	}

	return $segments;
}

/**
 * JobsParseRoute
 *
 * @param array $segments
 *
 * @return  array
 */
function JobsParseRoute($segments)
{
	$router = CmsRouter::getInstance('com_jobs');

	$segments = implode('/', $segments);

	// OK, let's fetch view name.
	$view = $router->getView(str_replace(':', '-', $segments));

	if ($view)
	{
		return array('view' => $view);
	}

	return array();
}
