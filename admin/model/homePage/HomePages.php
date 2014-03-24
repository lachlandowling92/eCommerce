<?php
include_once ("admin/model/homePage/HomePage.php");
?>
<?php
class HomePages {
	
	//Gets a page of article posts. A page is 5 posts long
	public function getHomePagePosts() {

		include ("includes/connection.php"); //Include pdo
		
		try {
			//Select all data from article, between limit1 and limit2
			$sql = "SELECT * FROM homeArticles ORDER BY article_id DESC";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();
		} catch (PDOException $e) {
			return null;
		}

	}// end function

	//Fetches a specific article post.
	public function getHomePagePost($articleId) {
		
		$allPosts = $this -> getHomePagePosts();
		
		foreach($allPosts as $post)
		{
			if($post['article_id'] == $articleId)
			{
				return $post;
			}
		}
		return null;
	}//end function
	
	public function editHomePagePost($articleId){
		require("includes/connection.php");
		$sql="SELECT * FROM homeArticles WHERE article_id='$articleId'";
		$s = $pdo -> prepare($sql);
		$s -> execute();
		return $s -> fetch();
		
	}
	
	public function editHomePagePostSubmit($articleId, $articleTitle, $articleBody){
		require("includes/connection.php");
		$sql = "UPDATE homeArticles SET article_title=:article_title, article_body=:article_body, article_last_modified=NOW() WHERE article_id='$articleId';";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':article_title', $articleTitle);
		$s -> bindValue(':article_body', $articleBody);
		$s -> execute();
		
	}
}//end class
?>