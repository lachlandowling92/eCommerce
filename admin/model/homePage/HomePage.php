<?php
class Article
{
	private $articleId;
	private $articleTitle;
	private $articleBody;
	private $articleAuthor;
	private $articleTime;
	
	public function __construct($articleId, $articleTitle, $articleBody, $articleAuthor, $articleTime)
	{
		$this->articleId = $articleId;
		$this->articleTitle = $articleTitle;
		$this->articleBody = $articleBody;
		$this->articleAuthor = $articleAuthor;
		$this->articleTime = $articleTime;
	}//end constructor
	
	public function setArticleId($articleId)
	{
		$this->articleId = $articleId;
	}//end function
	
	public function getArticleId()
	{
		return $this->articleId;
	}//end function
	
	public function setArticleTitle($articleTitle)
	{
		$this->articleTitle = $articleTitle;
	}//end function
	
	public function getArticleTitle()
	{
		return $this->articleTitle;
	}//end function
	
	public function setArticleBlody($articleBlody)
	{
		$this->articleBody = $articleBody;
	}//end function
	
	public function getArticleBody()
	{
		return $this->articleBody;
	}//end function
	
	public function setArticleAuthor($articleAuthor)
	{
		$this->articleAuthor = $articleAuthor;
	}//end function
	
	public function getArticleAuthor()
	{
		return $this->articleAuthor;
	}//end function
	
	public function setArticleTime($articleTime)
	{
		$this->articleTime = $articleTime;
	}//end function
	
	public function getArticleTime()
	{
		return $this->articleTime;
	}//end function
	
}//end class
?>