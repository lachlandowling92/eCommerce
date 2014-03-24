<?php
include 'publicView/model/Articles/Articles.php';

class PageController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $articlePage;

	public function __construct() {
		$this -> model = new Articles();
		$this -> header = 'includes/header.php';
		$this -> footer = 'includes/footer.php';
		$this -> nav = 'includes/nav.php';
	}//end constructor

	public function invoke($articleId) {
		include_once 'publicView/view/PageView.php';
		$PageView = new PageView('publicView/view/PageTemplate.html', $this -> header, $this -> footer, $this -> nav);
		$Posts = $this -> model -> getPageContent($articleId);
		$PageView -> assign($Posts);
	}

}