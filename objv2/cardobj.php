<?php

class card
{
    public $value = "";
    public $statusCarte1 = 0;
    // StatusCarte1 : 
    // 0 = Dos de carte
    // 1 = Carte visible
    // 2 = Paire fausse
    // 3 = Paire validée

    public function status()
    {
        switch ($i) {
            case 0:
                echo "coucou";
                break;
            case 1:
                echo "coucou";
                break;
            case 2:
                echo "coucou";
                break;
            case 3:
                echo "coucou";
                break;
        }
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
    }

    public function getValue()
    {
        return $this->value;
    }

    public function updateStatus()
    {
    }

    public function showCard()
    // Affiche les cartes
    {
        echo "<input type='submit' value='$this->value' name='$this->value'>";
    }
}
