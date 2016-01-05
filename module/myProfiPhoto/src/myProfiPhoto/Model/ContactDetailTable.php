<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/26/15
 * Time: 10:15 AM
 */

namespace myProfiPhoto\Model;

use Zend\Db\TableGateway\TableGateway;

class ContactDetailTable
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

    public function insertUserDetail($firstName, $lastName,$birth, $gender, $userId)
    {
        $data = array(
            'FirstName' => $firstName,
            'LastName' => $lastName,
            'BirthDate' => $birth,
            'Gender' => $gender,
            'UserId' => $userId,
        );
        $this->tableGateway->insert($data);
    }

}