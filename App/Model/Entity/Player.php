<?php

namespace App\Model\Entity;

use JsonSerializable;
use Exception;

class Player implements JsonSerializable
{
    private $name;
    private $score;
    private $turn;
    private $boardObject;
    private $list_Pawn;

    public function __construct($name, $boardObject)
    {
        $this->name = $name;
        $this->score = 0;
        $this->turn = null;
        $this->boardObject = $boardObject;

        $this->boardObject->addPlayer($this);

        $this->list_Pawn = array();
    }

    public function jsonSerialize()
    {
        return array(
            "name" => $this->name,
            "score" => $this->score,
            "turn" => $this->getTurn(),
            "boardObject" => $this->boardObject->jsonSerialize(),
            "list_Pawn" => $this->getListPawnSerialize()
        );
    }

    private function getListPawnSerialize()
    {
        $listPawnSerialize = array();

        foreach ($this->list_Pawn as $pawn) {
            array_push($listPawnSerialize, $pawn->jsonSerialize());
        }

        return $listPawnSerialize;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getList_Pawn()
    {
        return $this->list_Pawn;
    }

    public function getBoardObject()
    {
        return $this->boardObject;
    }

    public function getTurn()
    {
        return $this->turn;
    }

    public function addScore()
    {
        $this->score++;
    }

    public function manageTurn($turn = null)
    {
        if ($turn !== null) {
            if (gettype($turn) == "boolean") {
                $this->turn = $turn;
            } else {
                throw new Exception("Le type passé en paramètre n'est pas un boolean");
            }
        } else {
            if ($this->turn) {
                $this->turn = false;
            } else {
                $this->turn = true;
            }
        }
    }

    public function addPawn($pawnObject)
    {
        if (count($this->list_Pawn) < 20) {
            array_push($this->list_Pawn, $pawnObject);
        }
    }
}
