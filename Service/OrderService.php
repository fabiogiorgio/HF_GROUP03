<?php

require_once '../DAL/OrderDAL.php';
    class OrderService
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
                self::$instance = new OrderService();
            }
            return self::$instance;
        }
        public function getOrderByOrderID($orderID)
        {

        }
    }