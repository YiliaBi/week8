<?php

abstract class collections{	

	static public function executeScode($Scode){	

		$conn = Database::connect();

		if($conn){	

			$launchcode = $conn->prepare($Scode);
			$launchcode->execute();
			$DataTitle = static::$modelNM;
			$launchcode->setFetchMode(PDO::FETCH_CLASS, $DataTitle);
			$Result = $launchcode->fetchAll();
			return $Result;
		}
	}
	static public function ShowData($id = ""){	

		$id = ($id !== "") ? "= " . $id : "";
		$Scode = 'SELECT * FROM ' . get_called_class() . " WHERE id " . $id;
		$Result = self::executeScode($Scode);
		return table::tablecontect($Result, $Scode);	
	}
	static public function ShowDataID_5(){	
		$Result = self::ShowData("5");
		return $Result;
	}
	static public function SQLDelete(){	

		$record = new static::$modelNM();	
		$record->fname = "Dalven";
		$record->lname = "Kelwen";
		$record->GoFunction("Delete");	
		return self::showData();	
	}
	static public function SQLUpdate_11(){	

		$record = new static::$modelNM();	
		$record->id = 6;
		$record->email = '3434@njit.edu';
		$record->fname = "Max";
		$record->lname = "Miller";
		$record->phone = "123456789";
		$record->birthday = "2009-09-01";
		$record->gender = "male";
		$record->password = "098765";
		$record->GoFunction("Update");	
		return self::showData();	
	}
	static public function SQLInsert(){	
		$record = new static::$modelNM();	
		$record->id = 14;	
		$record->email = 'der@njit.edu';
		$record->fname = "Sara";
		$record->lname = "Miller";
		$record->phone = "45434786";
		$record->birthday = "2004-03-04";
		$record->gender = "male";
		$record->password = "3765434";
		$record->GoFunction("Insert");	
		return self::showData();	
}
class accounts extends collections{
	protected static $modelNM = "accounts";
}
class todos extends collections{
	protected static $modelNM = "todos";
}


abstract class model{

	public function GoFunction($action){	
		$conn = Database::connect();
		if($conn){	
			$content = get_object_vars($this);	
			$Scode = $this->$action($content);
			$launchcode = $conn->prepare($Scode); 
			$Result = $launchcode->execute();
			$Result = ($Result = 1) ? " Successful " : " Error ";
			echo "SQL Code : </br>" . $Scode . "<hr>" . $action . " Operation " . $Result . "<hr>";
		}		
	}
	private function Insert($content) {	

	unset($content['id']);
	$insertInto = "INSERT INTO " . get_called_class() . "s (";
	$Keystring = implode(',', array_keys($content)) . ") ";	

	$valuestring = implode("','", $content);
	$Scode = $insertInto . $Keystring . "VALUES ('" . $valuestring . "');";
	return $Scode;
	}

	private function Update($content) {	
	$where = " WHERE id = " . $content['id'];
	unset($content['id']);
	$update = "UPDATE " . get_called_class() . "s SET ";
	foreach ($content as $key => $value)	
		$update .= ($value !== Null) ? " $key = \"$value\", " : "";
	$update = substr($update, 0, -2);
	$Scode = $update . $where;		
	return $Scode;
	}

	private function Delete($content) {	

	$where = " WHERE";
	foreach ($content as $key => $value)	
    $where .= ($value !== Null) ? " $key = \"$value\" AND" : "";
	$where = substr($where, 0, -4);		
	$Scode = "DELETE FROM " .  get_called_class() . "s" . $where . ";";
	return $Scode;
	}
	
}
class accounts extends model{	
	public $id;
	public $email;
	public $fname;
	public $lname;
	public $phone;
	public $birthday;
	public $gender;
	public $password;
}
class todos extends model{	
	public $id;
	public $owneremail;
	public $ownerid;
	public $createddate;
	public $duedate;
	public $message;
	public $isdone;
}

?>