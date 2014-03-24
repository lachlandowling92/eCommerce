<?php

//Need to fetch teamMembers model later
include (SERVERROOT . 'admin/model/video/Videos.php');

class VideoAdminController {
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;

	public function __construct() {
		$this -> model = new Videos();
		$this -> header = SERVERROOT . 'admin/includes/header.php';
		$this -> footer = SERVERROOT . 'admin/includes/footer.php';
		$this -> nav = SERVERROOT . 'admin/includes/nav.php';
	}//end constructor

	public function invoke() {
		if(isset($_POST) && $_POST != NULL) {
			$this->model->addVideo($_POST['video_title'], $_POST['video_link'], $_POST['video_description']);
		}
		
		if($_GET != NULL && $_GET['action'] == 'videos')
		{
			include_once SERVERROOT . 'admin/view/videos/viewVideos/videoAdminView.php';
			
			$VideoAdminView = new VideoAdminView(SERVERROOT . 'admin/view/videos/viewVideos/videoAdminTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$allVideos = $this->model->getAllVideos();
			$VideoAdminView -> assign($allVideos);
		}
		else
		{
			include_once SERVERROOT . 'admin/view/video/createVideo/createVideoView.php';
			$CreateVideoView = new CreateVideoView(SERVERROOT . 'admin/view/video/createVideo/CreateVideoTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$CreateVideoView -> assign();
		}

	}

}
