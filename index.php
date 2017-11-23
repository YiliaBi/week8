<?php
ini_set('display_errors', 'On');

error_reporting(E_ALL);

// class Manage {
//     public static function autoload($class) {
           
// 	   include $class. '.php';
// 		        }
// }

// spl_autoload_register(array('Manage', 'autoload'));

// $obj = new main();	


define('DATABASE', 'yb83');
define('USERNAME', 'yb83');
define('PASSWORD', 'qwer1234');
define('CONNECTION', 'sql.njit.edu');

class dbConn{
    
    protected static $db;
    
    private function __construct() {
        try {
            
            self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }

        catch (PDOException $e) {
           
            echo "Connection Error: " . $e->getMessage();
        }
    }
    
    public static function getConnection() {
       
        if (!self::$db) {
            
            new dbConn();
        }
        
        return self::$db;
    }
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
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];
    }
}

class accounts extends collection {
    protected static $modelName = 'accounts';
}
class todos extends collection {
    protected static $modelName = 'todos';
}

class model {
    protected $tableName;
    public function save()
    {
        if ($this->id = '55') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }
        $db = dbConn::getConnection();
        
        $tableName = get_called_class();
        $array = get_object_vars($this);
        $columnString = implode(',', $array);
        $valueString = ":".implode(',:', $array);
       $sql = "INSERT INTO $tableName (" . $columnString . ") VALUES (" . $valueString . ")</br>";
       echo"INSERT INTO $tableName (" . $columnString . ") VALUES (" . $valueString . ")</br>";
       $statement = $db->prepare($sql);
        $statement->execute();
        echo 'I just saved record: ' . $this->id;
    }
    private function insert() {
        $sql = 'sometthing';
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
class account extends model {
}
class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;
    public function __construct()
    {
        $this->tableName = 'todos';
	
    }
}

// this would be the method to put in the index page for accounts
$records = accounts::findAll();
echo '<table border="1"><tr><td>Id</td><td>email</td></tr>';
foreach ($records as $record) {
    echo "<tr><td>".$record->id."</td><td>".$record->email."</td></tr>";
}
echo "</table>";
//print_r($records);
// this would be the method to put in the index page for todos
$records = todos::findAll();
//print_r($records);
//this code is used to get one record and is used for showing one record or updating one record
$todo_record = todos::findOne(1);


$newTodo = new todo();
$newTodo->id = '55';
$newTodo->owneremail = "444@yahoo.com";
$newTodo->ownerid = 555;
$newTodo->createddate = 12345678;
$newTodo->duedate = 167856997;
$newTodo->message = 'this is a test';
$newTodo->isdone = 'true';



$newTodo->save();
//findall

//todos::save(parameter)
//finda;l




?>