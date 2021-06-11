<?php

/**
 * Class jazz
 */
class jazz extends Controller
{
    /**
     * Jazz view.
     * @param int $active
     */
    function execute($active = 0)
    {
        $this->view('index',
            [
                'page'      => 'jazz',
                'days'      => $this->getDay($active),
                'tickets'   => $this->getTicketByDay($active),
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
            $data = $model->getDayAsc(1);
            if (!empty($data['day'])) {
                $day = $data['day'];
            } else {
                return [];
            }
        }
        return $model->getTicketByDay($day, 1);
    }

    /**
     * @param $active
     * @return mixed
     */
    public function getDay($active)
    {
        $model = $this->model('TicketModel');
        $days = $model->getDay(1);
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
     * @return mixed
     */
    public function getSpecialTicket()
    {
        $model = $this->model('TicketModel');
        return $model->getSpecialTicket(1);
    }
}