<?php
    
    class View{

        public function execute($queries, mysqli $connection){
            //global $connection;
            
            $returnedData = mysqli_query($connection, $queries);

            return $returnedData;

            mysqli_close($connection);
            // if ($connection -> query($queries) === TRUE) {
            //     echo "New record created successfully";
            // } else {
            //     echo "Error: " . $sql . "<br>" . $connection->error;
            // }
            // $connection->close();
        }

    }

?>