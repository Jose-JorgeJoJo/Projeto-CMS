<?php

session_start();

require_once "../classes/Usuario.php";

// 🔒 verifica se está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

// 🔒 verifica se é admin
if ($_SESSION['usuario']['id'] !== 1) {
    die("Acesso negado!");
}

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido");
}

// evita deletar o próprio admin principal
if ($id == 1) {
    die("Admin principal não pode ser removido");
}

Usuario::delete($id);

header("Location: list.php");
exit;