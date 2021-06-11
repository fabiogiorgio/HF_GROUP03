<?php

/**
 * Class CustomerModel
 */
class CustomerModel extends DB
{
    protected $tableName = 'customer';

    /**
     * @param $fullname
     * @param $email
     * @param $password
     * @return bool|mysqli_result
     */
    public function insert($fullname, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO {$this->getTableName()} (fullname, email, password)
                VALUES ('{$fullname}', '{$email}', '{$password}')";
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
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
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
     * @param $fullname
     * @param $email
     * @return bool|mysqli_result
     */
    public function update($id, $fullname, $email)
    {
        $sql = "UPDATE {$this->getTableName()} SET fullname = '{$fullname}'
               , email = '{$email}' WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
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
     * @param $email
     * @return string[]|null
     */
    public function checkEmail($email)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE email = '{$email}'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
}
