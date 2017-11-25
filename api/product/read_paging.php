<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../objects/product.php';
include_once '../../functions/Connection.php';

// utilities
$utilities = new Utilities();

$database = new Connection();
$database->setConnection();
$db = $database->getConnection();

// initialize object
$product = new Product($db);

// query products
$stmt = $product->readPaging($from_record_num, $records_per_page);
$num = $stmt->num_rows;

// check if more than 0 record found
if($num>0){
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
    $products_arr["paging"]=array();
    
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = mysqli_fetch_assoc($stmt)){
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
    
    // include paging
    $total_rows=$product->count();
    $page_url="{$home_url}product/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $products_arr["paging"]=$paging;
    
    echo json_encode($products_arr);
}

else{
    echo json_encode(
    array("message" => "No products found.")
    );
}
?>