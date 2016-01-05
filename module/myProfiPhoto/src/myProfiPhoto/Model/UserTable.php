<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/22/15
 * Time: 10:52 AM
 */

namespace myProfiPhoto\Model;

use Zend\Db\TableGateway\TableGateway;

class UserTable
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getUser($userId)
    {
        $userId  = (int) $userId;
        $rowset = $this->tableGateway->select(array('UserId' => $userId));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $userId");
        }
        return $row;
    }

    public function verifyUser($username, $email)
    {
        $rowset = $this->tableGateway->select(array('UserName' => $username, 'Email' => $email));
        $row = $rowset->current();
        if ($row) {
            return false;
        } else {
            return true;
        }
    }

    public function registerUser($username, $password, $email)
    {
        $data = array(
            'UserName'   => $username,
            'Password'   => md5($password),
            'Email'      => $email,
            'RoleId'     => '3',
            'UserStatus' => 'Active',
        );
            $this->tableGateway->insert($data);
    }

    public function login($username, $password)
    {
        $rowset = $this->tableGateway->select(array('UserName' => $username, 'Password' => $password));
        $row = $rowset->current();
        $message = '';
        if (!$row) {
            $message = 'Cannot find the username in the database';
        } else {
            $message = 'You logged in sucsessful';
        }
        return $message;
    }

}