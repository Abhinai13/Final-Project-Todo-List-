<?php
require_once '../db/model.php';  
class user extends model {
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $create_date;
   
    public function __construct()
    {
        $this->tableName = 'users';
	
    }
}
?>