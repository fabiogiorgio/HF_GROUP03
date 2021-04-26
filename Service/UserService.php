<?php
    require_once '../DAL/UserDAL.php.php';

    class UserService
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
                self::$instance = new UserService();
            }
            return self::$instance;
        }
        public function getUserByID($id)
        {

        }

    }