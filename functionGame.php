<?php

class game
{

    public $player;
    public $cardNbr;
    public $gameArray;
    public $gameState;

    function gameStart()
    {
        if (isset($_SESSION["user"]) && isset($_POST["difficulty"])) {
            $this->player = $_SESSION["user"]["name"];
            $this->cardNbr = $_POST["difficulty"];
            $this->gameState = true;
        } else {
            $this->gameState = false;
        }
    }

    function randArray()
    {
        // if ($this->gameState == true) {
        if ($this->gameArray === null) {
            $this->cardNbr = 24;
            $limit = $this->cardNbr / 2;
            $array = range(1, ($limit));
            shuffle($array);
            $gArray[] = $array;
            $this->gameArray = $gArray;
            $_SESSION["game"]["gameArray"] = $this->gameArray;
            return $_SESSION["game"]["gameArray"];
        } else {
            return false;
        }
        // }
    }

    function gameBoard()
    {
        if ($this->gameState == true && !empty($this->gameArray)) {
            $_SESSION["gameArray"] = $this->gameArray;
        }
    }
}
