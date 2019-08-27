<?php 
require_once('initialization.php');

class ErrorLogs{
    //Decalare table name 
    private $conn;
    private $table_name = 'error_logs';
    //Declare class properties 
    public $id;
    public $errors;
    public $description;
    public $created_at;
    
    //connect to db 
    public function __construct()
    {
        global $database;
        $this->conn = $database->connect();
    }

    public function create()
    {
       $query = 'INSERT INTO '.$this->table_name.'(errors, description)VALUES(:errors, :description)'; 

       //Prepare statement
       $stmt = $this->conn->prepare($query);

       //clean data 
       $this->errors = htmlentities($this->errors);
       $this->description = htmlentities($this->description);
       
       //Bind Data
       $stmt->bindParam(':transaction_type', $this->errors);
       $stmt->bindParam(':transaction_id', $this->description);

       //Execute query 
       if($stmt->execute()){
           return true;
       }
    }

}