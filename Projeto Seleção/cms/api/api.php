<?php

require_once "../classes/Preferencia.php";

header('Content-Type: application/json');

$dados = Preferencia::get();

echo json_encode($dados);