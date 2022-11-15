<?php
// import the connection.php file
include_once 'lib/db/connection.php';

class DB extends Connection
    {
        // Props
        public $conn;

        // Constructor
        public function __construct()
        {
            $serverName = getenv('DB_HOST');
            $username = getenv('DB_USER');
            $password = getenv('DB_PASS');
            $database = getenv('DB_NAME');

            parent::__construct($serverName, $username, $password, $database);

            $this->conn = $this->connect();
        }

        public function query($query)
        {
            return $this->conn->query($query);
        }

        public function close()
        {
            $this->closeConnection($this->conn);
        }
    }
