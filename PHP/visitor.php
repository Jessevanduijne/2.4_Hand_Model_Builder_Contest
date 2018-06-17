<?php
/**
 * Created by PhpStorm.
 * User: mgeer
 * Date: 16-6-2018
 * Time: 12:41
 */

class visitor
{
    private $id, $uid;

    public function __construct($id, $uid)
    {
        $this->id=$id;
        $this->uid=$uid;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getUid()
    {
        return $this->uid;
    }
}