<?php 
require('model/homePage/HomePages.php');

class EditHomePageController
{
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $login;
	
	public function __construct()
	{
		$this->header = 'includes/header.php';
		$this->footer= 'includes/footer.php';
		$this->nav = 'includes/nav.php';
	
	}//end constructor
	
	public function invoke()
	{
		if(isset($_POST['editHomeSubmit']))
		{
			$editHomePage = new HomePages();			
			$data = $editHomePage->editHomePagePostSubmit($_POST['article_id'], $_POST['article_title'], $_POST['article_body']);
			header("Location: index.php?location=home_page");
		}

		if(isset($_GET['editHome']))
		{

			$editHomePage = new HomePages();
			$data = $editHomePage->editHomePagePost($_GET['editHome']);
		}

		//no special user is requested, we'll show a list of all available users
		$this->template = 'view/homePage/Update/homePageEditPostTemplate.php';
		include_once('view/homePage/Update/homePageEditPostView.php');
		//create a new view and pass it our template
		
		$view = new HomePageEditPostView($this->template, $this->header, $this->footer, $this->nav);
		$view->assign($data);

		
	}//end function
}//end class
?>