<?php

    //session_start();


    //    require_once '../../Includes/credentials.php';
    require_once '../Includes/credentials.php';

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

        public function getEventByEventID($eventId)
        {
            $query = "SELECT h.hostName, e.eventLocation, e.eventPrice, e.eventDateTime FROM Event as e JOIN Host as h ON h.HostID = e.eventHost WHERE e.eventID = ?";
            return $this->executeSelectQuery($query, 'i', $eventId);
        }


        public function getEventsForHost($hostId)
        {
            $query = "SELECT e.eventID, e.eventLocation, e.eventDateTime, e.eventPrice, h.hostName FROM Event as e JOIN Host as h ON e.eventHost = h.HostID WHERE e.eventHost = ?";
            return $this->executeSelectQuery($query, 'i', $hostId);
        }

        // returns an array of days that a specific event is happening on it
        public function getEventsByDayAndType($eventType, $eventDay)
        {
            $query = "SELECT e.eventLocation, e.eventDateTime, e.eventPrice, h.hostName, h.hostType FROM Event as e JOIN Host as h on e.eventHost = h.HostID WHERE h.hostType = ?";
            return $this->executeSelectQuery($query, 's', $eventType);
        }

        public function getEventDays($eventType)
        {
            $query = "SELECT e.eventDateTime FROM Event as e JOIN Host as h on e.eventHost = h.HostID WHERE h.hostType = ?";
            return $this->executeSelectQuery($query, 's', $eventType); // returns an array of all dates in mysql format time stamp
        }

        public function getEventsForDay($eventDay)
        {
            $day = "%" . $eventDay . "%";
            $query = "SELECT e.eventID, e.eventLocation, e.eventDateTime, h.hostName, e.maxCapacity, e.eventPrice from Event as e join Host as h ON e.eventHost = h.HostID WHERE e.eventDateTime LIKE ?";
            return $this->executeSelectQuery($query, 's', $day);


        }


        public function getAllEvents()
        {
            $query = "SELECT e.eventID, e.eventLocation, e.eventDateTime, h.hostName, e.maxCapacity, e.eventPrice from Event as e join Host as h ON e.eventHost = h.HostID";
            return $this->executeSelectQuery($query, '');

        }


        public function getEventsByType($eventType)
        {

            $query = "select e.eventID, e.eventLocation, e.eventDateTime, h.hostName, e.maxCapacity, e.eventPrice from Event as e join Host as h ON e.eventHost = h.HostID where  h.hostType = ?";
            return $this->executeSelectQuery($query, 's', $eventType);

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
                }
                catch (Exception $e)
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
