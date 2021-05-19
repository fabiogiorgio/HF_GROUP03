<?php

    //session_start();



    require_once '../../Includes/credentials.php';

    class EventDAL
    {
        private static $instance = null;
        private $conn;

        private function __construct()
        {
            $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);


        }

        public static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new EventDAL();
            }
            return self::$instance;
        }

        public function getAllEvents()
        {
            $query = "SELECT e.eventID, e.eventLocation, e.eventDateTime, h.hostName, e.maxCapacity, e.eventPrice from Event as e join Host as h ON e.eventHost = h.HostID";
            return $this->executeSelectQuery($query, '');

        }
        public function getEventsByDay($day, $hostType)
        {

            $date = '%'.$day.'%';
            $query = "select e.eventID, e.eventLocation, e.eventDateTime, h.hostName, e.maxCapacity, e.eventPrice from Event as e join Host as h ON e.eventHost = h.HostID where e.eventDateTime like ? and h.hostType = ?";
            return $this->executeSelectQuery($query, 'ss', $date, $hostType);


        }
        public function getEventsByType($eventType)
        {

            $query = "select e.eventID, e.eventLocation, e.eventDateTime, h.hostName, e.maxCapacity, e.eventPrice from Event as e join Host as h ON e.eventHost = h.HostID where  h.hostType = ?";
            return $this->executeSelectQuery($query, 's',$eventType);

        }
        private function executeSelectQuery($query, $params, ...$variables)
        {
            return $this->executeQuery($query, $params, ...$variables)->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        private function executeQuery($query, $params, ...$variables)
        {

            $this->conn->set_charset('utf8');

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
    ?>