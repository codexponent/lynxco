<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../functions/Connection.php';

$dataConnect = new Connection();
$dataConnect->setConnection();
$connection = $dataConnect->getConnection();


$postdata = file_get_contents("php://input");
// $postdata = file_get_contents("http://www.google.co.uk");
echo $postdata;



// $query = "show TABLES";

// $returnedData = mysqli_query($connection, $query);
// print_r($returnedData);

// return $returnedData;

// mysqli_close($connection);


?>