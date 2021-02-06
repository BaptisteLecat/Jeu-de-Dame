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

    public function whereToMove()
    {
        $list_boxId = array();

        foreach ($this->playerObject->getBoardObject()->getList_Box() as $index => $box) {
            //Test des diagonales au dessus du pion
            if($box->getPosY() == $this->boxObject->getPosY() + 1){
                if($box->getPosX() == $this->boxObject->getPosX() - 1 || $box->getPosX() == $this->boxObject->getPosX() + 1){
                    if($box->setIsPlayable()){
                        array_push($list_boxId, $box->getId());
                    }
                }
            }

            //Test des diagonales au dessous du pion
            if ($box->getPosY() == $this->boxObject->getPosY() - 1) {
                if ($box->getPosX() == $this->boxObject->getPosX() - 1 || $box->getPosX() == $this->boxObject->getPosX() + 1) {
                    if ($box->setIsPlayable()) {
                        array_push($list_boxId, $box->getId());
                    }
                }
            }
        }

        return $list_boxId;
    }
}