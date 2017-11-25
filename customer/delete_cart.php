<?php
session_start();
require('../functions/Connection.php');
require('../functions/Delete.php');


if(isset($_SESSION['customerId'])){
    
    $customerId = $_SESSION['customerId'];
    $productId = $_GET['productValue'];
    $deleteQuery = "DELETE FROM cart WHERE customerId = '$customerId' AND productId = '$productId'";
    
    echo "Query Is: ";
    echo $deleteQuery;
    
    $gettingConnection = new Connection();
    $gettingConnection -> setConnection();
    $connection = $gettingConnection -> getConnection();
    
    $deleteProcess = new Delete();
    $data = $deleteProcess -> execute($deleteQuery, $connection);
    
    header("Location: cart.php");
    
}

?>