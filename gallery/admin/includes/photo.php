<?php

class Photo extends Entity{
    
    protected static  $primarykey = "photo_id";
    protected static  $db_table = "photos";
    protected static  $db_table_fields = array("title", "description", "filename", "type", "size");
    
    public $photo_id;
    public $title = "";
    public $description = "";
    public $filename = "";
    public $type = "";
    public $size = "";

    public $target_directory = "images";
    public $tmp_path;
    public $upload_directory = "images";
    public $custom_error_array = array();

    public $upload_errors_array = array(
        UPLOAD_ERR_OK   =>  "There is no error",
        UPLOAD_ERR_INI_SIZE   =>  "The uploaded file exceeds the upload_max_fileize",
        UPLOAD_ERR_FORM_SIZE   =>  "The uploaded file exceeds the MAX_FIKLE",
        UPLOAD_ERR_PARTIAL   =>  "The uploaded file was only partiall",
        UPLOAD_ERR_NO_FILE   =>  "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR   =>  "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE   =>  "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION   =>  "A php extension stopped the file upload"
    );

    public function save($photo){
        $target_path = SITE_ROOT . "gallery" .DS. "admin" .DS. $this->upload_directory .DS. $this->filename;
        if($photo->photo_id){
            $this->update($photo);
        }else{
            if(file_exists($target_path)){
                $this->custom_error_array[]  = "The file {$this->filename} already exists ...";
                return false;
            }
            if(move_uploaded_file($this->tmp_path, $target_path)){
                if($this->create($photo)){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->custom_error_array[] = "the file directory probably does not have permission";
                return false;
            }
        }
    }

    public function image_path(){
        return  $this->upload_directory  . "/" . $this->filename;
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
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->size = $file['size'];
            $this->type = $file['type'];
        }
    }
    
}



?>