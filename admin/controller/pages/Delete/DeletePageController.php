<?php 
require('model/Articles/Articles.php');

class DeleteArticleController
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

		if($_GET['deletePost'])
		{
			echo $_GET['deletePost'];
			$deleteArticle = new Articles();
			//$deleteArticle->deleteArticlePost($_POST['article_title'], $_POST['article_body'], $_POST['article_time']);
			$deleteArticle->deleteArticlePost($_GET['deletePost']);
			header("Location: index.php?location=pages");
			//$s = $pdo -> prepare($sql);
			//$pdo->delete($_REQUEST['article_id']);

		}
			//no special user is requested, we'll show a list of all available users
			//$this->template = 'view/admin/articleAddPostTemplate.php';
			//include_once('view/admin/articleAddPostView.php');
			//create a new view and pass it our template
			
			//$view = new ArticlePostView($this->template, $this->header, $this->footer, $this->nav);
	}//end function
}//end class

?>