<?php

/**
 * Class ticket
 */
class ticket extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['id']) && $_SESSION['id'] != 'admin') {
            $this->redirect('?url=login');
        }
    }

    /**
     * Ticket list view.
     */
    public function execute()
    {
        $this->view('admin',
            [
                'page'          => 'ticket',
                'title'         => 'Manager ticket',
                'tickets'       => $this->getList()
            ]
        );
    }

    /**
     * Edit ticket form.
     * @param null $id
     */
    public function edit($id = null)
    {
        $data = [];

        if ($id) {
            $data = $this->getById($id);
        }

        $this->view('admin',
            [
                'page'          => 'ticket-edit',
                'title'         => 'Add/Update ticket',
                'ticket'        => $data
            ]
        );
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $id   = $_POST['id'] ?: null;
        $post = $_POST;

        try {
            if (strtotime($post['from']) > strtotime($post['to'])) {
                $this->addErrorMessage('The end date must be greater than the start date.');
                return $this->redirect('?url=ticket');
            }
            $imageUploader = $this->model('ImageUploader');

            $model = $this->model('TicketModel');
            if ($id) {
                if (!empty($_FILES['image']['tmp_name'])) {
                    $image = $this->getById($id)['image'];
                    $fileName = $imageUploader->uploadImage();
                    $_FILES['image']['name'] = $fileName;
                }
                $info = $model->update($id, $post);

                if ($info) {
                    $this->addSuccessMessage('You saved the ticket.');
                } else {
                    $this->addErrorMessage('Something went wrong while saving the ticket.');
                }
            } else {
                $fileName = $imageUploader->uploadImage();
                $_FILES['image']['name'] = $fileName;
                $ticketId = $model->insert($post);
                if ($ticketId) {
                    $this->addSuccessMessage('You saved the ticket.');
                } else {
                    $this->addErrorMessage('Something went wrong while saving the ticket.');
                }
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=ticket');
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $model = $this->model('TicketModel');
        return $model->getList();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $model = $this->model('TicketModel');
        return $model->getById($id);
    }

    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Page not found');
            return $this->redirect('?url=ticket');
        }

        try {
            $model = $this->model('TicketModel');
            $status = $model->deleteById($id);
            if($status){
                $this->addSuccessMessage('Delete ticket successfully.');
            }else{
                $this->addErrorMessage('This ticket has been ordered by a customer.');
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=ticket');
    }
}