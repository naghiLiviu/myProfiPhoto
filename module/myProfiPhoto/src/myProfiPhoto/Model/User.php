<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/18/15
 * Time: 3:16 PM
 */
namespace myProfiPhoto\Model;

class User
{

    public $userId;
    public $username;
    public $password;
    public $email;
    public $roleId;
    public $userStatus;

    public function exchangeArray($data)
    {
        $this->userId     = (!empty($data['userId'])) ? $data['userId'] : null;
        $this->username   = (!empty($data['username'])) ? $data['username'] : null;
        $this->password   = (!empty($data['password'])) ? $data['password'] : null;
        $this->email      = (!empty($data['email'])) ? $data['email'] : null;
        $this->roleId     = (!empty($data['roleId'])) ? $data['roleId'] : null;
        $this->userStatus = (!empty($data['userStatus'])) ? $data['userStatus'] : null;

    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}