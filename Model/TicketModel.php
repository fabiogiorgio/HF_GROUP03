<?php

/**
 * Class TicketModel
 */
class TicketModel extends DB
{
    protected $tableName = 'ticket';

    /**
     * @param $post
     * @return bool|mysqli_result
     */
    public function insert($post)
    {
        $sql = "INSERT INTO {$this->getTableName()} (`category`, `image`, `price`, `title`, `description`,
                   `from`, `to`, `qty`, `location`, `session`)
                VALUES ('{$post['category']}', '{$_FILES['image']['name']}',
                        '{$post['price']}', '{$post['title']}', '{$post['description']}',
                        '{$post['from']}', '{$post['to']}', '{$post['qty']}', '{$post['location']}',
                        '{$post['session']}')";

        return mysqli_query($this->con, $sql);
    }

    /**
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if($result != false){
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * @param $id
     * @return string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * @param $id
     * @param $post
     * @return bool|mysqli_result
     */
    public function update($id, $post)
    {
        $sql = "UPDATE {$this->getTableName()}
                SET `category` = {$post['category']},
                    `price` = {$post['price']},
                    `title` = '{$post['title']}',
                    `description` = '{$post['description']}',
                    `from` = '{$post['from']}',
                    `to` = '{$post['to']}',
                    `qty` = {$post['qty']},
                    `location` = '{$post['location']}',
                    session = '{$post['session']}'";
        if (!empty($_FILES['image']['tmp_name'])) {
            $sql .= ", `image` = '{$_FILES['image']['name']}'";
        }
        $sql .= " WHERE id = {$id}";

        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $category
     * @return array
     */
    public function getDay($category)
    {
        $sql = "SELECT DISTINCT DAY(`from`) AS day, DAYOFWEEK(`from`) AS dayOfWeed 
                FROM {$this->getTableName()} WHERE `from` >= NOW() AND category = {$category} ORDER BY day ASC";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if($result != false){
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * @param $category
     * @return string[]
     */
    public function getDayAsc($category)
    {
        $sql = "SELECT DISTINCT DAY(`from`) AS day
                FROM {$this->getTableName()} WHERE `from` >= NOW() AND category = {$category} ORDER BY day ASC LIMIT 1";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * @param $day
     * @param $category
     * @return array
     */
    public function getTicketByDay($day, $category)
    {
        $data = [];
        $sql = "SELECT * FROM {$this->getTableName()} WHERE DAY(`from`) = {$day} AND category = {$category} AND id NOT IN (26,28)";
        $result = mysqli_query($this->con, $sql);
        if($result != false){
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * @param $category
     * @return array
     */
    public function getListByCategory($category)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE category = {$category} AND id NOT IN (26,28) ORDER BY `from` ASC";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if($result != false){
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * @param $category
     * @return array
     */
    public function getAllDays($category)
    {
        $sql = "SELECT DISTINCT DAY(`from`) AS day
                FROM {$this->getTableName()} WHERE category = {$category} ORDER BY day ASC";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if($result != false){
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * @return array
     */
    public function getListFood()
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE category = 3";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if($result != false){
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * @param $idArr
     * @return array
     */
    public function getTicketByIds($idArr)
    {
        $data = [];
        $ids = implode(',', $idArr);
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id IN ({$ids})";
        $result = mysqli_query($this->con, $sql);
        if($result != false){
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

     /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $category
     * @return string[]|null
     */
    public function getSpecialTicket($category)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE title = 'All Access Pass' AND category = {$category}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
}