<?php
	include_once("admin/model/admins/Admins.php");
	class AdminWelcomeController
	{
		private $model;
		private $template;
		private $header;
		private $footer;
		private $nav;
		public function __construct()
		{
			$this->model = new Admins();
			$this->header = 'admin/includes/header.php';
			$this->footer = 'admin/includes/footer.php';
			$this->nav = 'admin/includes/nav.php';
		} //end constructor
		public function invoke()
		{
			if (!isset($_GET['id']))
			{
				$this->template = SERVERROOT . 'admin/view/welcome/AdminWelcomeTemplate.html';
				
				include_once(SERVERROOT . 'admin/view/welcome/AdminWelcomeView.php');
				
				//create a new view and pass it our template
				$view = new AdminWelcomeView($this->template,$this->header,$this->footer,$this->nav);
				
			} // end else
		} // end function
	} //end class