<?php
include ('admin/model/pages/Pages.php');

class PagesController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $articlePage;

	public function __construct() {
		$this -> model = new Pages();
		$this -> header = SERVERROOT . 'admin/includes/header.php';
		$this -> footer = SERVERROOT . 'admin/includes/footer.php';
		$this -> nav = SERVERROOT . 'admin/includes/nav.php';
	}//end constructor

	public function invoke() {

		if (!isset($_GET['articleId'])) {
			include_once SERVERROOT . 'admin/view/pages/Read/pageView.php';
			$ArticleView = new PageView(SERVERROOT . 'admin/view/pages/Read/pageTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getArticlePosts();
			$ArticleView -> assign($Posts);
		} else {
			include_once SERVERROOT . 'admin/view/pages/Read/pagePostView.php';
			$ArticleView = new PagePostView(SERVERROOT . 'admin/view/pages/Read/pagePostTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getArticlePost($_GET['articleId']);
			$ArticleView -> assign($Posts);
		}
	}

}
