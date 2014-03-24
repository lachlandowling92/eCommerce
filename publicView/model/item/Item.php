<?php
class Item
{
	private $itemId;
	private $itemTitle;
	private $itemSubtitle;
	private $itemDescription;
	private $itemImageLink;
	private $itemImageTitle;
	
	public function __construct($itemId, $itemTitle, $itemSubtitle, $itemDescription, $itemImageLink, $itemImageTitle)
	{
		$this->itemId = $itemId;
		$this->itemTitle = $itemTitle;
		$this->itemSubtitle = $itemSubtitle;
		$this->itemDescription = $itemDescription;
		$this->itemImageLink = $itemImageLink;
		$this->itemImageTitle = $itemImageTitle;

	}//end constructor
	
	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
	}//end function
	
	public function getItemId()
	{
		return $this->itemId;
	}//end function
	
	public function setItemTitle($itemTitle)
	{
		$this->itemTitle = $itemTitle;
	}//end function
	
	public function getItemTitle()
	{
		return $this->itemTitle;
	}//end function
	
	public function setItemSubtitle($itemSubtitle)
	{
		$this->itemBody = $itemSubtitle;
	}//end function
	
	public function getItemSubtitle()
	{
		return $this->itemSubtitle;
	}//end function
	
	public function setItemDescription($itemDescription)
	{
		$this->itemDescription = $itemDescription;
	}//end function
	
	public function getItemDescription()
	{
		return $this->itemDescription;
	}//end function 
	
	public function setItemImageLink($itemImageLink)
	{
		$this->itemImageLink = $itemImageLink;
	}//end function
	
	public function getItemImageLink()
	{
		return $this->itemImageLink;
	}//end function 

	public function setItemImageTitle($itemImageTitle)
	{
		$this->itemImageTitle = $itemImageTitle;
	}//end function
	
	public function getItemImageTitle()
	{
		return $this->itemImageTitle;
	}//end function 
}//end class
?>