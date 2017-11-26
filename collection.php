
<?php
class collection {

    static public function create() {
      $model = new static::$modelName;
      return $model;
    }

    static public function findAll() {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName;
        echo $sql;
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
        echo $sql;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];
 
    }



    static public function insert($column, $value) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
 //       $array = get_object_vars($this);
 //       $value = '';
 //       $column = '';
 //        foreach ($array as $k => $v) {
 //            $column .= ",{$k}";
//             $value .= ",'{$v}'";
//         }
//         $column = substr($column, 1);
//         $value = substr($value, 1);
//        print_r($column);
//        print_r($value);

        $sql = 'INSERT INTO' .$tableName. '(' . $column.') VALUES (' . $value. ')'; 

           echo $sql;
  //       $statement = $db->prepare($sql);
  //       $statement->execute($sql, $value);
 //        $class = static::$modelName;
 //        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
 //        $recordsSet =  $statement->fetchAll();
         return $sql;
 //          printf ("Last inserted record has id %d\n", sql_insert_id());
//        mysql_query($sql);
 //       $sql="SELECT LAST_INSERT_ID()";

    }
  



    static public function delete($id) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'DELETE FROM '. $tableName .' WHERE id =' . $id;
        $statement = $db->prepare($sql);
        $statement->execute();
 //       $class = static::$modelName;
 //       $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        echo $sql;
 //       $recordsSet =  $statement->fetchAll();
        return $sql;
    }



    static public function update($array){
        $db = dbConn::getConnection();
        $tableName = get_called_class();

        $aaa = " ";
        $sql = 'UPDATE '.$tableName.' SET ';
        foreach ($array as $key=>$value){
            if( ! empty($value)) {
                $sql .= $aaa . $key . ' = "'. $value .'"';
                $aaa = ", ";
            }
        }
        $sql .= ' WHERE id='.$array->id;
        echo $sql;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
 //       $recordsupdate =  $statement->fetchAll();
//        return $recordsSet[$id];
       return $sql;
    }
    

}

?>