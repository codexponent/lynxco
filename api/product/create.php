<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../objects/product.php';
include_once '../../functions/Connection.php';

// instantiate database and product object
$database = new Connection();
$database->setConnection();
$db = $database->getConnection();
 
$product = new Product($db);

// get posted data
// $data = json_decode(file_get_contents("php://input"));
$postdata = file_get_contents("php://input");

// $request = json_decode($postdata, FALSE);
$data = json_decode($postdata);
print_r($data);
 
// set product property values
$product->productCategory = "1";
$product->productName = $data->productName;
$product->productImage = "sample.png";
$product->productDescription = $data->productDescription;
$product->productQuantity = "100";
$product->productStock = "100";
$product->productPrice = $data->productPrice; 
// create the product

if($product->create()){
    echo '{';
        echo '"message": "Product was created."';
    echo '}';
}
 
// if unable to create the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to create product."';
    echo '}';
}
?>