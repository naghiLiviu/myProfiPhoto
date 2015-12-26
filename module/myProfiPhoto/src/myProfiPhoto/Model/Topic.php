<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/26/15
 * Time: 10:21 AM
 */

namespace myProfiPhoto\Model;


class Topic
{

    public $topicId;
    public $topicName;
    public $topicStatus;

    public function exchangeArray($data)
    {
        $this->topicId     = (!empty($data['topicId'])) ? $data['topicId'] : null;
        $this->topicName   = (!empty($data['topicName'])) ? $data['topicName'] : null;
        $this->topicStatus = (!empty($data['topicStatus'])) ? $data['topicStatus'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}