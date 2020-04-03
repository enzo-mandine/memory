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

    public function showCard()
    // Affiche les cartes
    {
        echo "<input type='submit' value=$this->posCarte1 name=$this->value.A>";
        echo "<input type='submit' value=$this->posCarte2 name=$this->value.B>";
        return true;
    }
}

