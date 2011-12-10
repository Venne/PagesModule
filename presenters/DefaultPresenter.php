<?php

namespace App\PagesModule;

use Nette\Environment;

/**
 * @author Josef Kříž
 * 
 * @secured
 */
class DefaultPresenter extends \Venne\Application\UI\PagePresenter {



	/**
	 * @privilege read
	 */
	public function startup()
	{
		parent::startup();

		$this->template->entity = $this->context->pagesRepository->findOneBy(array("page" => $this->page->id));

		if (!$this->template->entity && !$this->url) {
			$this->template->entity = $this->context->pagesRepository->findOneBy(array("mainPage" => true));
			if (!$this->template->entity) {
				throw new \Nette\Application\BadRequestException;
			}
			$this->url = $this->template->entity->url;
		}

		if (!$this->template->entity) {
			throw new \Nette\Application\BadRequestException;
		}

		$this->contentExtensionsKey = $this->template->entity->id;
	}

}