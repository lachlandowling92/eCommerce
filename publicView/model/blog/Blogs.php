<?php
include_once SERVERROOT . 'publicView/model/blog/Blog.php';

class Blogs {
	
	//Gets a page of blog posts. A page is 5 posts long
	public function getBlogPosts()
	{
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
		try {
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM blog_posts p 
			JOIN user u ON u.user_id = p.blog_user_id
			WHERE blog_status = 'Published' 
			ORDER BY blog_id DESC;";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();
		} catch (PDOException $e) {
			return null;
		}

	}// end function
	
	public function getUserDetails($userName)
	{
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		if($userName != NULL)
		{
		$sql = "SELECT * FROM user
		WHERE user_name	= :userName";
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
		
		
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
		try {
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM blog_posts ORDER BY blog_id DESC;";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();

		} catch (PDOException $e) {
			return null;
		}

	}// end function

		public function getComments($blogId) 
		{
		
		
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		try {
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM comments
					WHERE blog_id = :blog_id		
					ORDER BY comment_id DESC;";
			$query = $pdo -> prepare($sql);
			$query -> bindParam(':blog_id', $blogId);
			$query->execute();
			$comments = $query->fetchAll();
			
			$commentData = array();
			$i = 0;
			foreach($comments as $comment)
			{
				$user_id = $comment['user_id'];
				
				$sql = "SELECT * FROM phpbb_users
						WHERE user_id	= :user_id";
				$data = $pdo2->prepare($sql);
				$data->bindParam(':user_id', $user_id);
				$data->execute();
				$users = $data->fetch();				
				$commentData[$i] = array($comment['comment_id'], $users['username'], $comment['comment_content'], $comment['post_time'], $users['user_avatar']);
				$i++;
			}
			return $commentData;
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
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		$sql = "INSERT INTO blog_posts (blog_title, blog_body, blog_author, blog_time, blog_status) VALUES (:blog_title, :blog_body, :blog_author, NOW(), 'Pending');";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':blog_title', $blogTitle);
		$s -> bindValue(':blog_body', $blogBody);
		$s -> bindValue(':blog_author', $blogAuthor);
		$s -> execute();
	}
	
	public function addComment($blogId, $commentContent, $commentAuthor)
	{	
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
		$sql = "SELECT * FROM phpbb_users
		WHERE user_id	= :user_id";
		$data = $pdo2->prepare($sql);
		$data->bindParam(':user_id', $commentAuthor);
		$data->execute();
		$item = $data->fetch();
		
		$date = date('Y-m-d H:i:s');
		echo $date;
		
		$sql = "INSERT INTO comments (blog_id, user_id, post_time, comment_content) VALUES (:blog_id, :user_id, NOW(), :comment_content);";
		$s = $pdo -> prepare($sql);
		$s -> bindValue(':blog_id', $blogId);
		$s -> bindValue(':user_id', $item['user_id']);
		$s -> bindValue(':comment_content', $commentContent);
		$s -> execute();
	}
	
	public function getEditBlog($blogId)
	{	
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
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
		include (SERVERROOT . "/includes/connection.php"); //Include pdo

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