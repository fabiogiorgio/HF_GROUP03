<?php


    class Host
    {
        private $hostID;
        private $hostName;
        private $hostType; //either food, jazz or dance.
        private $hostDescription;

        /**
         * @return mixed
         */
        public function getHostDescription()
        {
            return $this->hostDescription;
        }

        /**
         * @param mixed $hostDescription
         */
        public function setHostDescription($hostDescription): void
        {
            $this->hostDescription = $hostDescription;
        }


        /**
         * @return mixed
         */
        public function getHostID()
        {
            return $this->hostID;
        }

        /**
         * @param mixed $hostID
         */
        public function setHostID($hostID)
        {
            $this->hostID = $hostID;
        }

        /**
         * @return mixed
         */
        public function getHostName()
        {
            return $this->hostName;
        }

        /**
         * @param mixed $hostName
         */
        public function setHostName($hostName)
        {
            $this->hostName = $hostName;
        }

        /**
         * @return mixed
         */
        public function getHostType()
        {
            return $this->hostType;
        }

        /**
         * @param mixed $hostType
         */
        public function setHostType($hostType)
        {
            $this->hostType = $hostType;
        }
    }