<?php
try {
    require_once(__ROOT__.'/conn/dbConn.php'); 
} catch (Exception $e) {
  echo 'Connection failed: '.$e->getMessage();
}
class collection {
    static public function create() {
      $model = new static::$modelName;
      return $model;
    }

    static public function findAll() {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet;
    }
    
    static public function findOne($id) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
       // echo "sql: ". $sql;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];
    }
// Selecting one record based on column value
// SQL: SELECT * FROM <#table-name#> Where colKey[0] = ColValue[0] and colKey[1] = ColValue[1]
    static public function findOneBy($array) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $c="";
        foreach ($array as $key => $value) {
            $c .= $key. " = '".rtrim($value,":")."' and ";
        }
        $c = rtrim($c,"and ");
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE ' . $c;
        $statement = $db->prepare($sql);
        $result =$statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        if($result && $statement->rowCount() > 0){
            $recordsSet =  $statement->fetchAll();
            return $recordsSet[0];
        }else{
           return null;
        }        
      
    }
// Selecting records based on column value
// SQL: SELECT * FROM <#table-name#> Where colKey[0] = ColValue[0] and colKey[1] = ColValue[1]
    static public function findAllBy($array) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $c="";
        foreach ($array as $key => $value) {
            $c .= $key. " = '".rtrim($value,":")."' and ";
        }
        $c = rtrim($c,"and ");
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE ' . $c;
        $statement = $db->prepare($sql);
        $result =$statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        if($result && $statement->rowCount() > 0){
            $recordsSet =  $statement->fetchAll();
            return $recordsSet;
        }else{
           return null;
        }  
    }
}
?>