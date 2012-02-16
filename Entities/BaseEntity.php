<?php

/**
 * This file is part of the Venne:CMS (https://github.com/Venne)
 *
 * Copyright (c) 2011, 2012 Josef Kříž (http://www.josef-kriz.cz)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace App\PagesModule\Entities;

use Venne;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 *
 * @property $text
 * @property $created
 * @property $updated
 * @property $website
 */
class BaseEntity extends \App\CoreModule\Entities\BasePageEntity
{

	/**
	 * @Column(type="datetime")
	 */
	protected $created;

	/**
	 * @Column(type="datetime")
	 */
	protected $updated;

	/**
	 * @Column(type="text")
	 */
	protected $text;



	public function __construct()
	{
		$this->created = new \Nette\DateTime;
		$this->updated = new \Nette\DateTime;
	}



	/**
	 * @param string $created
	 */
	public function setCreated($created)
	{
		$this->created = $created;
	}



	/**
	 * @return string
	 */
	public function getCreated()
	{
		return $this->created;
	}



	/**
	 * @param string $updated
	 */
	public function setUpdated($updated)
	{
		$this->updated = $updated;
	}



	/**
	 * @return string
	 */
	public function getUpdated()
	{
		return $this->updated;
	}



	/**
	 * @param string $url
	 */
	public function setExpired($url)
	{
		$this->url = $url;
	}



	/**
	 * @return string
	 */
	public function getExpired()
	{
		return $this->url;
	}



	/**
	 * @param string $mainPage
	 */
	public function setMainPage($mainPage)
	{

	}



	/**
	 * @return string
	 */
	public function getMainPage()
	{
		return (bool)($this->getLocalUrl() == "");
	}



	/**
	 * @param string $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}



	/**
	 * @return string
	 */
	public function getText()
	{
		return $this->text;
	}

}
