<?php

require_once "../classes/Preferencia.php";
require_once "../classes/Caracteristica.php";
require_once "../classes/Testemunho.php";

header('Content-Type: application/json');


$preferencias = Preferencia::get();


$caracteristicas = Caracteristica::get();


$testemunhos = Testemunho::get();


echo json_encode([
    "preferencias" => $preferencias,
    "caracteristicas" => $caracteristicas,
    "testemunhos" => $testemunhos
]);