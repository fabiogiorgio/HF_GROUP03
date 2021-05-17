<?php

    require_once '../Includes/credentials.php';

    class UserDAL
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
                self::$instance = new UserDAL();
            }
            return self::$instance;
        }

        public function createUser($conn, $firstName, $lastName, $email, $phoneNumber, $loginName, $password, $role){


            $slq = "INSERT INTO Users (fullName, email, phoneNumber, login, password, role) VALUES (?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $slq)){
                header("location: ../Signup.php?error=stmtfailed");
                exit();
            }

            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $fullName = $firstName + " " + $lastName;

            mysqli_stmt_bind_param($stmt, "ssssss", $fullName, $email, $phoneNumber, $loginName, $hashPassword, $role);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../Login.php");
            exit();
        }

        public function emailExists($conn, $email){
            $slq = "SELECT * FROM Users WHERE Usersemail = ?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $slq)){
                header("location: ../Signup.php?error=emailalreadyexists");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $resultData = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($resultData)){
                return $row;
            }
            else{
                $result = false;
                return $result;
            }
            mysqli_stmt_close($stmt);
        }

        public function getAllUsers(){

            $sql = "SELECT * FROM Users";
            $result = mysqli_query($this->conn, $sql);
            $users = array();

            if (mysqli_num_rows($result) > 0){
                foreach($result as $user){
                    array_push($users, $user);
                }
            }
            return $users;
        }

        public function userLogin($conn, $email, $password){
            $emailExists = $this->emailExists($conn, $email);

            if ($emailExists === false){
                header("location: ../Login.php?error=wronglogin");
                exit();
            }

            $passwordhashed = $emailExists["Userspassword"];
            $checkPassword = password_verify($password, $passwordhashed);

            if ($checkPassword === false){
                header("location: ../Login.php?error=wronglogin");
                exit();
            }
            else if($checkPassword === true){
                session_start();
                $_SESSION["Usersemail"] = $emailExists["Usersemail"];
                $_SESSION["Userspassword"] = $emailExists["Userspassword"];
                header("location: ../CMS.php");
            }
            exit();
        }



    }
