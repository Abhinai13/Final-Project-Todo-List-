<?php
	require('../config/config.php');
	if(!empty($_POST)){
		$action = $_POST["actionType"];	
		//action login implementation
		if($action == "LOGIN"){		
			require_once(__ROOT__.'/repo/users.php'); 
			require_once(__ROOT__.'/util/crypto.php'); 
			session_start();		
			$array = array( 
			    "email" => $_POST["user_email"]
			); 
			$record = users::findOneBy($array);
			if(is_array($record)) {
				//found user in database. check password matches;
				$dbpassword = $record["password"];
				if(password_verify($_POST["password"], $dbpassword)){
					$arrUser = array(
					"id"=> $record["id"],
					"lastname"=> $record["lastname"],
					"firstname"=> $record["firstname"],
					"email"=>$record["email"]
				);			
				echo "ok";
				$_SESSION["user"] = $arrUser;
				}
				else{
					echo "  Password did not match.";	
				}
							
			} else {			
				echo "  Invalid email address. Not found.";			
			}
		}
		// action registering user implementation
		if($action == "REGISTER"){		
			require_once(__ROOT__.'/repo/user.php'); 
			require_once(__ROOT__.'/util/crypto.php'); 
			$user = new user();
				
				$user ->id="";
				$user ->firstname = $_POST["firstname"];
				$user ->lastname = $_POST["lastname"] ;
				$user ->email=$_POST["user_email"];			
				$user ->password = crypto::secured_hash($_POST["password"]);
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
		if($action == "ADDTASK"){	
			session_start();	
			require_once(__ROOT__.'/repo/todo.php'); 
			$user = $_SESSION["user"];			 
			$todo = new todo();
			$todo ->id="";
			$todo ->userid=$user["id"];
			$todo ->title = $_POST["title"];
			$todo ->body = $_POST["description"] ;
			$todo ->complete="0";	
			$date = new DateTime();
			$strDate = $date->format('Y-m-d H:i:s');			
			$todo ->create_date= $strDate;
			$todo ->update_date= $strDate;
			$todo ->save();				
			$array= get_object_vars ($todo);				
			if ($array["id"] > 0){
				echo "ok";
			}else{
				echo " Error occured adding task. ";	
			}
		}
		if($action == "EDITTASK"){	
			session_start();	
			require_once(__ROOT__.'/repo/todo.php'); 
			$user = $_SESSION["user"];			 
			$todo = new todo();
			$todo ->id=$_POST["task_id"];
			$todo ->userid=$user["id"];
			$todo ->title = $_POST["title"];
			$todo ->body = $_POST["description"];
			$todo ->create_date= $_POST["task_create_date"];
			$check = $_POST["complete"];
			$strComplete = ($check == 1) ? $check: 0;			
			echo "complete...".$strComplete;
			$todo ->complete=$strComplete;	
			$date = new DateTime();
			$strDate = $date->format('Y-m-d H:i:s');		
			$todo ->update_date= $strDate;
			$todo ->save();				
			//$array= get_object_vars ($todo);				
			/*if ($array["id"] > 0){
				echo "ok";
			}else{
				echo " Error occured adding task. ";	
			}*/
		}
	}else{
		
		$action = $_GET["actionType"];
		//Signout implementation
		echo "$action=  ".$action;
		if($action == "SIGNOUT"){	
			session_start();		
			$_SESSION["user"] = "";
			$_SESSION = array(); 
			session_unset();
			session_destroy();				
			echo "ok";
		}
	}

?>