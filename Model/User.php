<?php


    class User
    {
        private $name;
        private $email;
        private $phoneNumber;
        private $login;
        private $password;
        private $role;

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getPhoneNumber()
        {
            return $this->phoneNumber;
        }

        /**
         * @param mixed $phoneNumber
         */
        public function setPhoneNumber($phoneNumber)
        {
            $this->phoneNumber = $phoneNumber;
        }

        /**
         * @return mixed
         */
        public function getLogin()
        {
            return $this->login;
        }

        /**
         * @param mixed $login
         */
        public function setLogin($login)
        {
            $this->login = $login;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getRole()
        {
            return $this->role;
        }

        /**
         * @param mixed $role
         */
        public function setRole($role)
        {
            $this->role = $role;
        }


    }