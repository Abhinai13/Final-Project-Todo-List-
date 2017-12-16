<?php

	$action = $_POST["actionType"];	
	//action login implementation
	if($action == "LOGIN"){
		require_once '../repo/users.php';
		session_start();
		$array = array( 
		    "email" => $_POST["user_email"], 
		    "password" => $_POST["password"]
		); 		
		$record = users::findOneBy($array);
		if(is_array($record)) {
			//echo "login successful ..";			
			$arrUser = array(
				"id"=> $record["id"],
				"lastname"=> $record["lastname"],
				"firstname"=> $record["firstname"],
				"email"=>$record["email"]
			);			
			echo "ok";
			$_SESSION["user"] = $arrUser;			
		} else {			
			echo "  Invalid email or password. Not found.";			
		}
	}
	// action registering user implementation
	if($action == "REGISTER"){
		require_once '../repo/user.php';
		$user = new user();
			
			$user ->id="";
			$user ->firstname = $_POST["firstname"];
			$user ->lastname = $_POST["lastname"] ;
			$user ->email=$_POST["user_email"];
			$user ->password = $_POST["password"] ;
			$date = new DateTime();
			$strDate = $date->format('Y-m-d H:i:s');			
			$user ->create_date= $strDate;
			$user ->save();				
			$array= get_object_vars ($user);
			
			if ($array["id"] > 0){
				echo "ok";
			}else{
				echo " Error occured registering user. ";	
			}
	}
	// form GET request handling...
	if($action == ""){
		$action = $GET["actionType"];	
		if($action == "SIGNOUT"){

		}

	}


?>