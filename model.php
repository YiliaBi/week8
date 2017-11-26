<?php
class model {


    protected $tableName;

    public function save()
    {

        if ($this->id = '') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }

        $db = dbConn::getConnection();
 //       $tableName = get_called_class();
        $statement = $db->prepare($sql);


    //    $statement->execute();
     //   $class = static::$modelName;
    //    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
    //    $recordsSet =  $statement->fetchAll();
    //    return $recordsSet;
    }

    private function insert($array) {
   //     $db = dbConn::getConnection();
   //     $tableName = get_called_class();       
        $modelName = static::$modelName;
        $tableName = $modelName::getTablename();
//        $array = get_object_vars($this);
        $valueString = ":".implode(', :', array_keys($array));
        $columnString = implode(', ', array_keys($array));
      	$sql = "INSERT INTO $tableName (" . $columnString . ") VALUES (" . $valueString . ")</br>";
      	echo $sql;
        return $sql;
    }











    private function update() {
        $sql = 'sometthing';
        return $sql;
        echo 'I just updated record' . $this->id;
    }
    public function delete() {
        echo 'I just deleted record' . $this->id;
    }










}

?>