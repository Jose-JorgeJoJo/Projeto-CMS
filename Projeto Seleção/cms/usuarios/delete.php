<?php

require_once "../classes/Usuario.php";

$id = $_GET['id'];

if($id == 1){
    return false; // Melhorar essa parte
}

Usuario::delete($id);

header("Location: list.php");
exit;