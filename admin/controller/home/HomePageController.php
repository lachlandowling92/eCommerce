<?php
include ('admin/model/homePage/HomePages.php');

class HomePageController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $homePage;

	public function __construct() {
		$this -> model = new HomePages();
		$this -> header = SERVERROOT . 'admin/includes/header.php';
		$this -> footer = SERVERROOT . 'admin/includes/footer.php';
		$this -> nav = SERVERROOT . 'admin/includes/nav.php';
	}//end constructor

	public function invoke() {

		if (!isset($_GET['home_articleId'])) {
			include_once 'admin/view/homePage/Read/homePageView.php';
			$HomePageView = new HomePageView('admin/view/homePage/Read/homePageTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getHomePagePosts();
			$HomePageView -> assign($Posts);
		} else {
			include_once 'admin/view/homePage/Read/homePagePostView.php';
			$HomePageView = new HomePagePostView('admin/view/homePage/Read/homePagePostTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getHomePagePost($_GET['home_articleId']);
			$HomePageView -> assign($Posts);
		}
	}

}
