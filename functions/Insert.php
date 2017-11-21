<?php
    
    class Insert{

        public function execute($queries, mysqli $connection){
            // global $connection;
            mysqli_query($connection, $queries);
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