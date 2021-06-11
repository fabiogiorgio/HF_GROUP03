<?php

/**
 * Class Login
 */
class Login extends Controller
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->view('login', []);
    }

    /**
     * @return mixed
     */
    public function dangNhap()
    {
        $email = $_POST['email'] ?: '';
        $password = $_POST['password'] ?: '';

        $model = $this->model('CustomerModel');
        $exists = $model->checkEmail($email);

        if ($exists) {
            if ($email == 'admin@gmail.com') {
                if (password_verify($password, $exists['password'])) {
                    $_SESSION['id'] = 'admin';
                    return $this->redirect('?url=customer');
                } else {
                    $this->addErrorMessage('Email or password is incorrect.');
                    return $this->redirect('?url=login');
                }
            } else {
                if (password_verify($password, $exists['password'])) {
                    $_SESSION['id'] = $exists['id'];
                    $_SESSION['email'] = $exists['email'];
                    $_SESSION['fullname'] = $exists['fullname'];
                    return $this->redirect('?url=Home');
                } else {
                    $this->addErrorMessage('Email or password is incorrect.');
                    return $this->redirect('?url=login');
                }
            }
        } else {
            $this->addErrorMessage('Email or password is incorrect.');
            return $this->redirect('?url=login');
        }

        return $this->redirect('/');
    }

    /**
     * Logout
     */
    public function logout()
    {
        unset($_SESSION['id']);
        $this->redirect('?url=login');
    }
}