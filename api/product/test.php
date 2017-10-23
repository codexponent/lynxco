<?php

include_once '../../functions/Connection.php';

$dataConnect = new Connection();
$dataConnect->setConnection();
$connection = $dataConnect->getConnection();

$query = "show TABLES";

$returnedData = mysqli_query($connection, $query);
print_r($returnedData);
mysqli_close($connection);


?>