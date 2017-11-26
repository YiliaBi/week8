<?php

class todos extends collection {
    protected static $modelName = 'todo';
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;
}

?>