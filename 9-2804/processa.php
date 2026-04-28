<?php

include 'TimeFutebol.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $n = $_POST['nome'];
    $f = $_POST['fundacao'];
    $e = $_POST['estadio'];
    $c = $_POST['corprincipal'];

    $timeFutebol = new TimeFutebol($n, $f, $e, $c);
    //TimeFutebol time = new TimeFutebol();
    $timeFutebol->imprimeAtributos();
}
