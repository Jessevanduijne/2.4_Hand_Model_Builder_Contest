<?php
class hand
{
    private $id, $naam, $email, $score, $image_ref, $gif_ref, $date;

    public function __construct($id, $naam, $email, $score, $image_ref, $gif_ref, $date)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->email = $email;
        $this->score = $score;
        $this->image_ref = $image_ref;
        $this->gif_ref = $gif_ref;
        $this->date = $date;
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
    public function getGifRef()
    {
        return $this->gif_ref;
    }
    public function getImageRef()
    {
        return $this->image_ref;
    }
    public function getScore(){
        return $this->score;
    }
}
