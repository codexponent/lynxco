<?php
class Category{
    
    // database connection and table name
    private $conn;
    private $table_name = "categories";
    
    // object properties
    public $id;
    public $name;
    public $description;
    public $created;
    
    public function __construct($db){
        $this->conn = $db;
    }
    
    // used by select drop-down list
    public function readAll(){
        //select all data
        $query = "SELECT
        id, name, description
        FROM
        " . $this->table_name . "
        ORDER BY
        name";
        
        // return $stmt;
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        
    }
    
    // used by select drop-down list
    public function read(){
        
        //select all data
        $query = "SELECT
        id, name, description
        FROM
        " . $this->table_name . "
        ORDER BY
        name";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        
    }
    
}
?>