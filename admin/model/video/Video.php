<?php
class Video {

private $video_title;
private $video_link;
private $video_description;


	public function __construct($video_title, $video_link, $video_description)
	{
		$this->video_title=$video_title;
		$this->video_link=$video_link;
		$this->video_description=$video_description;
	}
	
	public function getVideoTitle() {
		return $this->video_title;
	}
	
	public function setVideoTitle($video_title) {
		$this->video_title = $video_title;
	}
		
		
		public function getVideoLink() {
		return $this->video_link;
	}
	
	public function setVideoLink($video_link) {
		$this->video_link = $video_link;
	}
	
		public function getVideoDescription() {
		return $this->video_description;
	}
	
	public function setVideoDescription($video_description) {
		$this->video_description = $video_description;
		}
		
	}

?>