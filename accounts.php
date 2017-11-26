<?php
class accounts extends collection {
    protected static $modelName = 'account';
    public $id ;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;    
}

?>