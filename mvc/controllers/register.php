<?php

/**
 * Class register
 */
class register extends Controller
{
    /**
     * Register view.
     */
    public function execute()
    {
        $this->view('register', []);
    }

    public function post()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repass = $_POST['repassword'];
        $fullname = $_POST['fullname'];

        if ($password != $repass) {
            $this->addErrorMessage('The re-entered password is incorrect.');
            return $this->redirect('?url=register');
        }

        $model = $this->model('CustomerModel');
        $mailExists = $model->checkEmail($email);
        if ($mailExists) {
            $this->addErrorMessage('Email already exists.');
            return $this->redirect('?url=register');
        }

        $model->insert($fullname, $email, $password);
        $this->addSuccessMessage('Register successfully');
        return $this->redirect('?url=login');
    }
}