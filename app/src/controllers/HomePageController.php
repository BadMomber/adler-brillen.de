<?php
namespace app\controllers;
use PageController;
use app\pages\NewsPage;
use SilverStripe\Core\Config\Config;
class HomePageController extends PageController
{	/**
	* Returns a limited list of latest news in the site sorted in descending order by creation date.
	*/
	public function getNews():\SilverStripe\ORM\DataList{
		$limit = Config::inst()->get('app\pages\NewsPage', 'news_page_size');
		$news = NewsPage::get()->limit($limit);
		
		return $news;
	}
}
