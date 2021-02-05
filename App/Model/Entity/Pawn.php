<?php

namespace App\Model\Entity;
use JsonSerializable;


Class Pawn implements JsonSerializable{

    //------Déclaration variables------\\
    private $id;
    private $isQueen;
    private $playerObject;
    private $boxObject;

    //------Constructor------\\
    public function __construct($id, $playerObject, $boxObject){
        $this->id = $id;
        $this->isQueen = false;
        $this->playerObject = $playerObject;
        $this->boxObject = $boxObject;

        $this->playerObject->addPawn($this);
        $this->boxObject->setPawnObject($this);
    }

    //------Déclaration en .json------\\
    public function jsonSerialize()
    {
        return array(
            "id" => $this->id,
            "isQueen" => $this->isQueen,
            "playerObject" => $this->playerObject,
            "boxObject" => $this->boxObject
        );

    }

    //------getter------\\
    public function getId(){
        return $this->id;
    }

    public function getIsQueens(){
        return $this->isQueens;
    }

    public function getPlayerObject(){
        return $this->playerObject;
    }

    public function getBoxObject(){
        return $this->boxObject;
    }

    //------setter------\\
    public function setAsQueen(){
        $this->isQueens = true;
    }

    public function setPlayerObject($playerObject){
        $this->playerObject = $playerObject;
    }

    public function setBoxObject($boxObject){
        $this->boxObject = $boxObject;
    }
}