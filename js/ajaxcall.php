<?php
    require('../functions/Connection.php');
    require('../functions/View.php');
    
    $u = $_REQUEST['u'];
    //echo $u;

    $gettingConnection = new Connection();
    $gettingConnection -> setConnection();
    $connection = $gettingConnection -> getConnection();

    $checkQuery = "select * from customer where email='$u'";
    // $result = mysqli_query($connection, $sql_query); 
    
    $viewProcess = new View();
    $data = $viewProcess -> execute($checkQuery, $connection);
    $answer = mysqli_num_rows($data) ;

    if($answer > 0){
        echo "found";
    }else{
        echo "not found";
    }
            



?>