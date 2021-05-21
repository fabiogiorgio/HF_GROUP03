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
        public function getUserByID($id)
        {

        }
        public function createUser($conn, $firstName, $lastName, $email, $phoneNumber, $loginName, $password, $role){

            return $this->dal->createUser($conn, $firstName, $lastName, $email, $phoneNumber, $loginName, $password, $role);
        }

        public function emailExists($conn, $email){

            return $this->dal->emailExists($conn, $email);
        }

        public function userLogin($conn, $email, $password){

            return $this->dal->userLogin($conn, $email, $password);
        }

        public function getAllUsers(){

            return $this->getAllUsers();
        }
    }