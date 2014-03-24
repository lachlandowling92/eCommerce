<?php 
require(SERVERROOT . 'BlogMVC/model/blog/Blogs.php');

//Start Class - AddBlog Controller
class AddBlogController
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
		//Run if Add Blog post button is pressed
		if(isset($_POST['addPostSubmit']))
		{
			$newBlog = new Blogs();
			$newBlog->addBlogPost($_POST['title'], $_POST['body'], $_POST['blogAuthor'], $_POST['postTime']);
			header("Location: index.php");
		}
		//If the add blog post button is not pressed show the add blog form
		else
		{
			$this->template = SERVERROOT . 'BlogMVC/view/blog/postBlog/blogAddPostTemplate.php';
			include_once(SERVERROOT . 'BlogMVC/view/blog/postBlog/blogAddPostView.php');
			//create a new view and pass it our template
			$view = new BlogPostView($this->template, $this->header, $this->footer, $this->nav);
		}
	}//end function
}//end class
?>