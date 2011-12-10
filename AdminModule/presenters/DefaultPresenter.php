<?php

namespace App\PagesModule\AdminModule;

use Nette\Forms\Form;
use Nette\Web\Html;

/**
 * @author Josef Kříž
 * 
 * @secured
 */
class DefaultPresenter extends \Venne\Application\UI\AdminPresenter {


	/** @persistent */
	public $id;



	/**
	 * @privilege read
	 */
	public function startup()
	{
		parent::startup();
		$this->addPath("Pages", $this->link(":Pages:Admin:Default:"));
	}



	public function actionCreate()
	{
		$this->addPath("new item", $this->link(":Pages:Admin:Default:create"));
	}



	public function actionEdit()
	{
		$this->addPath("Edit ({$this->id})", $this->link(":Pages:Admin:Default:edit"));
	}



	public function createComponentForm($name)
	{
		$repository = $this->context->pagesRepository;
		$entity = $this->context->pagesRepository->createNew();
		$em = $this->context->doctrineContainer->entityManager;
		
		$form = new \App\PagesModule\PagesForm($entity, $this->context->doctrineContainer->entityFormMapper, $em);
		$form->setSuccessLink("default");
		$form->setFlashMessage("Page has been created");
		$form->setSubmitLabel("Create");
		$form->onSave[] = function($form) use ($repository){
			$repository->save($form->entity);
		};
		return $form;
	}



	public function createComponentFormEdit($name)
	{
		$repository = $this->context->pagesRepository;
		$entity = $this->context->pagesRepository->find($this->id);
		$em = $this->context->doctrineContainer->entityManager;
		
		$form = new \App\PagesModule\PagesForm($entity, $this->context->doctrineContainer->entityFormMapper, $em);
		$form->setSuccessLink("this");
		$form->setFlashMessage("Page has been updated");
		//$form->setSubmitLabel("Update");
		$form->onSave[] = function($form) use ($repository){
			$repository->save($form->entity);
		};
		return $form;
	}



	public function beforeRender()
	{
		parent::beforeRender();
		$this->setTitle("Venne:CMS | Pages administration");
		$this->setKeywords("pages administration");
		$this->setDescription("pages administration");
		$this->setRobots(self::ROBOTS_NOINDEX | self::ROBOTS_NOFOLLOW);
	}



	public function handleDelete($id)
	{
		$this->context->pagesRepository->delete($this->context->pagesRepository->find($this->id));
		$this->flashMessage("Page has been deleted", "success");
		$this->redirect("this", array("id" => NULL));
	}



	public function renderDefault()
	{
		$this->template->table = $this->context->pagesRepository->findAll();
	}

}