<?php

require_once("new_config.php");

class Database {

    public $connection; 

    function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection(){
        $this-> connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // mysqli_connect_errno()
        if($this->connection-> connect_errno){
            die("database connection failed bad >>> ".
            $this->connection-> connect_error);
        }
    }

    public function query($sql){
      $result = $this->connection->query($sql);
      return $this->confirm_query( $result);
    }

    private  function confirm_query($result){
        if(!$result){
            die("Query Failed". $this->connection->error);
        }
        return $result;
    }

    public function escape_string($string){
      return  $this->connection->real_escape_string($string);
    }

    public function the_insert_id(){
        return $this->connection->insert_id;
    }

    public function is_row_affected(){
        return ($this->connection->affected_rows) == 1;
    }

}
$database = new Database();
