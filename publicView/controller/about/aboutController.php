<?php
//include 'publicView/model/Articles/Articles.php';

class AboutController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $articlePage;

	public function __construct() {
		//$this -> model = new Articles();
		$this -> header = 'includes/header.php';
		$this -> footer = 'includes/footer.php';
		$this -> nav = 'includes/nav.php';
	}//end constructor

	public function invoke() {
				include_once 'publicView/view/about/AboutView.php';
				$HomeView = new AboutView('publicView/view/about/AboutTemplate.html', $this -> header, $this -> footer, $this -> nav);
				$HomeView -> assign();	

	}

}
