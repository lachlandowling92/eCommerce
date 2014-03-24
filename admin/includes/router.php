<?php
//Information on how the router sees the requests
class Router {
	public function __construct() {

	}//end construct

	static public function route($dest = null) {
		//var_dump($dest);

			//fetch the passed request
			$request = $_SERVER['QUERY_STRING'];

			//parse the page request and other GET variables
			$parsed = explode('&', $request);

			//the location is the first element
			$location = array_shift($parsed);

			$page = explode('=', $location);

			//the rest of the array are get statements, parse them out
			$getVars = array();

			foreach ($parsed as $argument) {
				//explode GET vars along '=' symbol to separate variable, values
				list($variable, $value) = explode('=', $argument);
				$getVars[$variable] = $value;
			}//endforeach

			if(isset($page[1]))
			{
				if($page[1] == "pages")
				{
					include_once("controller/Articles/ArticleController.php");
					$controller = new ArticleController();
					$controller->invoke();
				}
				if($page[1] == "home_page")
				{
					include_once("controller/homePage/HomePageController.php");
					$controller = new HomePageController();
					$controller->invoke();
				}
				else if ($dest == "editHome") 
				{
					include_once ("controller/homePage/Update/EditHomePageController.php");
					$controller = new EditHomePageController();
					$controller -> invoke();
				}
				else if ($dest == "delete") {

					include_once ("controller/Articles/Delete/DeleteArticleController.php");

					$controller = new DeleteArticleController();
					$controller -> invoke();
					//Invoke article controller with first page of posts
				}//end else if
				else if ($dest == "edit") {
					include_once ("controller/Articles/Update/EditArticleController.php");

					$controller = new EditArticleController();
					$controller -> invoke();
					//Invoke article controller with first page of posts
				}//end else if
				else if ($dest == "slideshow") {

					include_once ("controller/Files/FileController.php");

					$controller = new FileController();
					$controller -> invoke();
					//Invoke article controller with first page of posts
				}//end else if
				else if ($page[1] == "logout") {
					/*echo "The page you requested is '$page[1]' Get details of a user with id of " . $_GET['id'];
					echo '<br/>';
					$vars = print_r($getVars, TRUE);
					echo "The following GET vars were passed to the page:<pre>" . $vars . "</pre>";*/

					include_once ("controller/logout/logoutController.php");

					$controller = new LogoutController();
					$controller -> invoke();

				}//end else if
				
				else if ($page[0] == "articleId") {//If url is ?articleId=x
					include_once ("controller/Articles/ArticleController.php");

					$controller = new ArticleController();
					$controller -> invoke($page[1]);
					//Invoke blog controller with the required page
				}
				
				else if ($page[0] == "home_articleId") {//If url is ?articleId=x
					include_once ("controller/homePage/HomePageController.php");

					$controller = new HomePageController();
					$controller -> invoke($page[1]);
					//Invoke blog controller with the required page
				}

				//end else if
			}//end if
			else if (isset($_GET['editPost'])) {
				include_once ("controller/Articles/Update/EditArticleController.php");

				$controller = new EditArticleController();
				$controller -> invoke();
			} else if (isset($_GET['editHome'])) {
				include_once ("controller/homePage/Update/EditHomePageController.php");

				$controller = new EditHomePageController();
				$controller -> invoke();	
			} else if (isset($_GET['addPost'])) {
				include_once ("controller/Articles/Create/AddArticleController.php");

				$controller = new AddArticleController();
				$controller -> invoke();
			} else if (isset($_GET['addPost'])) {
				include_once ("controller/Articles/ArticleController.php");

				$controller = new AddArticleController();
				$controller -> invoke();
			} 
			else {//If they just load the home page, with no arguments
				include_once ("controller/AdminController.php");

				$controller = new AdminController();
				$controller -> invoke(1);
				//Invoke article controller with first page of posts
			}//end else
	}//end route

	Static public function routeHome() {
		include_once ("controller/AdminController.php");

		$controller = new AdminController();
		$controller -> invoke(1);
		//Invoke article controller with first page of posts

	}

}//end class
?>