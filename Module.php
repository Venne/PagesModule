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



	public function setRoutes(\Nette\Application\Routers\RouteList $router, $prefix = "")
	{
		$router[] = new \Nette\Application\Routers\Route($prefix . '[<url .+>]', array(
					'module' => 'Pages',
					'presenter' => 'Default',
					'action' => 'default',
					'url' => array(
						\Nette\Application\Routers\Route::VALUE => NULL,
						\Nette\Application\Routers\Route::FILTER_IN => NULL,
						\Nette\Application\Routers\Route::FILTER_OUT => NULL,
					)
						)
		);
	}



	public function configure(\Venne\DI\Container $container, \App\CoreModule\CmsManager $manager)
	{
		parent::configure($container, $manager);

		$manager->addRepository("pages", function() use ($container) {
					return $container->doctrineContainer->getRepository("\\App\\PagesModule\\PagesEntity");
				});

		$manager->addContentType(PagesEntity::LINK, "static pages", array("url"), function($entity) use($container) {
					return new PagesForm($entity, $container->doctrineContainer->entityFormMapper, $container->doctrineContainer->entityManager);
				}, function() use ($container) {
					return $container->pagesRepository->createNew();
				});
	}

}
