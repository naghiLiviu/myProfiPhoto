<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/26/15
 * Time: 10:24 AM
 */

namespace myProfiPhoto\Model;

use Zend\Db\TableGateway\TableGateway;

class TopicTable
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

}