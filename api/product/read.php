<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../objects/product.php';
include_once '../../functions/Connection.php';

// instantiate database and product object
$database = new Connection();
$db = $database->setConnection();
$db = $database->getConnection();

// initialize object
$product = new Product($db);

// query products
$stmt = $product->read();
$num = $stmt->num_rows;

// check if more than 0 record found
if($num>0){
    
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
    
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = mysqli_fetch_assoc($stmt)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $product_item=array(
        "productId" => $productId,
        "productCategory" => $productCategory,
        "productName" => $productName,
        "productImage" => $productImage,
        "productDescription" => html_entity_decode($productDescription),
        "productQuantity" => $productQuantity,
        "productStock" => $productStock,
        "productPrice" => $productPrice
        );
        
        array_push($products_arr["records"], $product_item);
    }
    
    echo json_encode($products_arr);
}

else{
    echo json_encode(
    array("message" => "No products found.")
    );
}
?>