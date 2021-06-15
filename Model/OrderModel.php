<?php

/**
 * Class OrderModel
 */
class OrderModel extends DB
{
    protected $tableName = 'order';

    function saveOrder($row,$order_code)
    {
        $cart =  $_SESSION['cart'];
        $id = $row['customer_id'];
        foreach($cart as $item){
            $data = $this->getById($item['id']);
            $currentQty = $data['qty'];
            $price = $data['price'];
            $ticketId = $item['id'];
            $qty = $item['qty'];
            $sql = "INSERT INTO `order`(`customer_id`,`price`,`order_code`,`ticket_id`,`qty`) VALUES ($id,$price,'$order_code',$ticketId,$qty)";
            $status = mysqli_query($this->con, $sql);
            if($status){
                $sql = "UPDATE ticket SET qty = $currentQty - $qty WHERE id = ".$ticketId;
                return mysqli_query($this->con, $sql);
            }
        }
    }

    /**
     * @param $id
     * @return string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM ticket WHERE id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getAllOrder()
    {
        $data = [];
        $sql = "SELECT o.*,c.fullname c_name,t.title t_name FROM `order` o, `customer` c, `ticket` t WHERE o.customer_id = c.id AND o.ticket_id = t.id GROUP BY o.order_code ";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function getProductByOrderId($id){
        $data = [];
        $sql = "SELECT o.*,t.title t_name FROM `order` o, `ticket` t WHERE o.ticket_id = t.id AND o.order_code = '{$id}'";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function paidOrderById($id)
    {
        $sql = "UPDATE `order` SET status = 1 WHERE order_code = '$id'";
        return mysqli_query($this->con, $sql);
    }

    public function cancleOrderById($id)
    {
        $sql = "UPDATE `order` SET status = 2 WHERE order_code = '$id'";
        return mysqli_query($this->con, $sql);
    }

    public function getOrderByDate()
    {
        $data = [];
        $sql = "SELECT SUM(o.price * o.qty) total_price, DATE_FORMAT(o.created_at,'%d/%m/%Y') date FROM `order` o
        WHERE o.status = 1 GROUP BY DATE_FORMAT(o.created_at,'%d/%m/%Y')";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}