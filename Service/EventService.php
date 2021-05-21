<?php
    require_once '../DAL/EventDAL.php';
    class EventService
    {
        private $dal = null;
        private static $instance;
        private function __construct()
        {
            $this->dal = EventDAL::getInstance();
        }
        public static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new EventService();
            }
            return self::$instance;
        }

        public function getEventsByDay($day, $hostType)
        {
            return $this->dal->getEventsByDay($day, $hostType);

        }
        public function getEventsByType($eventType)
        {
            return $this->dal->getEventsByType($eventType);
        }

        public function getAllEvents()
        {
            return $this->dal->getAllEvents();
        }



    }
