<?php 
require(SERVERROOT . 'publicView/model/blog/Blogs.php');

//Start Class - AddBlog Controller
class AddCommentController
{
	private $template;
	private $header;
	private $footer;
	private $nav;
	
	//Start Function - Construct
	public function __construct()
	{
		$this -> header = SERVERROOT . 'BlogMVC/includes/header.php';
		$this -> footer = SERVERROOT . 'BlogMVC/includes/footer.php';
		$this -> nav = SERVERROOT . 'BlogMVC/includes/nav.php';
	
	}//end constructor
	
	//Start Function - Invoke
	public function invoke()
	{
			session_start();
			$newComment = new Blogs();
			$newComment->addComment($_GET['blogId'], $_POST['commentContent'], $_SESSION['user_id']);
			header("Location: index.php/?blog&action=view&blogId=".$_GET['blogId']);
	}//end function
}//end class
?>