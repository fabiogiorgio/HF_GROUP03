<?php
    session_start();
    require_once '../includes/credentials.php';

    class UserDAL
    {
        private static $instance = null;
        private $conn = null;

        private function __construct()
        {
            $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);


        }
    }
