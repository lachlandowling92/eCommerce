<?php
class routerAbout{
	static function routeAbout()
	{
		//Switch the page that was sent.
		switch($page)
		{			
			default: 
			{
				include_once ("publicView/controller/about/AboutController.php");

				$controller = new AboutController();
				$controller -> invoke();
				break;
			}
		}
	}
}