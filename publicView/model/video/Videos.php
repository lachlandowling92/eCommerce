<?php
class Videos {
	
	public function addVideo($video_title, $video_link, $video_description)
	{
		include SERVERROOT . "includes/connection.php";
		
		try{
		$sql = "INSERT into videos (video_title, video_link, video_description, upload_date) values (:video_title, :video_link, :video_description, NOW() )";
		$query = $pdo->prepare($sql);
		$query->bindValue(':video_title', $video_title);
		$query->bindValue(':video_link', $video_link); 
		$query->bindValue('video_description', $video_description);
		$query->execute();
		}catch(PDOException $e){
		die($e); 
		}
	}
	/*
	 * Name: getVideosByDate
	 * Author: Emma Barry
	 *
	 * Description: Gets all videos ordered by date
	 *
	 * Input: None
	 * Output: Array that contains the videos in it.
	*/
	public function getVideosByDate()
	{
		include SERVERROOT . "includes/connection.php";
		try{
			$sql = "SELECT * from videos ORDER BY upload_date DESC";
			$query = $pdo->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		
		}catch(PDOException $e){
			die($e);
		
		}
	}
	
		/*
	 * Name: getVideosByDate
	 * Author: Emma Barry
	 *
	 * Description: Gets all videos ordered by date
	 *
	 * Input: None
	 * Output: Array that contains the videos in it.
	*/
	public function getAllVideos()
	{
		include SERVERROOT . "includes/connection.php";
		try{
			$sql = "SELECT * from videos";
			$query = $pdo->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		
		}catch(PDOException $e){
			die($e);
		
		}
	}
	
	/*
	 * Name: getVideosBySelected
	 * Author: Nick McMahon
	 *
	 * Description: Gets requested video, then all other videos, ordered by date
	 * 
	 * Input: VideoId
	 * Output: Array that contains the requested video, then all other videos in it.
	 *
	*/
	public function getVideosBySelected($videoId)
	{
		include SERVERROOT . "includes/connection.php";
		try{
			$sql = "SELECT * from videos WHERE video_id = :videoId ORDER BY upload_date DESC";
			$query = $pdo->prepare($sql);
			$query ->bindValue(':videoId', $videoId);
			$query->execute();
			$video = $query->fetch();
			
			$sql = "SELECT * from videos WHERE video_id != :videoId ORDER BY upload_date DESC";
			$query = $pdo->prepare($sql);
			$query ->bindValue(':videoId', $videoId);
			$query->execute();
			$otherVideos = $query->fetchAll();
			
			$allVideos = array();
			$allVideos[0] = $video;
			$videoCount = 1;
			foreach($otherVideos as $videoRow)
			{
				$allVideos[$videoCount] = $videoRow;
				$videoCount++;
			}
			
			return $allVideos;
		
		}catch(PDOException $e){
			die($e);
		
		}
		
	}

}	
?>