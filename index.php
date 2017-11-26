<?php
ini_set('display_errors', 'On');

error_reporting(E_ALL);

class Manage {
    public static function autoload($class) {
           
	   include $class. '.php';
		        }
}

spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();	



echo "<h1>show records: </h1>";

$records = accounts::findAll();


//Make function to show records
//require showtable($records);


echo '<table border="1"><tr><td>Id</td><td>email</td><td>fname</td><td>lname</td><td>phone</td><td>birthday</td><td>gender</td><td>password</td></tr>';
foreach ($records as $record) {

    echo "<tr><td>".$record->id."</td><td>".$record->email."</td><td>".$record->fname."</td><td>".$record->lname."</td><td>".$record->phone."</td><td>".$record->birthday."</td><td>".$record->gender."</td><td>".$record->password."</td></tr>";
}
echo "</table>";

echo "<h1>Find record: ID=5: </h1>";

$record = accounts::findOne(5);

echo '<table border="1"><tr><td>Id</td><td>email</td><td>fname</td><td>lname</td><td>phone</td><td>birthday</td><td>gender</td><td>password</td></tr>';
echo "<tr><td>".$record->id."</td><td>".$record->email."</td><td>".$record->fname."</td><td>".$record->lname."</td><td>".$record->phone."</td><td>".$record->birthday."</td><td>".$record->gender."</td><td>".$record->password."</td></tr>";

echo "</table>";


echo "<h1>Delete record ID=4 </h1>";

$record = accounts::delete(4);


echo "<h1>Insert new record </h1>";

$newrecord = " , byy@njit.net, yy, bi, 12343213, 1980-1-1, female, 1234321";
$column = "id, email, fname, lname, phone, birthday, gender, password";

$record = accounts::insert($column, $newrecord);




echo "<h1>update new record ID=9: </h1>";
$newrecord = new accounts();
$newrecord->id = "9";
$newrecord->email = 'byy@njit.edu';
$newrecord->fname = "yy";
$newrecord->lname = "bi";
$newrecord->phone = "12345654";
$newrecord->birthday = "1999-02-02";
$newrecord->gender = "female";
$newrecord->password = "qwer1234";

$record = accounts::update($newrecord);


//echo '<table border="1"><tr><td>Id</td><td>email</td><td>fname</td><td>lname</td><td>phone</td><td>birthday</td><td>gender</td><td>password</td></tr>';

//foreach ($records as $record) {

 //   echo "<tr><td>".$record->id."</td><td>".$record->email."</td><td>".$record->fname."</td><td>".$record->lname."</td><td>".$record->phone."</td><td>".$record->birthday."</td><td>".$record->gender."</td><td>".$record->password."</td></tr>";
//}

//echo "</table>";


echo "</br></br>";
echo "</h1> Operation on database todos </br>";


$records = todos::findAll();

// showtable();

 echo '<table border="1"><tr><td>Id</td><td>owneremail</td><td>ownerid</td><td>createdate</td><td>duedate</td><td>message</td><td>isdone</td></tr>';
  foreach ($records as $record) {
    echo "<tr><td>".$record->id."</td><td>".$record->owneremail."</td><td>".$record->ownerid."</td><td>".$record->createddate."</td><td>".$record->duedate."</td><td>".$record->message."</td><td>".$record->isdone."</td></tr>";
 }
 echo "</table>";
//print_r($records);
//this code is used to get one record and is used for showing one record or updating one record
//$todo_record = todos::findOne(1);

echo "<h1>Find record: ID=2: </h1>";
$record = todos::findOne(2);
echo '<table border="1"><tr><td>Id</td><td>owneremail</td><td>ownerid</td><td>createdate</td><td>duedate</td><td>message</td><td>isdone</td></tr>';
    echo "<tr><td>".$record->id."</td><td>".$record->owneremail."</td><td>".$record->ownerid."</td><td>".$record->createddate."</td><td>".$record->duedate."</td><td>".$record->message."</td><td>".$record->isdone."</td></tr>";
 echo "</table>";

echo "<h1> Insert new record: </h1>";

$newrecord = " , byy@njit.net, 123, 2017-11-8, 2017-12-19, hello, 0";
$column = "id, owneremail, ownerid, createddate, duedate, message, isdone";

$record = todos::insert($column, $newrecord);

echo "<h1>Delete record ID=3 </h1>";

$record = todos::delete(3);


echo "<h1>update new record ID=4: </h1>";
$newrecord = new todos();
$newrecord->id = "4";
$newrecord->owneremail = 'baaa@njit.edu';
$newrecord->ownerid = "22";
$newrecord->createddate = "2017-11-18";
$newrecord->duedate = "2018-6-4";
$newrecord->message = "updated";
$newrecord->isdone = "1";

$record = todos::update($newrecord);

 echo '<table border="1"><tr><td>Id</td><td>owneremail</td><td>ownerid</td><td>createdate</td><td>duedate</td><td>message</td><td>isdone</td></tr>';
  foreach ($records as $record) {
    echo "<tr><td>".$record->id."</td><td>".$record->owneremail."</td><td>".$record->ownerid."</td><td>".$record->createddate."</td><td>".$record->duedate."</td><td>".$record->message."</td><td>".$record->isdone."</td></tr>";
 }
 echo "</table>";

?>