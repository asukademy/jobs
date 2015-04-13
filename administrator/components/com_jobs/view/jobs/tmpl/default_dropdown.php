<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Windwalker\Bootstrap\Dropdown;

// No direct access
defined('_JEXEC') or die;

/**
 * Prepare data for this template.
 *
 * @var $data Windwalker\Data\Data
 * @var $grid Windwalker\View\Helper\GridHelper
 * @var $item Windwalker\Data\Data
 */
$grid = $data->grid;
$item = $grid->current;

// Duplicate
Dropdown::duplicate($grid->row, 'jobs.batch');

Dropdown::divider();

// Published & Unpublished
if ($item->state)
{
	Dropdown::unpublish($grid->row, 'jobs.state');
}
else
{
	Dropdown::publish($grid->row, 'jobs.state');
}

// Trash & Delete
if (JDEBUG || $data->state->get('filter.job.state') == -2)
{
	Dropdown::addCustomItem(\JText::_('JTOOLBAR_DELETE'), 'delete', $grid->row, 'jobs.state.delete');
}
else
{
	Dropdown::trash($grid->row, 'jobs.state');
}

// Render it
echo Dropdown::render();
