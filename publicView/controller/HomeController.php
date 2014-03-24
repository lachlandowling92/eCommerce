<?php
include 'publicView/model/item/Items.php';

class HomeController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $articlePage;

	public function __construct() {
		$this -> model = new Items();
		$this -> header = 'includes/header.php';
		$this -> footer = 'includes/footer.php';
		$this -> nav = 'includes/nav.php';
	}//end constructor

	public function invoke() {
				$items = $this -> model -> getHomePageItems();
				include_once 'publicView/view/home/HomeView.php';
				$HomeView = new HomeView('publicView/view/home/HomeTemplate.html', $this -> header, $this -> footer, $this -> nav);
				$HomeView -> assign($items);	

	}

}
