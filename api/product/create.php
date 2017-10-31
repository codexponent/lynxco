<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
// include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/product.php';
 
// $database = new Database();
// $db = $database->getConnection();

include_once '../../functions/Connection.php';

// instantiate database and product object
$database = new Connection();
$database->setConnection();
$db = $database->getConnection();
 
$product = new Product($db);

// get posted data
// $data = json_decode(file_get_contents("php://input"));
$postdata = file_get_contents("php://input");
// $postdata = file_get_contents("http://www.google.co.uk");
echo $postdata;
// echo 'The data type of postdata is '.gettype($postdata);
// echo $postdata;


// $request = json_decode($postdata, FALSE);
$data = json_decode($postdata);
print_r($data);
// echo 'The data type is or request is '.gettype($request);
// $request = json_decode('{"name":"Sulabh", "description":"Hey", "price":"52", "category_id":"1"}');
// '{"name":"Sulabh", "description":"Hey", "price":"52", "category_id":"1"}'
// if ($request == true){
//     echo "true";
// }else{
//     echo "False";
// }

// $name = $request->name;
// $price = $request->price;
// $description = $request->description;
// $category_id = $request->category_id;

// echo "Check Here";
// echo "Name";
// echo $name;
// echo "Price";
// echo $price;
// echo "Description";
// echo $description;
// echo "Category";
// echo $category_id;

// echo "Test Here <br />";
// echo "data<br />";
// echo $data->name;
// print_r($data);
 
// set product property values
$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->category_id = $data->category_id;
$product->created = date('Y-m-d H:i:s');
 
// create the product

    // echo $product->create();

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