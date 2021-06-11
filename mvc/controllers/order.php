<?php

/**
 * Class order
 */
class order extends Controller
{
    public function execute()
    {
        $this->view('index',
            [
                'page'      => 'order',
                'tickets'   => $this->getCartItems()
            ]
        );
    }

    public function detail()
    {
        $this->view('index',
            [
                'page'      => 'detail',
                'tickets'   => $this->getCartItems(),
                'customer'  => $this->getCustomer()
            ]
        );
    }
    
    public function payment()
    {
        $this->view('index',
            [
                'page'      => 'payment',
                'tickets'   => $this->getCartItems()
            ]
        );
    }

    public function complete()
    {
        $this->view('index', ['page' => 'complete']);
    }

    public function addToCart()
    {
        $id = $_POST['id'];
        $qty = $_POST['quantity'];
        $itemArray = [
            'id' => $id,
            'qty'   => $qty
        ];
        if ($_SESSION['cart'][$id]) {
            $_SESSION['cart'][$id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$id] = $itemArray;
        }
        $total = 0;
        foreach ($_SESSION['cart'] as $value) {
            $total += $value['qty'];
        }
        $_SESSION['total'] = $total;
        $this->addSuccessMessage('Add to cart successfully.');
        return $this->redirect();
    }

    /**
     * @return mixed
     */
    public function getCartItems()
    {
        if(isset($_SESSION['cart'])){
            $idArr = array_keys($_SESSION['cart']);
            $model = $this->model('TicketModel');
            return $model->getTicketByIds($idArr);
        }else{
            return [];
        }
    }

    /**
     * @param $id
     */
    public function deleteItem($id)
    {
        unset($_SESSION['cart'][$id]);
        return $this->redirect();
    }

    public function getCustomer()
    {
        $id = $_SESSION['id'];
        $model = $this->model('CustomerModel');
        return $model->getById($id);
    }

    public function get()
    {
        $orderModel = $this->model('OrderModel');
        $data = $orderModel->getAllOrder();
        $this->view('admin',
            [
                'page'          => 'order-list',
                'order'         => $data,
                'title'         => 'Order list'
            ]
        );
    }

    public function see($id)
    {
        $orderModel = $this->model('OrderModel');
        $data = $orderModel->getProductByOrderId($id);
        $this->view('admin',
            [
                'page'          => 'order-detail',
                'order'         => $data,
                'title'         => 'Order detail'
            ]
        );
    }

    public function paid($id)
    {
        $orderModel = $this->model('OrderModel');
        $status = $orderModel->paidOrderById($id);
        if($status){
            $this->addSuccessMessage('Update status successfully.');
            return $this->redirect('?url=order/get');
        }
    }

    public function cancle($id)
    {
        $orderModel = $this->model('OrderModel');
        $status = $orderModel->cancleOrderById($id);
        if($status){
            $this->addSuccessMessage('Update status successfully.');
            return $this->redirect('?url=order/get');
        }
    }
}