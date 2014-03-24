<?php
/*
	* File Name    : Slideshows.php
	* Author       : Carley Payne
	* Date Created : 28 November 2013
	* Version      : 1.0
	* Last Modified: 28 November 2013
	* Description  : The slideshows model for the Insight Through Illness website.
*/

include_once (SERVERROOT . "main/model/slideshow/Slideshow.php");
// Start the session
session_start();


class Slideshows {
	
	// Function to get all the files from the database.
	public function getSlideshows() {
	
		// Includes connection file and PDO
		include (SERVERROOT . "/includes/connection.php"); 
		
		try {
			// Selects all the files from the files table in the database and orders them from most recent to least recent
			$sql = "SELECT * FROM files ORDER BY fileId DESC";
			$resultSet = $pdo -> query($sql);
			return $resultSet->fetchAll();
		} catch (PDOException $e) {
			return null;
		// End try
		}
	// End function	
	}

	//Fetches a specific file depending on the file id
	public function getFile($fileId) {
		
		$allFiles = $this -> getFiles();
		
		foreach($allFiles as $file)
		{
			if($file['fileId'] == $fileId)
			{
				// Returns the file details
				return $file;
			// End if
			}
		// End foreach
		}
		return null;
	// End function
	}
	
	// Function to upload the files both to the database and to the local storage folder.
	public function uploadFileSubmit()
	{
		// Uploads to the folder
		
		// Only allow files that are word documents, text files, pdfs or excel documents
		$allowedExts = array("doc", "docx", "txt", "pdf", "xls", "xlsx");		
		
		// Grab only the file name
		$temp = explode(".", $_FILES['file_name']["name"]);

		$extension = end($temp);
		
		// Only allow the following file types
		if ((($_FILES['file_name']["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
			|| ($_FILES['file_name']["type"] == "application/msword")
			|| ($_FILES['file_name']["type"] == "text/plain")
			|| ($_FILES['file_name']["type"] == "application/pdf")
			|| ($_FILES['file_name']["type"] == "application/vnd.ms-excel")
			|| ($_FILES['file_name']["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
			&& ($_FILES['file_name']["size"] < 5242880)
			&& in_array($extension, $allowedExts)) 	
		{
		
		// Assign the file name to a variable
		$fileName = $_FILES['file_name']["name"];
		
			if ($_FILES['file_name']["error"] > 0)
			{
				$output = "Return Code: " . $_FILES['file_name']["error"] . "<br>";
				return $output;
			}
			else
			{
				// If upload is successful output the file details
				$output = "Upload: " . $_FILES['file_name']["name"] . "<br>";
				$output .= "Type: " . $_FILES['file_name']["type"] . "<br>";
				$output .= "Size: " . ($_FILES['file_name']["size"] / 1024) . " kB<br>";
				$output .= "Temp file: " . $_FILES['file_name']["tmp_name"] . "<br>";
				
				// If the file exists, display a message to let the user know, and do not upload the file.
				if (file_exists(SERVERROOT . "/includes/Files/" . $_FILES['file_name']["name"]))
				{
					$output .= $_FILES['file_name']["name"] . " already exists. ";
					return $output;
				}
				else
				{
					// If the file does not already exist, move the file to the storage folder on the server
					move_uploaded_file($_FILES['file_name']["tmp_name"], SERVERROOT . "/includes/Files/" . $_FILES['file_name']["name"]);
					$output .= "Stored in: " . "/includes/Files/" . $_FILES['file_name']["name"];
				// End if
				}
			// End if
			}
		}
		else
		{
			// If the requested file does not comply with the requirements, an invalid file message is displayed and the file is not uploaded
			$output = "Invalid file";
			return $output;
		// End if
		}
		
		// Assign the following variables
		$fileDestination = SERVERROOT . "/includes/Files/";
		$fileSize = $_FILES['file_name']["size"];
		$fileType = $_FILES['file_name']["type"];
	
		// Upload to database
		
		// Includes connection file and PDO
		require(SERVERROOT . "/includes/connection.php");
		
		// Insert into the table files in the database
		$sql = "INSERT INTO files (fileName, fileDestination, uploadDate, fileSize, fileType, user) 
				VALUES (:fileName, :fileDestination, NOW(), :fileSize, :fileType, :user);";
		$s = $pdo -> prepare($sql);
		// Bind the values
		$s -> bindValue(':fileName', $fileName);
		$s -> bindValue(':fileDestination', $fileDestination);
		$s -> bindValue(':fileSize', $fileSize);
		$s -> bindValue(':fileType', $fileType);
		$s -> bindValue(':user', $_SESSION['userId']);
		$s -> execute();
		
		return $output;
	// End function
	}
		
	// Function to delete files
	public function deleteFile($fileId){
		// Includes connection file and PDO
		require(SERVERROOT . "/includes/connection.php");
		// Gets the files using the getFiles() function
		$allFiles = $this -> getFiles();
		$fileDestination = SERVERROOT . "/includes/Files/";
		
		foreach($allFiles as $file)
		{
			if($file['fileId'] == $fileId)
			{
				$fileName = $file['fileName'];
				if(file_exists($fileDestination.$fileName) ) {
				
					// Removes the selected file from the folder on the server
					unlink($fileDestination.$fileName);
					
					// Deletes the selected file from the database
					$sql="DELETE FROM files WHERE fileId='$fileId'";
					$s = $pdo -> prepare($sql);
					$s -> execute();
				}
				else {
					//echo 'File delete failed';
				// End if
				}
			// End if
			}
		// End foreach
		}
		return null;
	// End function
	}
	
	// Function to download a selected file
	public function downloadFile($fileId){
		// Includes connection file and PDO
		require(SERVERROOT . "/includes/connection.php");
		// Gets the files using the getFiles() function
		$allFiles = $this -> getFiles();
		$fileDestination = SERVERROOT . "/includes/Files/";

		foreach($allFiles as $file)
		{
			if($file['fileId'] == $fileId)
			{
				$fileName = $file['fileName'];
				$fileType = $file['fileType'];
				
				// If the selected file exists, download all the relevant data
				if(file_exists($fileDestination.$fileName) ) {
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.urlencode($fileName));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length: ' . filesize($fileDestination.$fileName));
					ob_clean();
					flush();
					readfile($fileDestination.$fileName);
					exit;
				}
				else {
					//echo 'File delete failed';
				// End if
				}
			// End if
			}
		// End foreach
		}
		return null;
	// End function	
	}
}//end class
?>