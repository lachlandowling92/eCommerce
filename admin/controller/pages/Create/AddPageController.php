<?php 
require('model/Articles/Articles.php');

class AddArticleController
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

		if(isset($_POST['addPostSubmit']))
		{
			$newArticle = new Articles();
			$newArticle->addArticlePost($_POST['article_title'], $_POST['article_body']);
			header("Location: index.php?location=pages");
		}
			//no special user is requested, we'll show a list of all available users
			$this->template = 'view/Articles/Create/articleAddPostTemplate.php';
			include_once('view/Articles/Create/articleAddPostView.php');
			//create a new view and pass it our template
			
			$view = new ArticlePostView($this->template, $this->header, $this->footer, $this->nav);
	}//end function
}//end class

?>