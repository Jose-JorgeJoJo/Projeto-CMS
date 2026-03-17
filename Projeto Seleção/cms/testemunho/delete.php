<?php

require_once "../classes/Testemunho.php";

$id = $_GET['id'];


Testemunho::delete($id);

header("Location: list.php");
exit;

