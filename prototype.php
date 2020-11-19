<?php

class Prototype
{
    public $primitive;
    public $component;

    public function __clone()/*Se necesita por dateTime*/
    {
    	
        $this->component = clone $this->component;
    }
}

/**
 * The client code.
 */
function clientCode()
{
    $p1 = new Prototype;
    $p1->primitive = 1234;
    $p1->component = new \DateTime;

    $p2 = clone $p1;
    if ($p1->primitive === $p2->primitive) {
        echo "Número ha sido clonado: ";
        print $p2->primitive;
    } else {
        echo "Número no clonado <br>";
    }
    if ($p1->component === $p2->component) {
        echo "Fecha no clonada <br>";
    } else {
        echo "<br>Fecha ha sido clonada <br>";
        echo $p2->component->format('Y-m-d H:i:s');
    }
}

clientCode();
?>

página: 
https://www.w3schools.com/php/phptryit.asp?filename=tryphp_compiler