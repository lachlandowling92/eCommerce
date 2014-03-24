<?php
include('routeHome.php');
include('routeAbout.php');
//Information on how the router sees the requests
class Router {
	

	function routeBlog($page = null, $key)
	{	//Switch the page that was sent.
		
		switch(current($key))
		{
			case 'view': {
				next($key);
				if(key($key) == "blogId")
				{
					include_once ("publicView/controller/blog/viewSingleBlog/SingleBlogController.php");
					$controller = new BlogController();
					$controller -> invoke();
				}
				else
				{
					include_once ("publicView/controller/blog/viewBlog/BlogController.php");
					$controller = new BlogController();
					$controller -> invoke();
				}
				break;
			}			
			
			default: {
				include_once ("publicView/controller/blog/viewBlog/BlogController.php");
				$controller = new BlogController();
				$controller -> invoke();
				break;
			}
		}
	}

	static function routeSearch()
	{
		//Switch the page that was sent.
		switch($page)
		{			
			default: 
			{
				include_once ("publicView/controller/search/SearchController.php");

				$controller = new SearchController();
				$controller -> invoke();
				break;
			}
		}
	}

	function routeLogin()
	{
		//Re-declare phpBB functions and variables. It doesn't like functions much.
		define('IN_PHPBB', true);
		global $db, $cache, $config, $user, $phpbb_root_path, $phpEx, $template, $auth;
		$phpbb_root_path = './forum/';
		$phpEx = "php";
		include_once($phpbb_root_path.'common.'.$phpEx);

		$user->session_begin();
		$auth->acl($user->data);
		$user->setup();
		//Call the function to handle forum logins
		forumLogin($user);
	}
	function routeLogout()
	{	//Switch the page that was sent.
				include_once ("Secure_Login/controller/logout/LogoutController.php");
				$controller = new LogoutController();
				$controller -> invoke();
	}
	
	function routeContact($page = null, $key)
	{	//Switch the page that was sent.
		
		switch(current($key))
		{	
			case 'view': {
				include_once ("publicView/controller/contactController.php");
				$controller = new ContactController();
				$controller -> invoke();
				break;
			}
			default: {
				include_once ("main/controller/contactController.php");
				$controller = new ContactController();
				$controller -> invoke();
				break;
			}
		}
	}
	
	function routeAdmin($page = null, $key)
	{	//Switch the page that was sent.
		
		switch(current($key))
		{	
			case 'editHome': {
				include_once ("admin/controller/home/HomePageController.php");
				$controller = new HomePageController();
				$controller -> invoke();
				break;
			}
			case 'pages': {
				include_once ("admin/controller/pages/PagesController.php");
				$controller = new PagesController();
				$controller -> invoke();
				break;
			}
			case 'videos': {
				include_once ("admin/controller/videos/videoAdminController.php");
				$controller = new VideoAdminController();
				$controller -> invoke();
				break;
			}
			case 'welcome': {
				include_once ("admin/controller/welcome/AdminWelcomeController.php");
				$controller = new AdminWelcomeController();
				$controller -> invoke();
				break;
			}
			case 'blogs': {
				include_once ("admin/controller/blog/AdminBlogController.php");
				$controller = new AdminBlogController();
				$controller -> invoke();
				break;
			}
			default: {
				include_once ("admin/controller/welcome/AdminWelcomeController.php");
				$controller = new AdminWelcomeController();
				$controller -> invoke();
				break;
			}
		}
	}
	

	
	//Main route function called by index
	static public function route()
	{ //If $_GET is set and contains data
		if(isset($_GET) && $_GET != NULL) 
		{
			$key = key($_GET);
			//Switch the get variables. Here's where you select the first GET variable (someurl.com/?getVariable1)
			switch($key) 
			{
				case 'login': 
				{
					Router::routeLogin();
					break;
				}
				case 'blog': 
				{
					next($_GET);
					$key = key($_GET);
					Router::routeBlog($key, $_GET);
					break;
				}
				case 'about': 
				{
					next($_GET);
					$key = key($_GET);
					RouterAbout::routeAbout($key, $_GET);
					break;
				}
				case 'contact': 
				{
					next($_GET);
					$key = key($_GET);
					Router::routeContact($key, $_GET);
					break;
				}				
				case 'logout':
				{
					Router::routeLogout();
					break;
				}
				case 'admin':
				{
					next($_GET);
					$key = key($_GET);
					Router::routeAdmin($key, $_GET);
					break;
				}
				case 'search':
				{
					next($_GET);
					$key = key($_GET);
					Router::routeSearch($key, $_GET);
					break;
				}
				
				default: 
				{
					RouterHome::routeHome();
					break;
				}
			}
		}
		else { //$key is null
			RouterHome::routeHome();
		}
	}
	
}//end class
?>