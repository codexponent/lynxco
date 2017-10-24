<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../objects/product.php';
    // include_once '../config/database.php';
    
    // get database connection
    // $database = new Database();
    // $db = $database->getConnection();
    include_once '../../functions/Connection.php';

    // instantiate database and product object
    $database = new Connection();
    $database->setConnection();
    $db = $database->getConnection();
    
    // prepare product object
    $product = new Product($db);
    
    //Testing
    // echo "Testing <br/>";
    // echo "read_one.php is running <br />";
    // echo "Getting the id< br/>";
    // $we = $_GET['id'];
    // echo "<br />";
    // echo $_GET['id'];

    // set ID property of product to be edited
    $product->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    // read the details of product to be edited
    $product->readOne();
    
    // create array
    $product_arr = array(
        "id" =>  $product->id,
        "name" => $product->name,
        "description" => $product->description,
        "price" => $product->price,
        "category_id" => $product->category_id,
        "category_name" => $product->category_name
    );

    // make it json format
    print_r(json_encode($product_arr));
    
?>