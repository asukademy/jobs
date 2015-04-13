<?php
/**
 * Part of jobs project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Jobs\Controller\Job;

use Jobs\Uploader\Uploader;
use Windwalker\Data\Data;

/**
 * The SaveController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class SaveController extends \Windwalker\Controller\Edit\SaveController
{
	/**
	 * postSaveHook
	 *
	 * @param \Windwalker\Model\CrudModel $model
	 * @param array                       $validData
	 *
	 * @return  void
	 */
	protected function postSaveHook($model, $validData)
	{
		$data = new Data;
		$data->id = $model->getState()->get('item.id');

//		// LOGO
//		$logoUploader = new Uploader('logo_upload', 'jform');
//
//		$logoUploader->upload(JPATH_ROOT . '/tmp/test/' . $logoUploader->getName());
//
//		// Image
//		$imgUploader = new Uploader('images_upload', 'jform');
//
//		$imgUploader->upload(JPATH_ROOT . '/tmp/test/' . $logoUploader->getName());
	}
}
