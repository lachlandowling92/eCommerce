<?php
if(session_id() == 0) {
    // session isn't started
    session_start();
}
include SERVERROOT . 'publicView/model/blog/Blogs.php';
include SERVERROOT . 'publicView/model/users/Users.php';

//Start BlogController class
class BlogController 
{
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $blogPage;
	
	//Start construct function 
	public function __construct() 
	{
		$this -> model = new Blogs();
		$this -> userModel = new Users();
		$this -> header = SERVERROOT . '/includes/header.php';
		$this -> footer = SERVERROOT . '/includes/footer.php';
		$this -> nav = SERVERROOT . '/includes/nav.php';
	}//end constructor
	
	//Start invoke function
	public function invoke() 
	{
	//If username is set in the session variable then set that value to local variable called userName
		if(isset($_SESSION['user_id']))
		{
			$user_id = $_SESSION['user_id'];
		}//End if statement
		//If username is not set in the session variable then set local variable userName to NULL
		else
		{
			$user_id = NULL;
		}//End else statement
	//If blog id is set then show specific blog post
		if (isset($_GET['blogId']))
		{
			include_once SERVERROOT . 'publicView/view/blog/viewSingleBlog/blogPostView.php';
			$BlogView = new BlogView(SERVERROOT . 'publicView/view/blog/viewSingleBlog/blogPostTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getBlogPost($_GET['blogId']);
			$comments = $this -> model -> getComments($_GET['blogId']);
			$userDetails = $this -> userModel -> getUserDetails($user_id);
			$BlogView -> assign($Posts, $comments, $userDetails);
		}//End if statement
		
		else if(isset($_GET['addComment']))
		{
			$newBlog = new Blogs();
			$newBlog -> addComment($_POST['blogId'], $_POST['commentContent'], $_SESSION['username']);
		}//End else if statement
		//If nothing is pressed or set, then load the blog homepage
		
	}
}
		