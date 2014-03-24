<?php
class routerHome{
	static function routeHome()
	{
		//Switch the page that was sent.
		switch($page)
		{			
			default: 
			{
				include_once ("publicView/controller/HomeController.php");

				$controller = new HomeController();
				$controller -> invoke();
				break;
			}
		}
	}
}