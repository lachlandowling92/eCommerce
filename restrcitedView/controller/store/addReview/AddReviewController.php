<?php 
include SERVERROOT . 'publicView/model/store/Stores.php';

//Start Class - AddBlog Controller
class AddReviewController
{
	private $template;
	private $header;
	private $footer;
	private $nav;
	
	//Start Function - Construct
	public function __construct()
	{
		$this -> header = SERVERROOT . 'BlogMVC/includes/header.php';
		$this -> footer = SERVERROOT . 'BlogMVC/includes/footer.php';
		$this -> nav = SERVERROOT . 'BlogMVC/includes/nav.php';
	
	}//end constructor
	
	//Start Function - Invoke
	public function invoke()
	{
			session_start();
			var_dump($_POST);
			$newComment = new Stores();
			$newComment->addReview($_POST['productId'], $_SESSION['user_id'], $_POST['reviewRating'], $_POST['reviewContent'], $_POST['reviewTitle']);
			header("Location: index.php?store&action=viewItem&itemId=".$_GET['itemId']);
	}//end function
}//end class
?>