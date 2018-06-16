<?php
require_once "db.php";


class dbHand extends db{
    private $hostname, $username, $password, $tablename;
    private $MySQL;
    private $db;

    public function __construct(){
        $db = new db();
        $this->MySQL = $db->returnMySQL();
    }

    public function getAllHands(){
        //Hand model inladen
        require_once('./Models/hand.php');
        $hands = array();

        //Query klaarzetten
        $query = "SELECT * from hands";
        //Query gebruiken
        $result = $this->MySQL->query($query);

        if ($result) {
            while ($row = $result->fetch_object()) {

                echo $row->naam;

                $hand = new hand($row->id, $row->handname, $row->naam, $row->email, $row->score, $row->image, $row->object, $row->date);
                array_push($hands, $hand);
            }
        }

        $this->MySQL->close();
        return $hands;
    }

    public function getLeaderBoard(){
        //Hand model inladen
        require_once('./Models/hand.php');
        $hands = array();

        //Query klaarzetten
        $query = "SELECT * FROM hands ORDER BY score DESC LIMIT 100";
        //Query gebruiken
        $result = $this->MySQL->query($query);

        if($result) {
            while ($row = $result->fetch_object()) {
                $hand = new hand($row->id, $row->handname, $row->naam, $row->email, $row->score, $row->image, $row->object, $row->date);
                array_push($hands, $hand);
            }
        }
        $this->MySQL->close();
        return $hands;
    }

    public function getById($id){
        require_once('./Models/hand.php');
        $query = "SELECT * FROM hands WHERE id = ".$this->MySQL->real_escape_string($id);
        $hand = null;
        $result = $this->MySQL->query($query);

        if($result){
            while($row = $result->fetch_object()){
                $hand = new hand($row->id, $row->handname, $row->naam, $row->email, $row->score, $row->image, $row->object, $row->date);
            }
            $this->MySQL->close();
            return $hand;
        }
        else{
            $this->MySQL->close();
            return null;
        }
    }

    public function addScore($id){
        $query = "UPDATE hands SET score = score + 1 WHERE id = ".$id;

        $this->MySQL->query($query);

        $this->MySQL->close();
    }
}