<?php
    require_once '../DAL/UserDAL.php';

    class UserService
    {
        private $dal = null;
        private static $instance;

        private function __construct()
        {
            $this->dal = UserDAL::getInstance();

        }

        public static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new UserService();
            }
            return self::$instance;
        }
        public function createUser($fullName, $email, $phoneNumber, $loginName, $password, $role){

            return $this->dal->createUser($fullName, $email, $phoneNumber, $loginName, $password, $role);
        }

        public function emailExists($email){

            return $this->dal->emailExists($email);
        }

        public function userLogin($email, $password){

            return $this->dal->userLogin($email, $password);
        }

        public function getAllUsers(){

            return $this->dal->getAllUsers();
        }
    }
