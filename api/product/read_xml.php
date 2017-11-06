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
 

    $newsXML = new SimpleXMLElement("<products></products>");
    $newsXML->addAttribute('href', 'read.xsl');
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = mysqli_fetch_assoc($stmt)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
 
        $newXML = $newsXML->addChild('product');

        $newsIntro = $newXML->addChild('id', $id);
        $newsIntro = $newXML->addChild('name', $name);
        $newsIntro = $newXML->addChild('description', $description);
        $newsIntro = $newXML->addChild('price', $price);
        $newsIntro = $newXML->addChild('category_id', $category_id);
        $newsIntro = $newXML->addChild('category_name', $category_name);

        array_push($products_arr["records"], $product_item);
    }
 
    // echo json_encode($products_arr);
    // $newsXML = new SimpleXMLElement("<product></product>");
    // $newsXML->addAttribute('newsPagePrefix', 'value goes here');
    // $newsIntro = $newsXML->addChild('id');
    // $newsIntro->addAttribute('id', '12');
    Header('Content-type: text/xml');
    echo $newsXML->asXML();
}
 
// else{
//     echo json_encode(
//         array("message" => "No products found.")
//     );
// }
?>