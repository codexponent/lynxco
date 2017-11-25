<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../objects/product.php';
include_once '../../functions/Connection.php';

// instantiate database and product object
$database = new Connection();
$database->setConnection();
$db = $database->getConnection();

// prepare product object
$product = new Product($db);

// set ID property of product to be edited
$product->productId = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
$product->readOne();

// create array
$product_arr = array(
"productId" => $product->productId,
"productCategory" => $product->productCategory,
"productName" => $product->productName,
"productImage" => $product->productImage,
"productDescription" => html_entity_decode($product->productDescription),
"productQuantity" => $product->productQuantity,
"productStock" => $product->productStock,
"productPrice" => $product->productPrice
);

// make it json format
print_r(json_encode($product_arr));

?>