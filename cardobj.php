<?php

class card
{
    public $value = "";
    public $posCarte1 = "";
    public $posCarte2 = "";
    public $statusCarte1 = 0;
    public $statusCarte2 = 0;


    public function setCard()
    // Définit l'emplacement de la paire de carte
    {
        if ($this->value == "") {
            if (isset($_SESSION["cardValue"])) {
                $this->value = $_SESSION["cardValue"][0];
                array_splice($_SESSION["cardValue"], 0, 1);
            }
        }
        if ($this->posCarte1 == "") {
            if (isset($_SESSION["arrayCard"])) {
                $this->posCarte1 = $_SESSION["arrayCard"][0];
                array_splice($_SESSION["arrayCard"], 0, 1);
            }
        }
        if ($this->posCarte2 == "") {
            if (isset($_SESSION["arrayCard"])) {
                $this->posCarte2 = $_SESSION["arrayCard"][0];
                array_splice($_SESSION["arrayCard"], 0, 1);
            }
        }
    }

    public function updateCard()
    {
        if (isset($_SESSION["flippedCard"])) {
            $i = 0;
            while ($i < count($_SESSION["flippedCard"])) {
                if ($this->posCarte1 == $_SESSION["flippedCard"][$i]) {
                    echo "Match!";
                }
            }
        }
    }

    public function showCard()
    // Affiche les cartes
    {
        echo "<input type='submit' value='$this->value' name='$this->posCarte1' class='carte$this->posCarte1'>";
        echo "<input type='submit' value='$this->value' name='$this->posCarte2' class='carte$this->posCarte2'>";
    }

}
