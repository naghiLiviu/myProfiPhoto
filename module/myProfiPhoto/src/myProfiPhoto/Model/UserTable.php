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

    public function registerUser(User $user)
    {
        $data = array(
            'UserName'   => $user->username,
            'Password'   => $user->password,
            'Email'      => $user->email,
            'RoleId'     => $user->roleId,
            'UserStatus' => $user->userStatus,
        );

        $id = (int) $user->userId;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            throw new \Exception('The data are already in database!');
        }
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