<?php
//require_once '../db/model.php';  
require_once(__ROOT__.'/db/model.php'); 
class user extends model {
    public $id;
    public $userid;
    public $title;
    public $body;
    public $complete;
    public $create_date;
    public $update_date;
   
    public function __construct()
    {
        $this->tableName = 'todos';
	
    }
}
?>