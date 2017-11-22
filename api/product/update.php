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
 
// prepare product object
$product = new Product($db);
$postdata = file_get_contents("php://input");
$data = json_decode($postdata);

$product->productId = $data->productId;
$product->productCategory = "1";
$product->productName = $data->productName;
$product->productImage = "sample.png";
$product->productDescription = $data->productDescription;
$product->productQuantity = "100";
$product->productStock = "100";
$product->productPrice = $data->productPrice; 
 
// update the product
if($product->update()){
    echo '{';
        echo '"message": "Product was updated."';
    echo '}';
}
 
// if unable to update the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to update product."';
    echo '}';
}
?>