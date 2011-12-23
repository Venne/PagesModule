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

use Nette\DI\ContainerBuilder;

/**
 * @author Josef Kříž
 */
class Module extends \Venne\Module\AutoModule {



	public function getName()
	{
		return "pages";
	}



	public function getDescription()
	{
		return "Make basic static pages.";
	}



	public function getVersion()
	{
		return "2.0";
	}



	public function getDependencies()
	{
		return array();
	}



	public function loadConfiguration(ContainerBuilder $container, array $config)
	{
		$container->addDefinition("pagesRepository")
				->setClass("Venne\Doctrine\ORM\BaseRepository")
				->setFactory("@entityManager::getRepository", array("\\App\\PagesModule\\PagesEntity"))
				->addTag("repository")
				->setAutowired(false);
	}



	public function configure(\Nette\DI\Container $container, \App\CoreModule\CmsManager $manager)
	{
		parent::configure($container, $manager);

		$manager->addContentType(PagesEntity::LINK, "static pages", array("url"), function($entity) use($container) {
					return new PagesForm($container->entityFormMapper, $container->entityManager, $entity);
				}, function() use ($container) {
					return $container->pagesRepository->createNew();
				});
	}

}
