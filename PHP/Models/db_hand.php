<?php
class dbHand {
    private $hostname, $username, $password, $tablename;
    private $MySQL;

    public function __construct(){
        $this->MySQL = $this->init();
    }

    private function init(){
        $str = file_get_contents("config.json", true); //Krijg gegevens van config.json file
        $json = json_decode($str, true); // zet JSON om in een PHP-array
        //Test de functie:
        //echo '<pre>' . print_r($json, true) . '</pre>';

        return new mysqli($json['Database']['hostname'], $json['Database']['username'], $json['Database']['password'], $json['Database']['table']);
    }

    public function getAllHands(){
        //Hand model inladen
        require_once ('hand.php');
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
        require_once ('hand.php');
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
        require_once ('hand.php');
        $query = "SELECT * FROM 'hands' WHERE id = ".mysqli_escape_string($id);
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


        $this->MySQL->close();
    }
}