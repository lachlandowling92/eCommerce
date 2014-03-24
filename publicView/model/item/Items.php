<?php

include_once ("publicView/model/item/Item.php");

//include("includes/connection.php");
Class Items {
//Gets a page of article posts. A page is 5 posts long
	public function getHomePageItems() {

		include ("includes/connection.php"); //Include pdo
		
		try {
			//Select all data from article, between limit1 and limit2
			$sql = "SELECT * FROM items x 
			JOIN itemImages y 
			ON x.itemId = y.itemId";
			$resultSet = $pdo -> query($sql);
			$test = $resultSet->fetchAll();
			print_r($test);
			$item = array();

			for($i=0; $i < count($test); $i++) {
				$item[$i] = new Item($test[$i]['itemId'], $test[$i]['itemName'], $test[$i]['itemSubtitle'], $test[$i]['itemDescription'], $test[$i]['imageLink'], $test[$i]['imageName']);
			}
			return $item;

			
		} catch (PDOException $e) {
			return null;
		}

	}// end function

		public function getSearchItems($searchTerm, $category) {

		include ("includes/connection.php"); //Include pdo
		
		try {
			//Select all data from article, between limit1 and limit2
			$sql = "SELECT * FROM items x 
			JOIN itemImages y 
			ON x.itemId = y.itemId
			WHERE x.itemName = :searchTerm";
			$data = $pdo->prepare($sql);
			$data->bindParam(':searchTerm', $searchTerm);
			$data->execute();
			$test = $data->fetchAll();
			
			$item = array();
			
			for($i=0; $i < count($test); $i++) {
				$item[$i] = new Item($test[$i]['itemId'], $test[$i]['itemName'], $test[$i]['itemSubtitle'], $test[$i]['itemDescription'], $test[$i]['imageLink'], $test[$i]['imageName']);
			}
			return $item;

			
		} catch (PDOException $e) {
			return null;
		}

	}// end function
}
