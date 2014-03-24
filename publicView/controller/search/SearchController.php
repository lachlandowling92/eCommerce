<?php
include 'publicView/model/item/Items.php';

class SearchController {
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
				if($_POST != NULL){
				$items = $this -> model -> getSearchItems($_POST['searchTerm'], $_POST['category']);
				include_once 'publicView/view/search/SearchView.php';
				$HomeView = new SearchView('publicView/view/search/SearchTemplate.html', $this -> header, $this -> footer, $this -> nav);
				$HomeView -> assign($items);	
			}
			else{
				header("Location:" . SITEROOT);
			}

	}

}
