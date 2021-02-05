<?php

namespace App\Model\Entity;

use Exception;
use App\Model\Entity\Pawn;
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

    public function initParty()
    {
        try {
            $this->loadBox();
            $this->loadPawn_Player1();
            $this->loadPawn_Player2();
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors du lancement de la partie");
        }
    }

    private function loadPawn_Player1()
    {
        $pawnIndex = 1;
        for ($case = 100; $case >= 70; $case = $case - 10) { //Parcourir 4 lignes et commencer en bas a gdroite
            for ($nbrep = 10; $nbrep > 0; $nbrep--) { // permet de faire 10 rep
                $boxIndex = $case - $nbrep; //Permet de revenir vers la colonne origine de la ligne.
                $line = $case / 10; //Permet de connaitre la ligne. Pour alterner entre pair et impair
                if ($line % 2 == 0) {
                    if ($boxIndex % 2 == 0) {
                        $pawn = new Pawn($pawnIndex, $this->list_Player[0], $this->list_Box[$boxIndex]);
                        $pawnIndex++;
                    }
                } else {
                    if ($boxIndex % 2 == 1) {
                        $pawn = new Pawn($pawnIndex, $this->list_Player[0], $this->list_Box[$boxIndex]);
                        $pawnIndex++;
                    }
                }
            }
        }
    }

    private function loadPawn_Player2()
    {
        $pawnIndex = 21;
        for ($case = 0; $case <= 30; $case = $case + 10) { //Parcourir 4 lignes et commencer en haut a gauche
            for ($nbrep = 10; $nbrep > 0; $nbrep--) { // permet de faire 10 rep
                $boxIndex = $case + $nbrep; //Permet de revenir vers la colonne origine de la ligne.
                $line = $case / 10; //Permet de connaitre la ligne. Pour alterner entre pair et impair
                if ($line % 2 == 0) {
                    if ($boxIndex % 2 == 0) {
                        $pawn = new Pawn($pawnIndex, $this->list_Player[1], $this->list_Box[$boxIndex - 1]);
                        $pawnIndex++;
                    }
                } else {
                    if ($boxIndex % 2 == 1) {
                        $pawn = new Pawn($pawnIndex, $this->list_Player[1], $this->list_Box[$boxIndex - 1]);
                        $pawnIndex++;
                    }
                }
            }
        }
    }

    private function loadBox()
    {
        $incrementBox = 0;
        for ($x = 0; $x < 10; $x++) {

            for ($y = 0; $y < 10; $y++) {
                $incrementBox++;
                if ($x % 2 == 0) {
                    if ($y % 2 == 0) {
                        $box = new Box($incrementBox, $x, $y, 0, $this);
                    } else {
                        $box = new Box($incrementBox, $x, $y, 1, $this);
                    }
                } else {
                    if ($y % 2 == 0) {
                        $box = new Box($incrementBox, $x, $y, 1, $this);
                    } else {
                        $box = new Box($incrementBox, $x, $y, 0, $this);
                    }
                }
            }
        }
    }
}
