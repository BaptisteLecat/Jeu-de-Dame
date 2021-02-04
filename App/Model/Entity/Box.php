<?php 

namespace App\Model\Entity;
use JsonSerializable;

class Box implements JsonSerializable
{
    private $id;
    private $posX;
    private $posY;
    private $boardObject;
    private $pawnObject;

    public function __construct($id, $posX, $posY, $boardObject, $pawnObject = null) {
        $this->id = $id;
        $this->posX = $posX;
        $this->posY = $posY;
        $this->boardObject = $boardObject;
        $this->pawnObject = $pawnObject;

        $this->boardObject->addBox($this);
    }

    public function jsonSerialize()
    {
        return array(
            "id" => $this->id,
            "posX" => $this->posX,
            "posY" => $this->posY,
            "boardObject" => $this->boardObject->jsonSerialize(),
            "pawnObject" => $this->pawnObject->jsonSerialize()
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPosX()
    {
        return $this->posX;
    }

    public function getPosY()
    {
        return $this->posY;
    }

    public function getBoardObject(){
        return $this->boardObject;
    }

    public function getPawnObject(){
        return $this->pawnObject;
    }
}
