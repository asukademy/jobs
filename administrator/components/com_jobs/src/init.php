<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

include_once JPATH_LIBRARIES . '/windwalker/src/init.php';

JLoader::registerPrefix('Jobs', JPATH_BASE . '/components/com_jobs');
JLoader::registerNamespace('Jobs', JPATH_ADMINISTRATOR . '/components/com_jobs/src');
JLoader::registerNamespace('Windwalker', __DIR__);
JLoader::register('JobsComponent', JPATH_BASE . '/components/com_jobs/component.php');
