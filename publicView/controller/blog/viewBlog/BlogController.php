<?php
if(session_id() == 0) {
    // session isn't started
    session_start();
}
include SERVERROOT . 'publicView/model/Articles/Articles.php';
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
 
			include_once SERVERROOT . 'publicView/view/blog/viewBlog/blogView.php';
			$BlogView = new BlogView(SERVERROOT . 'publicView/view/blog/viewBlog/blogTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Posts = $this -> model -> getBlogPosts();
			$articleId = '26';
			$ArticlesModel = new Articles();
			$blogNotice = $ArticlesModel -> getPageContent($articleId);
			$userDetails = $this -> userModel -> getUserDetails($user_id);
			$BlogView -> assign($Posts, $userDetails, NULL, $blogNotice);
		}//End else Statement
}//End Class
?>
