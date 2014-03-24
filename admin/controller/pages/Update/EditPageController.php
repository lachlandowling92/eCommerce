<?php 
require('model/Articles/Articles.php');

class EditArticleController
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
		if(isset($_POST['editPostSubmit']))
		{
			$editArticle = new Articles();
			//$editArticle->editArticlePost($_POST['article_title'], $_POST['article_body'], $_POST['article_time']);
			
			$data = $editArticle->editArticlePostSubmit($_POST['article_id'], $_POST['article_title'], $_POST['article_body']);
			header("Location: index.php?location=pages");
		}
		
		

		if(isset($_GET['editPost']))
		{

			$editArticle = new Articles();
			//$editArticle->editArticlePost($_POST['article_title'], $_POST['article_body'], $_POST['article_time']);
			//header("Location: index.php");
			$data = $editArticle->editArticlePost($_GET['editPost']);
		}

		
			//no special user is requested, we'll show a list of all available users
			$this->template = 'view/Articles/Update/articleEditPostTemplate.php';
			include_once('view/Articles/Update/articleEditPostView.php');
			//create a new view and pass it our template
			
			//$view = new ArticlePostView($this->template, $this->header, $this->footer, $this->nav);
			$view = new ArticleEditPostView($this->template, $this->header, $this->footer, $this->nav);
			$view->assign($data);
			
			
		
	}//end function
}//end class
?>