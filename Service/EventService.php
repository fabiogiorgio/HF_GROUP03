<?php
//    require_once '../../DAL/EventDAL.php';

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

        public function getEventsForDay($eventDay)
        {
            return $this->dal->getEventsForDay($eventDay);
        }

        public function getEventsByType($eventType)
        {
            return $this->dal->getEventsByType($eventType);
        }

        public function getAllEvents()
        {
            return $this->dal->getAllEvents();
        }

        public function getEventDays($eventType)
        {
            $dbDays = $this->dal->getEventDays($eventType);
            $daysArray = array();

            foreach ($dbDays as $day)
            {
                $timestamp = strtotime($day["eventDateTime"]);
                $day = date('d', $timestamp);
                if(!in_array($day, $daysArray))
                {
                    array_push($daysArray, $day);

                }

            }
            sort($daysArray);
            return $daysArray;

        }
        public function getEventByEventID($eventId)
        {
            return $this->dal->getEventByEventID($eventId);
        }

        public function getEventsForHost($hostId)
        {
            return $this->dal->getEventsForHost($hostId);
        }


    }
