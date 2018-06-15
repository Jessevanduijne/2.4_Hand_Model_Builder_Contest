<?php
class hand
{
    private $id, $handname, $naam, $email, $score, $image_ref, $object, $date;

    public function __construct($id, $handname, $naam, $email, $score, $image_ref, $object, $date)
    {
        $this->id = $id;
        $this->handname = $handname;
        $this->naam = $naam;
        $this->email = $email;
        $this->score = $score;
        $this->image_ref = $image_ref;
        $this->object = $object;
        $this->date = $date;
    }

    public function getHandname()
    {
        return $this->handname;
    }

    public function getNaam(){
        return $this->naam;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function getObject()
    {
        return $this->object;
    }
    public function getImageRef()
    {
        return $this->image_ref;
    }
    public function getScore(){
        return $this->score;
    }
}
