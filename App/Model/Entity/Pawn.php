<?php

Class Pawn implements JsonSerializable{

    private $id;
    private $isQueens;
    private $playerobject;
    private $boxobject;

    public function __construct( $id, $playerobject, $boxobject){
        $this->id = $id;
        $this->playerobject = $playerobject;
        $this->boxobject = $boxobject;
    }

    public function jsonSerialize()
    {
        return array(
            "id" => $this->id,
            "isQueens" => $this->isqueens,
            "playerobject" => $this->playerobject,
            "boxobject" => $this->boxobject->jsonSerialize()

        );

    }

    public function getId(){
        return $this->id;
    }

    public function getIsQueens(){
        return $this->isQueens;
    }

    public function getPlayerObject(){
        return $this->teamobject;
    }

    public function getBoxObject(){
        return $this->boxobject;
    }

    public function setIsQueens(){

    }

    public function setPlayerObject(){

    }

    public function setBoxObject(){

    }
}