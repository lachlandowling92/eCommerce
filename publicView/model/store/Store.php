<?php
class Store
{
	private $product_id;
	private $product_name;
	private $product_image;
	private $product_description;
	private $product_link;
	
	public function __construct($product_id, $product_name, $product_image, $product_description, $product_link)
	{
		$this->productId = $product_id;
		$this->productName = $product_name;
		$this->productImage = $product_image;
		$this->productDescription = $product_description;
		$this->productLink = $product_link;
	}//end constructor
	
	public function setProductId($product_id)
	{
		$this->productId = $product_id;
	}//end function
	
	public function getProductId()
	{
		return $this->productId;
	}//end function
	
	public function setProductName($product_name)
	{
		$this->productName = $product_name;
	}//end function
	
	public function getProductName()
	{
		return $this->productName;
	}//end function
	
	public function setProductImage($product_image)
	{
		$this->productImage = $product_image;
	}//end function
	
	public function getProductImage()
	{
		return $this->productImage;
	}//end function
	
	public function setProductDescription($product_description)
	{
		$this->productDescription = $product_description;
	}//end function
	
	public function getProductDescription()
	{
		return $this->productDescription;
	}//end function
	
	public function setProductLink($product_link)
	{
		$this->productLink = $product_link;
	}//end function
	
	public function getProductLink()
	{
		return $this->productLink;
	}//end function
	
}//end class
?>