<?php


    class Order
    {
        /**
         * @return mixed
         */
        public function getEvent()
        {
            return $this->event;
        }

        /**
         * @param mixed $event
         */
        public function setEvent($event)
        {
            $this->event = $event;
        }

        /**
         * @return mixed
         */
        public function getTime()
        {
            return $this->time;
        }

        /**
         * @param mixed $time
         */
        public function setTime($time)
        {
            $this->time = $time;
        }

        /**
         * @return mixed
         */
        public function getUser()
        {
            return $this->user;
        }

        /**
         * @param mixed $user
         */
        public function setUser($user)
        {
            $this->user = $user;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price)
        {
            $this->price = $price;
        }

        /**
         * @return mixed
         */
        public function getIQuantity()
        {
            return $this->iQuantity;
        }

        /**
         * @param mixed $iQuantity
         */
        public function setIQuantity($iQuantity)
        {
            $this->iQuantity = $iQuantity;
        }

        /**
         * @return mixed
         */
        public function getPaymentMethod()
        {
            return $this->paymentMethod;
        }

        /**
         * @param mixed $paymentMethod
         */
        public function setPaymentMethod($paymentMethod)
        {
            $this->paymentMethod = $paymentMethod;
        }

        /**
         * @return mixed
         */
        public function getPaid()
        {
            return $this->paid;
        }

        /**
         * @param mixed $paid
         */
        public function setPaid($paid)
        {
            $this->paid = $paid;
        }
        private $event;
        private $time;
        private $user; //tickets can be sold to not registered users aswell
        private $price;
        private $iQuantity;
        private $paymentMethod; //paypall, iDeal, credit card? how to implement this
        private $paid; //or not paid

    }