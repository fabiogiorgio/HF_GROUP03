<?php
    class UserDAL
    {

        private function __construct()
        {
            $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);


        }

        public function createUser($conn, $firstName, $lastName, $email, $phoneNumber, $loginName, $password, $role){

            $DbServername = "server.infhaarlem.nl";
            $DbUsername = "s644748_HfDB";
            $DbPassword = "Roflmao000";
            $DbName = "s644748_HfDB";

            $conn = mysqli_connect($DbServername, $DbUsername, $DbPassword, $DbName);

            if (!$conn){
                die("Connection failed: " . mysqli_connect_error());
            }

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
                header("location: ../signup.php?error=emailalreadyexists");
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

    }
