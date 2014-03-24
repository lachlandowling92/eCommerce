<?php
include (SERVERROOT . 'admin/model/blog/Blogs.php');

//Start Class - BlogAdminController
class AdminBlogController 
{
	private $template;
	private $header;
	private $footer;
	private $nav;

	//Start constructor Function
	public function __construct() 
	{
		$this -> model = new Blogs();
		$this -> header = SERVERROOT . 'admin/includes/header.php';
		$this -> footer = SERVERROOT . 'admin/includes/footer.php';
		$this -> nav = SERVERROOT . 'admin/includes/nav.php';
	}//end constructor

	//Start invoke function
	public function invoke() 
	{
		//If session is not existant start session
		if(session_id() == 0) 
		{
			session_start();
		}//End if statement
		
		//If link to edit a blog has been clicked display the edit blog page
		if(isset($_GET['edit']) && isset($_GET['id']))
		{
			include_once SERVERROOT . 'admin/view/blog/editBlog/BlogEditView.php';
			$BlogView = new BlogEditView(SERVERROOT . 'admin/view/blog/editBlog/BlogEditTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getEditBlog($_GET['id']);
			$comments = $this -> model -> getComments($_GET['id']);
			$BlogView -> assign($Posts, $comments);
		}//End if statement
		//If no edit blog link has been pressed then show the blog admin page
		else
		{
			include_once SERVERROOT . 'admin/view/blog/AdminBlogView.php';
			$BlogView = new AdminBlogView(SERVERROOT . 'admin/view/blog/AdminBlogTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getAllBlogPosts();
			$BlogView -> assign($Posts);
		}//End else statement
	}//End function
}//End class
?>
