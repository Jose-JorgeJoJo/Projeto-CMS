<?php

require_once "../classes/Preferencia.php";
require_once "../classes/Caracteristica.php";
require_once "../classes/Testemunho.php";

header('Content-Type: application/json');

// 🔹 dados principais
$preferencias = Preferencia::get();

// 🔹 lista de características
$caracteristicas = Caracteristica::get();

// 🔹 lista de testemunhos
$testemunhos = Testemunho::get();

// 🔥 resposta final
echo json_encode([
    "preferencias" => $preferencias,
    "caracteristicas" => $caracteristicas,
    "testemunhos" => $testemunhos
]);