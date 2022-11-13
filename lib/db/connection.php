<?php
    class Connection
    {   // Props
        private $serverName;
        private $username;
        private $password;
        private $database;

        // Constructor
        protected function __construct($serverName, $username, $password, $database)
        {
            $this->serverName = $serverName;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        // Methods
        protected function connect()
        {
            $conn = new mysqli($this->serverName, $this->username, $this->password, $this->database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            return $conn;
        }

        public function closeConnection($conn)
        {
            $conn->close();
        }
    }
