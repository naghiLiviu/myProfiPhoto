<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 1/4/16
 * Time: 10:29 AM
 */

namespace myProfiPhoto\Model;


class Social
{

    public $socialId;
    public $photoId;
    public $like;
    public $comment;

    public function exchangeArray($data)
    {
        $this->socialId = (!empty($data['socialId'])) ? $data['socialId'] : null;
        $this->photoId  = (!empty($data['photoId'])) ? $data['photoId'] : null;
        $this->like     = (!empty($data['like'])) ? $data['like'] : null;
        $this->comment  = (!empty($data['comment'])) ? $data['comment'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}