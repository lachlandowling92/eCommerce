<?php
include_once SERVERROOT . 'publicView/model/blog/Blog.php';

class Stores {
	
	//Gets a page of blog posts. A page is 5 posts long
	public function getStoreItems()
	{
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
		try {
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM store";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();
		} catch (PDOException $e) {
			return null;
		}

	}// end function
	
		//Gets a page of blog posts. A page is 5 posts long
	public function getIndividualItem($product_id)
	{
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
		try 
		{
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM store
					WHERE product_id = :product_id";
			$data = $pdo->prepare($sql);
			$data->bindParam(':product_id', $product_id);
			$data->execute();
			$item = $data->fetch();
			return $item;
		}
		catch(PDOException $e)
		{
			$item = NULL;
			return $item;
		}

	}// end function
	
		//Gets a page of blog posts. A page is 5 posts long
	public function getItemReview($product_id)
	{
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
		try 
		{
		//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM reviews r
					WHERE r.product_id = :product_id
					ORDER BY r.review_date DESC
					";
			$data = $pdo->prepare($sql);
			$data->bindParam(':product_id', $product_id);
			$data->execute();
			$reviewData = $data->fetchAll();

			$i=0;
			foreach($reviewData as $item)
			{
				$user_id = $item['user_id'];
		
				//Select all data from blog_posts, between limit1 and limit2
				$sql = "SELECT * FROM phpbb_users WHERE user_id = :user_id";
				$data = $pdo2->prepare($sql);
				$data->bindParam(':user_id', $user_id);
				$data->execute();
				$user = $data->fetch();
				$review[$i]= array($item['review_id'], $item['user_id'], $item['review_title'], $item['review_rating'], $item['review_content'], $user['username'], $user['user_avatar'], $item['review_date']);
				$i++;
			}
			return $review;
			/*
		
			//Select all data from blog_posts, between limit1 and limit2
			$sql = "SELECT * FROM reviews r
					JOIN user u ON 
					u.user_id = r.user_id
					WHERE r.product_id = :product_id
					ORDER BY r.review_date DESC
					";
			$data = $pdo->prepare($sql);
			$data->bindParam(':product_id', $product_id);
			$data->execute();
			$item = $data->fetchAll();
			return $item;
			*/
		}
		catch(PDOException $e)
		{
			$item = NULL;
			return $item;
		}

	}// end function

		//Gets a page of blog posts. A page is 5 posts long
	public function addReview($product_id, $user_id, $review_rating, $review_content, $review_title)
	{
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		
		try 
		{		
			$sql = "INSERT INTO reviews (product_id, user_id, review_rating, review_content, review_title, review_date) VALUES (:product_id, :user_id, :review_rating, :review_content, :review_title, NOW());";
			$s = $pdo -> prepare($sql);
			$s -> bindValue(':product_id', $product_id);
			$s -> bindValue(':user_id', $user_id);
			$s -> bindValue(':review_rating', $review_rating);
			$s -> bindValue(':review_content', $review_content);
			$s -> bindValue(':review_title', $review_title);
			$s -> execute();
			
		
		
		
		$date = date('Y-m-d H:i:s');
		echo $date;
		
		
		}
		catch(PDOException $e)
		{
			$item = NULL;
			return $item;
		}

	}// end function

}//end class
?>