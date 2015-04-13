<?php
/**
 * Part of jobs project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Jobs\Uploader;

use Windwalker\Helper\ArrayHelper;

/**
 * The Uploader class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class Uploader
{
	/**
	 * Property files.
	 *
	 * @var  Files
	 */
	protected $files;

	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name;

	/**
	 * Class init
	 *
	 * @param string $name
	 * @param string $path
	 */
	public function __construct($name, $path = null)
	{
		$files = $_FILES;

		if ($path)
		{
			$files = ArrayHelper::getByPath($files, $path, array());
		}

		$files = ArrayHelper::pivot($files);
		$this->files = isset($files[$name]) ? $files[$name] : array();
		$this->name  = $name;
	}

	/**
	 * exists
	 *
	 * @return  boolean
	 */
	public function exists()
	{
		return !empty($this->files);
	}

	/**
	 * getName
	 *
	 * @return  string
	 */
	public function getName()
	{
		return $this->get('name');
	}

	/**
	 * getType
	 *
	 * @return  string
	 */
	public function getType()
	{
		return $this->get('type');
	}

	/**
	 * getTempName
	 *
	 * @return  string
	 */
	public function getTempName()
	{
		return $this->get('tmp_name');
	}

	/**
	 * getError
	 *
	 * @return  string
	 */
	public function getError()
	{
		return $this->get('error');
	}

	/**
	 * getSize
	 *
	 * @return  string
	 */
	public function getSize()
	{
		return $this->get('error');
	}

	/**
	 * get
	 *
	 * @param string $name
	 * @param mixed  $default
	 *
	 * @return  string
	 */
	public function get($name, $default = null)
	{
		if (!$this->exists())
		{
			return $default;
		}

		return ArrayHelper::getValue($this->files, $name, $default);
	}

	/**
	 * upload
	 *
	 * @param string $dest
	 *
	 * @return  static
	 */
	public function upload($dest)
	{
		if ((string) $this->getError() !== '0')
		{
			throw new \RuntimeException('Upload fail', $this->getError());
		}

		\JFolder::create(dirname($dest));

		\JFile::upload($this->getTempName(), $dest);

		return $this;
	}
}
