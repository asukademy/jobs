<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Windwalker\Model\AdminModel;

// No direct access
defined('_JEXEC') or die;

/**
 * Jobs Job model
 *
 * @since 1.0
 */
class JobsModelJob extends AdminModel
{
	/**
	 * Component prefix.
	 *
	 * @var  string
	 */
	protected $prefix = 'jobs';

	/**
	 * The URL option for the component.
	 *
	 * @var  string
	 */
	protected $option = 'com_jobs';

	/**
	 * The prefix to use with messages.
	 *
	 * @var  string
	 */
	protected $textPrefix = 'COM_JOBS';

	/**
	 * The model (base) name
	 *
	 * @var  string
	 */
	protected $name = 'job';

	/**
	 * Item name.
	 *
	 * @var  string
	 */
	protected $viewItem = 'job';

	/**
	 * List name.
	 *
	 * @var  string
	 */
	protected $viewList = 'jobs';

	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  mixed    Object on success, false on failure.
	 */
	public function getItem($pk = null)
	{
		return parent::getItem($pk);
	}

	/**
	 * Prepare and sanitise the table data prior to saving.
	 *
	 * @param   JTable  $table  A reference to a JTable object.
	 *
	 * @return  void
	 */
	protected function prepareTable(\JTable $table)
	{
		parent::prepareTable($table);
	}

	/**
	 * Post save hook.
	 *
	 * @param JTable $table The table object.
	 *
	 * @return  void
	 */
	public function postSaveHook(\JTable $table)
	{
		parent::postSaveHook($table);
	}

	/**
	 * Method to set new item ordering as first or last.
	 *
	 * @param   JTable $table    Item table to save.
	 * @param   string $position 'first' or other are last.
	 *
	 * @return  void
	 */
	public function setOrderPosition($table, $position = 'last')
	{
		parent::setOrderPosition($table, $position);
	}
}
