<?php

/**
 * This file is part of the Venne:CMS (https://github.com/Venne)
 *
 * Copyright (c) 2011, 2012 Josef Kříž (http://www.josef-kriz.cz)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace PagesModule\Forms;

use Venne\Forms\Mapping\EntityFormMapper;
use Doctrine\ORM\EntityManager;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 */
class PagesForm extends \Venne\Forms\PageForm
{


	/**
	 * @param EntityFormMapper $mapper
	 * @param EntityManager $entityManager
	 */
	public function __construct(EntityFormMapper $mapper, EntityManager $entityManager)
	{
		$this->onSuccess[] = \callback($this, "basePathEncode");
		parent::__construct($mapper, $entityManager);
	}



	public function startup()
	{
		parent::startup();

		$this->addGroup("Dates");
		$this->addDateTime("created", "Created")->setDefaultValue(new \Nette\DateTime);
		$this->addDateTime("updated", "Updated")->setDefaultValue(new \Nette\DateTime);

		$this->addGroup("Text");
		$this->addContentEditor("text", NULL, Null, 20);
	}



	/**
	 * @param Nette\ComponentModel\Container $obj
	 */
	protected function attached($obj)
	{
		if ($obj instanceof \Nette\Application\UI\Presenter) {
			if (!$this->isSubmitted()) {
				$this->basePathDecode();
			}
		}

		parent::attached($obj);
	}



	public function basePathDecode()
	{
		$text = $this->entity->text;
		$text = str_replace('src="{$basePath}', 'src="' . $this->presenter->template->basePath, $text);
		$text = str_replace('href="{$basePath}', 'href="' . $this->presenter->template->basePath, $text);
		$this->entity->text = $text;
	}



	public function basePathEncode()
	{
		$text = $this->entity->text;
		$text = str_replace('src="' . $this->presenter->template->basePath, 'src="{$basePath}', $text);
		$text = str_replace('href="' . $this->presenter->template->basePath, 'href="{$basePath}', $text);
		$this->entity->text = $text;
	}



	protected function getParams()
	{
		return array("module" => "Pages", "presenter" => "Default", "action" => "default", "url" => isset($this->entity->url) ? $this->entity->url : NULL);
	}

}
