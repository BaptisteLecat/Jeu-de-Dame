<?php 

class Player implements JsonSerializable
{
    private $name;
    private $score;
    private $turn;

    public function __construct($name) {
        $this->name = $name;
        $this->score = 0;
        $this->turn = null;
    }

    public function jsonSerialize()
    {
        return array(
            "name" => $this->name,
            "score" => $this->score,
            "turn" => $this->getTurn()
        );
    }

    public function getName()
    {
        return $this->name;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getTurn()
    {
        if($this->turn === null){
            throw new Exception("Le turn n'a pas été set");
            
        }else{    
            return $this->turn;
        }
    }

    public function addScore(){
        $this->score++;
    }

    public function manageTurn($turn = null)
    {
        if($turn !== null){
            if(gettype($turn) == "boolean"){
                $this->turn = $turn;
            }else{
                throw new Exception("Le type passé en paramètre n'est pas un boolean");
            }
        }else{
            $this->turn = ($turn == true) ? false : true;
        }
    }
}


?>