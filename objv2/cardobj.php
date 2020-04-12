<?php

class card
{
    public $objName = "";
    public $value = "";
    public $statusCarte1 = 0;

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

    public function changeStatusTo0() {
        $this->statusCarte1 = 0;
        return true;
    }
    public function changeStatusTo1() {
        $this->statusCarte1 = 1;
        return false;
    }
    public function changeStatusTo2() {
        $this->statusCarte1 = 2;
        return true;
    }
    public function changeStatusTo3() {
        $this->statusCarte1 = 3;
        return true;
    }

    public function showCard()
    // Affiche les cartes en fonction de $this->statusCarte1
    {
        if ($this->statusCarte1 == 0) {
            echo "<input type='submit' value='$this->value' name='$this->objName'>dos";
            
        }
        if ($this->statusCarte1 == 1) {
            echo "<input type='submit' value='$this->value' name='$this->objName'>seule";
            
        }
        if ($this->statusCarte1 == 2) {
            echo "<input type='submit' value='$this->value' name='$this->objName'>faux";
            
        }
        if ($this->statusCarte1 == 3) {
            echo  "<input type='submit' value='$this->value' name='$this->objName'>GG";
            
        }
    }
}
