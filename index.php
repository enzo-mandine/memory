<?php

$game = array(
    "carte1" => 1,
    "carte2" => 1,
    "carte3" => 2,
    "carte4" => 2,
    "carte5" => 3,
    "carte6" => 3,
);
array_rand($game,2);
var_dump($game);

?>