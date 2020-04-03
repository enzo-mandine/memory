<?php

class card
{
    public $value = "";
    public $posCarte1 = "";
    public $statusCarte1 = 0;


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
    }

    public function updateStatus()
    {
        if ($this->statusCarte1 == 0) {
            $this->statusCarte1 = 1;
        }
    }

    public function showCard()
    // Affiche les cartes
    {
        echo "<input type='submit' value='$this->value' name='$this->value' class='carte$this->posCarte1'>";
    }
}
