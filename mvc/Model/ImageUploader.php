<?php

/**
 * Class ImageUploader
 */
class ImageUploader
{
    const UPLOAD_FOLDER = '/event-ticket/public/images/';

    /**
     * Upload image to server.
     */
    public function uploadImage()
    {
        $fileName = date('Y_m_d_H_i_s') . $_FILES["image"]['name'];
        $isUploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $this->getFolder() . $fileName);
        if (!$isUploaded) {
            $fileName = '';
        }
        return $fileName;
    }

    /**
     * @return string
     */
    public function getFolder()
    {
        return realpath($_SERVER["DOCUMENT_ROOT"]) . self::UPLOAD_FOLDER;
    }
}