<?php
class User
{
	private $blogId;
	private $blogTitle;
	private $blogBody;
	private $blogAuthor;
	private $blogTime;
	
	public function __construct($blogId, $blogTitle, $blogBody, $blogAuthor, $blogTime)
	{
		$this->blogId = $blogId;
		$this->blogTitle = $blogTitle;
		$this->blogBody = $blogBody;
		$this->blogAuthor = $blogAuthor;
		$this->blogTime = $blogTime;
	}//end constructor
	
	public function setBlogId($blogId)
	{
		$this->blogId = $blogId;
	}//end function
	
	public function getBlogId()
	{
		return $this->blogId;
	}//end function
	
	public function setBlogTitle($blogTitle)
	{
		$this->blogTitle = $blogTitle;
	}//end function
	
	public function getBlogTitle()
	{
		return $this->blogTitle;
	}//end function
	
	public function setBlogBlody($blogBlody)
	{
		$this->blogBody = $blogBody;
	}//end function
	
	public function getBlogBody()
	{
		return $this->blogBody;
	}//end function
	
	public function setBlogAuthor($blogAuthor)
	{
		$this->blogAuthor = $blogAuthor;
	}//end function
	
	public function getBlogAuthor()
	{
		return $this->blogAuthor;
	}//end function
	
	public function setBlogTime($blogTime)
	{
		$this->blogTime = $blogTime;
	}//end function
	
	public function getBlogTime()
	{
		return $this->blogTime;
	}//end function
	
}//end class
?>