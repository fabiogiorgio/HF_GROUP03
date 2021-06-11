<?php

/**
 * Class dashboard
 */
class dashboard extends Controller
{
    /**
     * Food view.
     */
    public function execute()
    {
        $orderModel = $this->model('OrderModel');
        $data = $orderModel->getOrderBydate();
        $this->view('admin',
            [
                'page'      => 'dashboard',
                'title'     => 'dashboard',
                'order'     => $data
            ]
        );
    }
}