<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/26/15
 * Time: 10:11 AM
 */

namespace myProfiPhoto\Model;


class ContactDetail
{

    public $contactDetailId;
    public $userId;
    public $firstName;
    public $lastName;
    public $birthDate;
    public $gender;

    public function exchangeArray($data)
    {
        $this->contactDetailId = (!empty($data['contactDetailId'])) ? $data['contactDetailId'] : null;
        $this->userId          = (!empty($data['userId'])) ? $data['userId'] : null;
        $this->firstName       = (!empty($data['firstName'])) ? $data['firstName'] : null;
        $this->lastName        = (!empty($data['lastName'])) ? $data['lastName'] : null;
        $this->birthDate       = (!empty($data['birthDate'])) ? $data['birthDate'] : null;
        $this->gender          = (!empty($data['gender'])) ? $data['gender'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}