<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
// include_once '../config/database.php';
include_once '../objects/category.php';

// instantiate database and category object
// $database = new Database();
// $db = $database->getConnection();
include_once '../../functions/Connection.php';

// instantiate database and product object
$database = new Connection();
$database->setConnection();
$db = $database->getConnection();

// initialize object
$category = new Category($db);

// query categorys
$stmt = $category->read();
$num = $stmt->num_rows;

// check if more than 0 record found
if($num>0){
    
    // products array
    $categories_arr=array();
    $categories_arr["records"]=array();
    
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = mysqli_fetch_assoc($stmt)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $category_item=array(
        "id" => $id,
        "name" => $name,
        "description" => html_entity_decode($description)
        );
        
        array_push($categories_arr["records"], $category_item);
    }
    
    echo json_encode($categories_arr);
}

else{
    echo json_encode(
    array("message" => "No products found.")
    );
}
?>