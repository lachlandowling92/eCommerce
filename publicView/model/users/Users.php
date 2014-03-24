<?php
//include_once SERVERROOT . 'publicView/model/users/User.php';

class Users {
	
	public function getUserDetails($user_id)
	{
		include (SERVERROOT . "/includes/connection.php"); //Include pdo
		if($user_id != NULL)
		{
		$sql = "SELECT * FROM phpbb_users
				WHERE user_id = :user_id";
		$data = $pdo2->prepare($sql);
		$data->bindParam(':user_id', $user_id);
		$data->execute();
		$item = $data->fetch();
		return $item;
		}
		else
		{
		$item = NULL;
		return $item;
		}
	}

}//end class
?>