<?php
include SERVERROOT . 'publicView/model/store/Stores.php';

//Start BlogController class
class StoreController 
{
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	
	//Start construct function 
	public function __construct() 
	{
		$this -> model = new Stores();
		$this -> header = SERVERROOT . '/includes/header.php';
		$this -> footer = SERVERROOT . '/includes/footer.php';
		$this -> nav = SERVERROOT . '/includes/nav.php';
	}//end constructor
	

	//Start invoke function
	public function invoke() 
	{	
		if(isset($_GET['action']) && isset($_GET['itemId']))
		{
			$product_id = $_GET['itemId'];
			include_once SERVERROOT . 'publicView/view/store/viewIndividualItem/individualItemView.php';
			$StoreView = new StoreView(SERVERROOT . 'publicView/view/store/viewIndividualItem/individualItemTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Items = $this -> model -> getIndividualItem($product_id);
			$reviews = $this -> model -> getItemReview($product_id);
			$StoreView -> assign($Items, $reviews);
		}
		else
		{
			include_once SERVERROOT . 'publicView/view/store/viewStore/storeView.php';
			$StoreView = new StoreView(SERVERROOT . 'publicView/view/store/viewStore/storeTemplate.php', $this -> header, $this -> footer, $this -> nav);
			$Items = $this -> model -> getStoreItems();
			$StoreView -> assign($Items);
		}
	}//End Function
}//End Class
?>
