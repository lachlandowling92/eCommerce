<?php

//Need to fetch teamMembers model later
include ('publicView/model/video/Videos.php');

class VideoController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;

	public function __construct() {
		$this -> model = new Videos();
		$this -> header = 'includes/header.php';
		$this -> footer = 'includes/footer.php';
		$this -> nav = 'includes/nav.php';
	}//end constructor

	public function invoke() {
		
		if($_GET != NULL && $_GET['action'] == 'view')
		{
			include_once 'publicView/view/videos/VideoView.php';
			
			
			$videosView = new VideoView('publicView/view/videos/VideoTemplate.php', $this -> header, $this -> footer, $this -> nav);
			
			if(isset($_GET['videoId']))
				$allVideos = $this->model->getVideosBySelected($_GET['videoId']);
			else
				$allVideos = $this->model->getVideosByDate();
			
			$videosView -> assign($allVideos);
		}
		else
		{
		
		}

	}

}
