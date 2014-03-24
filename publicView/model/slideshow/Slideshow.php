<?php
/*
	* File Name    : Slideshow.php
	* Author       : Carley Payne
	* Date Created : 28 November 2013
	* Version      : 1.0
	* Last Modified: 28 November 2013
	* Description  : The slideshow model for the Insight Through Illness website.
*/

class File
{
	private $fileId;
	private $fileName;
	private $fileDestination;
	private $uploadDate;
	private $fileSize;
	private $fileType;
	
	// Construct function
	public function __construct($fileId, $fileName, $fileDestination, $uploadDate, $fileSize, $fileType)
	{
		$this->file_id = $fileId;
		$this->file_name = $fileName;
		$this->file_destination = $fileDestination;
		$this->upload_date = $uploadDate;
		$this->file_size = $fileSize;
		$this->file_type = $fileType;
	// End function
	}
	
	// Function to set the file id
	public function setFileId($fileId)
	{
		$this->file_id = $fileId;
	// End function
	}
	
	// Function to get the file id
	public function getFileId()
	{
		return $this->file_id;
	// End function
	}
	
	// Function to set the file name
	public function setFileName($fileName)
	{
		$this->file_name = $fileName;
	// End function
	}
	
	// Function to get file name
	public function getFileName()
	{
		return $this->file_name;
	// End funtion
	}
	
	// Function to set the file destination
	public function setFileDestination($fileDestination)
	{
		$this->file_destination = $fileDestination;
	// End function
	}
	
	// Function to get the file destination
	public function getFileDestination()
	{
		return $this->file_destination;
	// End function
	}
	
	// Function to set the upload date
	public function setUploadDate($uploadDate)
	{
		$this->upload_date = $uploadDate;
	// End function
	}
	
	// Function to get the upload date
	public function getUploadDate()
	{
		return $this->upload_date;
	// End function
	}
	
	// Function to set the file size
	public function setFileSize($fileSize)
	{
		$this->file_size = $fileSize;
	// End function
	}
	
	// Function to get the file size
	public function getFileSize()
	{
		return $this->file_size;
	// End function
	}
	
	// Function to set the file type
	public function setFileType($fileType)
	{
		$this->file_type = $fileType;
	// End function
	}
	
	// Function to get the file type
	public function getFileType()
	{
		return $this->file_type;
	// End function
	}
	
// End class
}
?>