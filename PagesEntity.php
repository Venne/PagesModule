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
 * @Entity(repositoryClass="\Venne\Doctrine\ORM\BaseRepository")
 * @Table(name="pages")
 * 
 * @property $mainPage
 * @property $title
 * @property $keywords
 * @property $description
 * @property $text
 * @property $created
 * @property $updated
 * @property $website
 * @property $url
 */
class PagesEntity extends BaseEntity {


	const LINK = "Pages:Default:default";
}
