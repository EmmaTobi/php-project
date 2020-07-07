<?php

class User extends Entity{

    protected static $primarykey = "id";
    protected static  $db_table = "users";
    protected static  $db_table_fields = array("username", "password", "first_name", "last_name", "user_image");
    public $id;
    public $username = "";
    public $password = "";
    public $first_name = "";
    public $last_name = "";
    public $user_image = "";
    public $upload_directory = "images";

    public $tmp_path ;
    public $size;
    public $type;

    public function __construct()
    {
    }

    public function __construct0(
        $id, $username, $password, $firstname, $lastname){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->first_name =  $firstname;
        $this->last_name = $lastname;
        
    }
    public function __construct1($username, $password, $firstname, $lastname){
        $this->username = $username;
        $this->password = $password;
        $this->first_name =  $firstname;
        $this->last_name = $lastname;

    }

    public function image_path_and_placeholder(){
        return (empty($this->user_image)) ? $this->image_placeholder : $this->upload_directory .DS. $this->user_image;
    }

    public function save($user){
        
        $target_path = SITE_ROOT . "gallery" .DS. "admin" .DS. $this->upload_directory .DS. $this->user_image;
        if($user->id){
       
            $this->update($user);
        }else{
           
            if(file_exists($target_path)){
                $this->custom_error_array[]  = "The file {$this->user_image} already exists ...";
                die("<span style='color: white'>". $target_path ."</span>");
                return false;
            }
            
            if(move_uploaded_file($this->tmp_path, $target_path)){
                if($this->create($user)){
 
                    unset($this->tmp_path);
                    return true;
                }
    
            }else{
                $this->custom_error_array[] = "the file directory probably does not have permission";
                return false;
            }
        }
    }

    public function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $user = $this->find_by_username_password($username, $password);
        if($user){
            return $user;    
        }
        else{
            false;
        }
    }

    public function find_by_username_password($username, $password){
        $sql = "SELECT * FROM ". self::$db_table  ." WHERE username = '{$username}'" . " AND " . " password = '{$password}'  LIMIT 1";
        return $this->exec_query($sql)[0];
    }
    
    public function delete_photo($photo){
        if($photo){
            if($this->delete($photo)){
                $target_path = SITE_ROOT  . "admin" .DS. $this->upload_directory  . DS . $this->filename;
                return unlink($target_path) ? true: false;
            }else{
                return false;
            }
        }
    }

    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->custom_error_array[] = "There was no file uploaded here";
            return false;
        }elseif($file['error'] != 0 ){
            $this->custom_error_array[] = $this->upload_errors_array[$file["error"]];
            return false;
        }else{
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->size = $file['size'];
            $this->type = $file['type'];
        }
    }

}

?>