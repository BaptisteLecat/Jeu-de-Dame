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

require("../view/board.php");
