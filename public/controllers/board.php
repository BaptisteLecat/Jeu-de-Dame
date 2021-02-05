<?php

use App\Model\Entity\Board;
use App\Model\Entity\Box;
use App\Model\Entity\Pawn;
use App\Model\Entity\Player;

require("../../vendor/autoload.php");

$board = new Board();

$player1 = new Player("Scraven", $board);
$player2 = new Player("Baptiste", $board);

$incrementBox = 0;
$incrementPawn = 0;

for ($x = 0; $x < 10; $x++) {

    for ($y = 0; $y < 10; $y++) {
        $incrementBox++;
        if ($x % 2 == 0) {
            if ($y % 2 == 0) { 
                $box = new Box($incrementBox, $x, $y, 0, $board);
            } else {
                $box = new Box($incrementBox, $x, $y, 1, $board);
            }

        } else {
            if ($y % 2 == 0) {
                $box = new Box($incrementBox, $x, $y, 1, $board);
            } else {
                $box = new Box($incrementBox, $x, $y, 0, $board);
            }
        }
    }
}




require("../../view/board.php");
