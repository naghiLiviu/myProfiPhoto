<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/26/15
 * Time: 10:46 AM
 */

namespace myProfiPhoto\Model;


class Photo
{

    public $photoId;
    public $userId;
    public $topicId;
    public $path;
    public $description;
    public $date;
    public $cameraUsed;
    public $photoStatus;

    public function exchangeArray($data)
    {
        $this->photoId     = (!empty($data['photoId'])) ? $data['photoId'] : null;
        $this->userId      = (!empty($data['userId'])) ? $data['userId'] : null;
        $this->topicId     = (!empty($data['topicId'])) ? $data['topicId'] : null;
        $this->path        = (!empty($data['path'])) ? $data['path'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
        $this->date        = (!empty($data['date'])) ? $data['date'] : null;
        $this->cameraUsed  = (!empty($data['cameraUsed'])) ? $data['cameraUsed'] : null;
        $this->photoStatus = (!empty($data['photoStatus'])) ? $data['photoStatus'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}