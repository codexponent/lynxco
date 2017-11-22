<?php 
session_start();
    require('../../functions/Connection.php');
    require('../../functions/Delete.php');
	
	if(isset($_GET['delete_products'])){

		$delete_id = $_GET['delete_products'];
		$deleteQuery = "DELETE FROM product WHERE PRODUCTID = '$delete_id'";
        echo "<script>window.history.back();</script>";

        $gettingConnection = new Connection();
        $gettingConnection -> setConnection();
        $connection = $gettingConnection -> getConnection();
    
        $deleteProcess = new Delete();
        $data = $deleteProcess -> execute($deleteQuery, $connection);        

	}

?>