<?php

namespace App\Model\Entity;
use JsonSerializable;

class Board implements JsonSerializable
{
    private $list_Player;
    private $list_Box;

    public function __construct()
    {
        $this->list_Player = array();
        $this->list_Box = array();
    }

    public function jsonSerialize()
    {
        return array(
            "list_Player" => $this->getListPlayerSerialize(),
            "list_Box" => $this->getListBoxSerialize()
        );
    }

    private function getListPlayerSerialize()
    {
        $listPlayerSerialize = array();

        foreach ($this->list_Player as $player) {
            array_push($listPlayerSerialize, $player);
        }

        return $listPlayerSerialize;
    }

    private function getListBoxSerialize()
    {
        $listBoxSerialize = array();

        foreach ($this->list_Box as $box) {
            array_push($listBoxSerialize, $box);
        }

        return $listBoxSerialize;
    }

    public function getList_Player()
    {
        return $this->list_Player;
    }

    public function getList_Box()
    {
        return $this->list_Box;
    }

    public function addPlayer($player)
    {
        array_push($this->list_Player, $player);
    }

    public function addBox($box)
    {
        if (count($this->list_Box) < 100) {
            array_push($this->list_Box, $box);
        }
    }
}
