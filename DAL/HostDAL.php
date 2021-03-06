<?php

<<<<<<< Updated upstream
    session_start();
    require_once '../../includes/credentials.php';
=======
    require_once '../includes/credentials.php';
>>>>>>> Stashed changes

    class HostDAL
    {
        private static $instance = null;
        private $conn = null;
        private function __construct()
        {
            $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);


        }
        public static function getInstance()
        {
            if(self::$instance == null) //bound to the class, self
            {
                self::$instance = new HostDAL();
            }
            return self::$instance;

        }


        public function getALlHosts()
        {
            $query = "SELECT HostID, hostName, hostType, description FROM Host";

            return $this->executeSelectQuery($query, "");

        }
        public function getHostsByType($hostType)
        {
            $query = "SELECT HostID, hostName, hostType, description FROM Host WHERE hostType = ?";

            return $this->executeSelectQuery($query, "s", $hostType);
        }
        private function executeSelectQuery($query, $params, ...$variables)
        {
            return $this->executeQuery($query, $params, ...$variables)->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        private function executeQuery($query, $params, ...$variables)
        {

            //$this->conn->set_charset('utf8');

            $stmt = mysqli_stmt_init($this->conn);
            mysqli_stmt_prepare($stmt, $query);

            if (isset($params) && count($variables) > 0)
            {
                try
                {
                    mysqli_stmt_bind_param($stmt, $params, ...$variables);
                } catch (Exception $e)
                {
                    throw new Exception("Connection failed: $e");
                }
            }
            $stmt->execute();

            $error = $this->conn->error;
            if ($error)
            {
                throw new Exception("Database error: '$error'");
            }

            return $stmt;
        }

    }