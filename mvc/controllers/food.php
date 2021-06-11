<?php

/**
 * Class food
 */
class food extends Controller
{
    /**
     * Food view.
     */
    public function execute()
    {
        $this->view('index',
            [
                'page'      => 'food',
                'tickets'    => $this->getList()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $model = $this->model('TicketModel');
        return $model->getListFood();
    }
}