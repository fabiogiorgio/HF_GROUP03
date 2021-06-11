<?php

/**
 * Class allAccess
 */
class allAccess extends Controller
{
    public function execute($active = 0)
    {
        $this->view('index',
            [
                'page'      => 'allAccess',
                'days'      => $this->getDay($active),
                'tickets'   => $this->getTicketByDay($active),
                'all'       => $this->getListByCategory(),
                'list'      => $this->getList(),
                'special'   => $this->getSpecialTicket()
            ]
        );
    }

    /**
     * @param $day
     * @return mixed
     */
    public function getTicketByDay($day)
    {
        $model = $this->model('TicketModel');
        if ($day == 0) {
            $day = $model->getDayAsc(2)['day'];
        }
        return $model->getTicketByDay($day, 2);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $model = $this->model('TicketModel');

        return $model->getListByCategory(2);
    }

    /**
     * @param $active
     * @return mixed
     */
    public function getDay($active)
    {
        $model = $this->model('TicketModel');
        $days = $model->getDay(2);
        $result = [];
        $count = 0;
        foreach ($days as $day) {
            switch ($day['dayOfWeed']) {
                case 1:
                    $day['dayOfWeed'] = 'Sunday';
                    break;
                case 2:
                    $day['dayOfWeed'] = 'Monday';
                    break;
                case 3:
                    $day['dayOfWeed'] = 'Tuesday';
                    break;
                case 4:
                    $day['dayOfWeed'] = 'Wednesday';
                    break;
                case 6:
                    $day['dayOfWeed'] = 'Friday';
                    break;
                case 7:
                    $day['dayOfWeed'] = 'Saturday';
                    break;
                default:
                    $day['dayOfWeed'] = 'Saturday';
            }
            $day['active'] = 0;
            if ($active == $day['day']) {
                $day['active'] = 1;
            }
            if ($active == 0 && $count == 0) {
                $day['active'] = 1;
            }
            $result[] = $day;
            $count++;
        }
        return $result;
    }

    /**
     * @return array
     */
    public function getListByCategory()
    {
        $model = $this->model('TicketModel');
        $days = $this->getAllDays();

        $tickets = $model->getListByCategory(2);
        $result = [];
        foreach ($days as $day) {
            foreach ($tickets as $ticket) {
                if ($day['day'] == date('d', strtotime($ticket['from']))) {
                    $result[date('Y-m-d', strtotime($ticket['from']))][] = $ticket;
                }
            }
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getAllDays()
    {
        $model = $this->model('TicketModel');
        return $model->getAllDays(2);
    }

    /**
     * @return mixed
     */
    public function getSpecialTicket()
    {
        $model = $this->model('TicketModel');
        return $model->getSpecialTicket(2);
    }
}