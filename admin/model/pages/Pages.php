<?php
include_once ("admin/model/pages/Pages.php");

class Pages {
	
	//Gets a page of article posts. A page is 5 posts long
	public function getArticlePosts() {

		include ("includes/connection.php"); //Include pdo
		
		try {
			//Select all data from article, between limit1 and limit2
			$sql = "SELECT * FROM CarleyArticle ORDER BY article_id DESC";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();
		} catch (PDOException $e) {
			return null;
		}

	}// end function

	//Fetches a specific article post.
	public function getArticlePost($articleId) {
		
		$allPosts = $this -> getArticlePosts();
		
		foreach($allPosts as $post)
		{
			if($post['article_id'] == $articleId)
			{
				return $post;
			}
		}
		return null;
	}//end function
	
	public function addArticlePost($articleTitle, $articleBody)
	{
		require("includes/connection.php");
		$sql = "INSERT INTO CarleyArticle (article_title, article_body, article_time, article_last_modified) VALUES (:article_title, :article_body, NOW(), NOW());";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':article_title', $articleTitle);
		$s -> bindValue(':article_body', $articleBody);
		$s -> execute();
		
		/*$query="INSERT INTO CarleyArticle SET title='$articleTitle', body='$articleBody', postTime='$articleTime'";
		
		$result = $pdo -> prepare($query);
		$num_result=$result->num_rows;
		
				
		if($num_result>0){
			while($rows=$result->fetch_assoc()){
								
				$this->data[]=$rows;
				
				//print_r($rows);
			}					
			return $this->data;
		}*/
	}
	
	public function editArticlePost($articleId){
		require("includes/connection.php");
		$sql="SELECT * FROM CarleyArticle WHERE article_id='$articleId'";
		$s = $pdo -> prepare($sql);
		//$s -> bindValue(':article_title', $articleTitle);
		//$s -> bindValue(':article_body', $articleBody);
		//$s -> bindValue(':article_time', $articleTime);
		$s -> execute();
		return $s -> fetch();
		
	}
	
	public function editArticlePostSubmit($articleId, $articleTitle, $articleBody){
		require("includes/connection.php");
		$sql = "UPDATE CarleyArticle SET article_title=:article_title, article_body=:article_body, article_last_modified=NOW() WHERE article_id='$articleId';";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':article_title', $articleTitle);
		$s -> bindValue(':article_body', $articleBody);
		$s -> execute();
		
	}

	
	public function deleteArticlePost($articleId){
		require("includes/connection.php");
			//Select all data from article, between limit1 and limit2
			$sql="DELETE FROM CarleyArticle WHERE article_id='$articleId'";
			$s = $pdo -> prepare($sql);
			$s -> execute();
			

			

	}
}//end class
?>