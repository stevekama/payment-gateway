<?php 
require_once('initialization.php');

class MPESA_APPS_Details{
    //Decalare table name 
    private $conn;
    private $table_name = 'mpesa_apps_details';
    //Declare class properties 
    public $id;
    public $app_token;
    public $shortcode;
    public $confirmation;
    public $validation;
    public $lipanampesacode;
    public $passkey;
    public $timestamp;
    
    //connect to db 
    public function __construct()
    {
        global $database;
        $this->conn = $database->connect();
    }

    public function create()
    {
       $query = 'INSERT INTO '.$this->table_name.'(app_token, shortcode, confirmation, validation, lipanampesacode, passkey, timestamp)VALUES(:app_token, :shortcode, :confirmation, :validation, :lipanampesacode, :passkey, :timestamp)';  

       //Prepare statement
       $stmt = $this->conn->prepare($query);

       //clean data 
       $this->app_token = htmlentities($this->app_token);
       $this->shortcode = htmlentities($this->shortcode);
       $this->confirmation = htmlentities($this->confirmation);
       $this->validation = htmlentities($this->validation);
       $this->lipanampesacode = htmlentities($this->lipanampesacode);
       $this->passkey = htmlentities($this->passkey);
       $this->timestamp = htmlentities($this->timestamp);
       

       //Bind Data
       $stmt->bindParam(':app_token', $this->app_token);
       $stmt->bindParam(':shortcode', $this->shortcode);
       $stmt->bindParam(':confirmation', $this->confirmation);
       $stmt->bindParam(':validation', $this->validation);
       $stmt->bindParam(':lipanampesacode', $this->lipanampesacode);
       $stmt->bindParam(':passkey', $this->passkey);
       $stmt->bindParam(':timestamp', $this->timestamp);

       //Execute query 
       if($stmt->execute()){
           return true;
       }
       //print error 
       $error = new ErrorLogs();
       $error->errors = $stmt->error;
       $error->description = $stmt->error;
       if($error->create()){
            return false;
       }
    }

}