<?php
    class Connection{
        // private $serverName = "localhost";
        // private $userName = "root";
        // private $password = "";
        // private $databaseName = "lynx";
        private $serverName = "localhost";
        private $userName = "id3706090_root";
        private $password = "password";
        private $databaseName = "id3706090_lynx";
        private $connection;

        public function setConnection(){                
            // Create connection
            $this -> connection = new mysqli($this -> serverName, $this -> userName, $this -> password, $this -> databaseName);
            
            // Check connection
            if ($this -> connection->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            // echo "Connected successfully";
        }
    
        public function getConnection(){
            return $this->connection;
        }

    }
?>