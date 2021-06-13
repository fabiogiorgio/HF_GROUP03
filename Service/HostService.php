<?php
    require_once '../DAL/HostDAL.php';

    class HostService
    {
        private $dal;
        private static $instance;

        private function __construct()
        {
            $this->dal = HostDAL::getInstance();

        }

        public static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new HostService();
            }
            return self::$instance;
        }


    }