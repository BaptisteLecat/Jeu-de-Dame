<?php

Class Pawn implements JsonSerializable{

    private $id;
    private $isQueens;
    private $playerobject;
    private $boxobject;

    //------Constructor------//
    public function __construct( $id, $playerobject, $boxobject){
        $this->id = $id;
        $this->playerobject = $playerobject;
        $this->boxobject = $boxobject;
    }

    //------fonction json------//
    public function jsonSerialize()
    {
        return array(
            "id" => $this->id,
            "isQueens" => $this->isqueens,
            "playerobject" => $this->playerobject,
            "boxobject" => $this->boxobject->jsonSerialize()

        );

    }

    //------getter------//
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

    //------setter------//
    public function addIsQueens($aqueen){
        $this->isqueens = $aqueen;
    }

    public function setPlayerObject($player){
        $this->playerobject = $player;
    }

    public function setBoxObject($boxobject){
        $this->boxobject = $boxobject;
    }
}