<?php
    
    class View{

        public function execute($queries, mysqli $connection){
            //global $connection;
            $returnedData = mysqli_query($connection, $queries);
            return $returnedData;
            mysqli_close($connection);
        }

    }

?>