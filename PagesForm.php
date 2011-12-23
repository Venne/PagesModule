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

use Venne\ORM\Column;
use Nette\Utils\Html;
use Venne\Forms\Form;

/**
 * @author Josef Kříž
 */
class PagesForm extends \Venne\Forms\PageForm {



	public function startup()
	{
		parent::startup();

		//$builder = new \Venne\Forms\Builders\EntityBuilder();
		//$builder->build($this, "\\App\\PagesModule\\PagesEntity");

		$this->addGroup("Dates");
		$this->addDateTime("created", "Created")->setDefaultValue(new \Nette\DateTime);
		$this->addDateTime("updated", "Updated")->setDefaultValue(new \Nette\DateTime);

		
		$this->addGroup("Text");
		$this->addEditor("text", "", Null, 20);
	}



	protected function getParams()
	{
		return array(
			"module" => "Pages",
			"presenter" => "Default",
			"action" => "default",
			"url" => isset($this->entity->localUrl) ? $this->entity->localUrl : NULL
		);
	}

}
