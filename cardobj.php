<?php

class card
{
    public $objName = "";
    public $value = "";
    public $statusCarte1 = 0;
    public $background = "";

    public function getName($name)
    {
        $this->objName = $name;
    }

    public function showName()
    {
        return $this->objName;
    }


    public function setCard()
    // Définit la valeure de la carte
    {
        if ($this->value == "") {
            if (isset($_SESSION["cardValue"])) {
                $this->value = $_SESSION["cardValue"][0];
                array_splice($_SESSION["cardValue"], 0, 1);
            }
        }

        if ($this->background == "") {
            if (isset($_SESSION["randBg"])) {
                $this->background = $_SESSION["randBg"][0];
                array_splice($_SESSION["randBg"], 0, 1);
            }
        }
    }

    public function getStatus()
    {
        echo $this->statusCarte1;
        return;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function changeStatusTo0()
    {
        $this->statusCarte1 = 0;
        return true;
    }
    public function changeStatusTo1()
    {
        $this->statusCarte1 = 1;
        return true;
    }

    public function showCard()
    {
        if ($this->statusCarte1 == 0) {
            echo "<input class='cardback' type='submit' style='background-image: url(src/cardback.gif)' value='' name='$this->objName'>";
        }
        if ($this->statusCarte1 == 1) {
            echo "<div class='cardfront' style='background-image: url(src/card/$this->background.png)' name='$this->objName'></div>";
        }
    }
}
