<?php

/**
 * Venne:CMS (version 2.0-dev released on $WCDATE$)
 *
 * Copyright (c) 2011 Josef Kříž pepakriz@gmail.com
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace App\PagesModule;

/**
 * @author Josef Kříž
 * 
 * @property $text
 * @property $created
 * @property $updated
 * @property $website
 */
class BaseEntity extends \App\CoreModule\BasePageEntity {



	public function __construct()
	{
		$this->created = new \Nette\DateTime;
		$this->updated = new \Nette\DateTime;
	}

	/**
	 * @Column(type="datetime")
	 * @Form(group=Dates)
	 */
	protected $created;

	/**
	 * @Column(type="datetime")
	 * @Form
	 */
	protected $updated;

	/**
	 * @Column(type="text")
	 * @Form(type=editor, group=Text, label="")
	 */
	protected $text;



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
		$this->mainPage = $mainPage;
	}



	/**
	 * @return string 
	 */
	public function getMainPage()
	{
		return $this->mainPage;
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
