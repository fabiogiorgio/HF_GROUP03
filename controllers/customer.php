<?php

/**
 * Class customer
 */
class customer extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['id']) && $_SESSION['id'] != 'admin') {
            $this->redirect('?url=login');
        }
    }

    /**
     * Customer list view.
     */
    public function execute()
    {
        $this->view('admin',
            [
                'page'          => 'customer',
                'customer'      => $this->getList(),
                'title'         => 'Customer list'
            ]
        );
    }

    /**
     * Edit customer form.
     */
    public function edit($id = null)
    {
        $data = [];

        if ($id) {
            $data = $this->getById($id);
        }

        $this->view('admin',
            [
                'page'          => 'customer-edit',
                'customer'      => $data,
                'title'         => 'Update customer'
            ]
        );
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $id         = $_POST['id'] ?: null;
        $fullname   = $_POST['fullname'] ?: '';
        $email      = $_POST['email'] ?: '';
        $password   = $_POST['password'] ?: '';

        try {
            $model = $this->model('CustomerModel');
            if ($id) {
                $info = $model->update($id, $fullname, $email);
                if ($info) {
                    $this->addSuccessMessage('You saved the customer.');
                } else {
                    $this->addErrorMessage('Something went wrong while saving the customer.');
                }
            } else {
                $customerId = $model->insert($fullname, $email, $password);
                if ($customerId) {
                    $this->addSuccessMessage('You saved the customer.');
                } else {
                    $this->addErrorMessage('Something went wrong while saving the customer.');
                }
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=customer');
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $model = $this->model('CustomerModel');
        return $model->getList();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $model = $this->model('CustomerModel');
        return $model->getById($id);
    }

    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Page not found');
            return $this->redirect('?url=customer');
        }

        try {
            $model = $this->model('CustomerModel');
            $status = $model->deleteById($id);
            if($status){
                $this->addSuccessMessage('Delete customer successfully.');
            }else{
                $this->addErrorMessage('You can not delete this customer because the order has that');
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=customer');
    }

    /**
     * Logout
     */
    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['fullname']);
        $this->redirect('?url=Home');
    }
}