<?php
include 'publicView/model/Articles/Articles.php';

class ContactController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $articlePage;

	public function __construct() {
		$this -> model = new Articles();
		$this -> header = SERVERROOT . 'includes/header.php';
		$this -> footer = SERVERROOT . 'includes/footer.php';
		$this -> nav = SERVERROOT . 'includes/nav.php';
	}//end constructor

	public function invoke() {

		include_once 'publicView/view/ContactView.php';
		$ContactView = new ContactView('publicView/view/ContactTemplate.html', $this -> header, $this -> footer, $this -> nav);
		$data = 'Home';
		$Posts = $this -> model -> getContactContent($data);
		$ContactView -> assign($Posts, $data);	

	}

}
