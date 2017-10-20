<?php 
	session_start();
    require('../functions/Connection.php');
    require('../functions/Delete.php');
    

	if(isset($_SESSION['customerId'])){

		$customerId = $_SESSION['customerId'];
		$deleteQuery = "DELETE FROM customer WHERE id = '$customerId'";
        // echo "<script>window.history.back();</script>";
        echo "<script>window.open('../index.php', '_self')</script>";

        $gettingConnection = new Connection();
        $gettingConnection -> setConnection();
        $connection = $gettingConnection -> getConnection();
    
        $deleteProcess = new Delete();
        $data = $deleteProcess -> execute($deleteQuery, $connection);        

	}

?>