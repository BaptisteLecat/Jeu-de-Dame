<?php

use App\Model\Entity\Board;
use App\Model\Entity\Box;
use App\Model\Entity\Pawn;
use App\Model\Entity\Player;

require("../vendor/autoload.php");

$board = new Board();

$player1 = new Player("Scraven", $board);
$player2 = new Player("Baptiste", $board);

$board->initParty();
$_SESSION["boardObject"] = serialize($board);

var_dump($board->getList_Player()[0]->getList_Pawn()[18]->whereToMove());
var_dump($board->getList_Player()[0]->getList_Pawn()[18]->getBoxObject()->getId());


require("../view/board.php");
