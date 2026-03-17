<?php

require_once "../classes/Caracteristicas.php";

$id = $_GET['id'];

Caracteristica::delete($id);

header("Location: list.php");
exit;