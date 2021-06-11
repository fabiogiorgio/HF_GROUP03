<?php


    class Event
    {
        /**
         * @return mixed
         */
        public function getEventID()
        {
            return $this->eventID;
        }

        /**
         * @param mixed $eventID
         */
        public function setEventID($eventID)
        {
            $this->eventID = $eventID;
        }

        /**
         * @return mixed
         */
        public function getEventLocation()
        {
            return $this->eventLocation;
        }

        /**
         * @param mixed $eventLocation
         */
        public function setEventLocation($eventLocation)
        {
            $this->eventLocation = $eventLocation;
        }

        /**
         * @return mixed
         */
        public function getEventTime()
        {
            return $this->eventTime;
        }

        /**
         * @param mixed $eventTime
         */
        public function setEventTime($eventTime)
        {
            $this->eventTime = $eventTime;
        }

        /**
         * @return mixed
         */
        public function getEventDate()
        {
            return $this->eventDate;
        }

        /**
         * @param mixed $eventDate
         */
        public function setEventDate($eventDate)
        {
            $this->eventDate = $eventDate;
        }

        /**
         * @return mixed
         */
        public function getEventHost()
        {
            return $this->eventHost;
        }

        /**
         * @param mixed $eventHost
         */
        public function setEventHost($eventHost)
        {
            $this->eventHost = $eventHost;
        }

        /**
         * @return mixed
         */
        public function getMaxCapacity()
        {
            return $this->maxCapacity;
        }

        /**
         * @param mixed $maxCapacity
         */
        public function setMaxCapacity($maxCapacity)
        {
            $this->maxCapacity = $maxCapacity;
        }
        private $eventID;
        private $eventLocation;
        private $eventTime;
        private $eventDate;
        private $eventHost;
        private $maxCapacity;
    }