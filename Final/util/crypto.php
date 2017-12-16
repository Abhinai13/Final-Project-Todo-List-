<?php
// This class is used to encrypt password...
class crypto {

	static public function secured_hash($input){  
		$options = [
    		'cost' => 10,
		];  
		$output = password_hash($input,PASSWORD_DEFAULT,$options);
		return $output;
	}
}
?> 