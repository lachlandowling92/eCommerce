<?php
include_once (SERVERROOT . "admin/model/blog/Blog.php");

class Blogs {
	
	//Gets a page of blog posts. A page is 5 posts long
	public function getBlogPosts($page = 1) {
		
		
		include (SERVERROOT . "Secure_Login/includes/connection.php"); //Include pdo
		
		try {
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM blog_posts p
					JOIN user u ON u.user_id = p.blog_user_id
					WHERE p.blog_status = 'Approved' 
					ORDER BY p.blog_id DESC;";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();
		} catch (PDOException $e) {
			return null;
		}

	}// end function
	
	public function getUserDetails($userName)
	{
		include (SERVERROOT . "Secure_Login/includes/connection.php"); //Include pdo
		if($userName != NULL)
		{
		$sql = "SELECT * FROM user
		WHERE userName	= :userName";
		$data = $pdo->prepare($sql);
		$data->bindParam(':userName', $userName);
		$data->execute();
		$item = $data->fetch();
		return $item;
		}
		else
		{
		$item = NULL;
		return $item;
		}
	}
	
	public function getAllBlogPosts($page = 1) {
		
		
		include (SERVERROOT . "Secure_Login/includes/connection.php"); //Include pdo
		
		try {
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM blog_posts p 
					JOIN user u ON u.user_id = p.blog_user_id
					ORDER BY p.blog_id DESC;";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();

		} catch (PDOException $e) {
			return null;
		}

	}// end function

		public function getComments($blogId) 
		{
		
		
		include (SERVERROOT . "Secure_Login/includes/connection.php"); //Include pdo
		try {
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM blog_comments b
					JOIN user u ON u.user_id = b.user_id
					WHERE b.blog_id = :blog_id		
					ORDER BY comment_id DESC;";
			$query = $pdo -> prepare($sql);
			$query -> bindParam(':blog_id', $blogId);
			$query->execute();
			return $query->fetchAll();
		} 
		catch (PDOException $e) 
		{
			return null;
		}

	}// end function
	
	//Fetches a specific blog post.
	public function getBlogPost($blogId) {
		
		$allPosts = $this -> getBlogPosts();
		
		foreach($allPosts as $post)
		{
			if($post['blog_id'] == $blogId)
			{
				return $post;
			}
		}
		return null;
	}//end function
	
	public function addBlogPost($blogTitle, $blogBody, $blogAuthor, $blogTime)
	{
		require(SERVERROOT . "Secure_Login/includes/connection.php");
		$sql = "INSERT INTO blog_posts (blog_title, blog_body, blog_author, blog_time, blog_status) VALUES (:blog_title, :blog_body, :blog_author, NOW(), 'Pending');";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':blog_title', $blogTitle);
		$s -> bindValue(':blog_body', $blogBody);
		$s -> bindValue(':blog_author', $blogAuthor);
		$s -> execute();
	}
	
	public function addComment($blogId, $commentContent, $commentAuthor)
	{	
		require(SERVERROOT . "Secure_Login/includes/connection.php");
		
		$sql = "SELECT * FROM user
		WHERE userName	= :userName";
		$data = $pdo->prepare($sql);
		$data->bindParam(':userName', $commentAuthor);
		$data->execute();
		$item = $data->fetch();
		
		$date = date('Y-m-d H:i:s');
		echo $date;
		
		print_r($item);
		$commentUserId = $item['user_id'];
		
		$sql = "INSERT INTO blog_comments (blog_id, comment_content, user_id, comment_time) VALUES (:blog_id, :commentContent, :commentAuthor, NOW());";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':blog_id', $blogId);
		$s -> bindValue(':commentContent', $commentContent);
		$s -> bindValue(':commentAuthor', $commentUserId);
		$s -> execute();
	}
	
	public function getEditBlog($blogId)
	{	
		require(SERVERROOT . "Secure_Login/includes/connection.php");
		
		try 
		{
			//Select all data from blog_posts, between limit1 and limit2			
			$sql = "SELECT * FROM blog_posts WHERE blog_id = :blog_id";
			$data = $pdo->prepare($sql);
			$data->bindParam(':blog_id', $blogId);
			$data->execute();
			$item = $data->fetch();
			return $item;
		} 
		catch (PDOException $e) 
		{
			return null;
		}
	}
	
	public function changePassword($userName, $password)
	{
		require(SERVERROOT . "Secure_Login/includes/connection.php");

		$sql = "UPDATE user 
		SET loginPassword = :password
		WHERE userName = :userName";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':userName', $userName);
		$s -> bindValue(':password', $password);
		$s -> execute();
	}

}//end class
?>