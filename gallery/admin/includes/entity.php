<?php

abstract class entity {

    protected static $primarykey = "";
    protected static $db_table = "";
    protected static $db_table_fields = array();


    public function properties(){
        global $database;
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)){
            $key = $database->escape_string($db_field);
            $value = $database->escape_string($this->$db_field);
            $properties[$key] = $value;
            }
        }
        return $properties;
    }

    abstract function save($entity);

    public function update($entity){
        global $database;
        $properties = $this->properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }
        $sql_update = "UPDATE ". static::$db_table . " SET ";
        $sql_update .= implode(",  ", $properties_pairs);
        $sql_update .=" WHERE ".static::$primarykey." = " . $database->escape_string(get_object_vars($entity)[static::$primarykey]) . " ;";
        $database->query($sql_update);
        return $database->is_row_affected() ? $this: 
                    die("No Row Was Affected...");
    }

    public function create($entity){
        global $database;
        $properties = $entity->properties();
        $sql_create = "INSERT INTO ". static::$db_table . " (". implode(",", array_keys($properties)) . " ) ";
        $sql_create .= " VALUES ( '" . implode("',  '", array_values($properties)) . "' )";
        if($database->query($sql_create)){
            $true_id = $database->the_insert_id();
            $entity->id = $true_id;
            return $entity->find_by_id($true_id);
        }else{
            die("An error occured while attempting to create ...");
        }
    }

    public function delete( $entity){
        global $database;
        $sql_delete = "DELETE FROM ". static::$db_table ." WHERE ".static::$primarykey." = ".  $database->escape_string(get_object_vars($entity)[static::$primarykey]);
        $database->query($sql_delete);
        return $database->is_row_affected() ? true: 
                    die("An error occured while attempting to delete user with ".static::$primarykey." ". get_object_vars($entity)[static::$primarykey] ." ...");
    }

    public function find_by_id($id){
        $calling_class = get_called_class();
        $sql = "SELECT * FROM ". $calling_class::$db_table ." WHERE ".$calling_class::$primarykey." = {$id} LIMIT 1";
        return $this->exec_query($sql , $id);
    }

    public function find_all(){
        $sql = "SELECT * FROM " . static::$db_table;
        return $this->exec_query($sql);
    }

    protected  function has_the_attribute($attribute){
        $fields =   get_object_vars($this);
        return array_key_exists($attribute, $fields );
    }

    public function exec_query($query){
        global $database;
        $result_set = $database->query($query);
        $entities = array();
        while($result = mysqli_fetch_array( $result_set ) ){
              $entity =  $this->convert_to_entity($result);
              array_push($entities, $entity);
            }
        return !empty($entities) ? $entities: false;
    }

    public  function convert_to_entity($result_set_array){
        $calling_class = get_called_class();
        $properties = $this->properties();
        $entity = new $calling_class();
        foreach ($properties as $key => $value) {
            $entity->$key= $this->helper_check_attribute($key, $result_set_array );
        }
        $parameter = static::$primarykey;
        $entity->$parameter = $result_set_array[static::$primarykey];
        return $entity;
    }

    protected  function helper_check_attribute($attribute, $result_set_array ){
        return  $this->has_the_attribute($attribute) ?  $result_set_array[$attribute] : 
                die("attempt to map key prop == " . $attribute ." to object field failed ");
    }

}
?>