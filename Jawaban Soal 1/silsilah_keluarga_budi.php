<?php

class Node
{
    public $name;
    public $children;

    public function __construct($name)
    {
        $this->name = $name;
        $this->children = array();
    }

    public function addChild($child)
    {
        array_push($this->children, $child);
    }
}

$budi = new Node("Budi");
$dedi = new Node("Dedi");
$dodi = new Node("Dodi");
$dede = new Node("Dede");
$dewi = new Node("Dewi");
$feri = new Node("Feri");
$farah = new Node("Farah");
$gugus = new Node("Gugus");
$gandi = new Node("Gandi");
$hani = new Node("Hani");
$hana = new Node("Hana");

$budi->addChild($dedi);
$budi->addChild($dodi);
$budi->addChild($dede);
$budi->addChild($dewi);

$dedi->addChild($feri);
$dedi->addChild($farah);
$dodi->addChild($gugus);
$dodi->addChild($gandi);
$dede->addChild($hani);
$dede->addChild($hana);

function printNode($node, $level)
{
    echo str_repeat("-----", $level) . $node->name . "<br>";

    foreach ($node->children as $child) {
        printNode($child, $level + 1);
    }
}

printNode($budi, 0);

?>