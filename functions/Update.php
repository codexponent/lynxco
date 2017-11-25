<?php

class Update{
    
    public function execute($queries, mysqli $connection){
        global $connection;
        mysqli_query($connection, $queries);
        mysqli_close($connection);
    }
    
}

?>