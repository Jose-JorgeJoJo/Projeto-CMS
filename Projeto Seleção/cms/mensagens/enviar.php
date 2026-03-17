<?php

//echo "CHEGOU NO PHP";
//exit;

require_once __DIR__ . "/../classes/Database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    if (empty($nome) || empty($email) || empty($mensagem)) {
        die("Preencha os campos obrigatórios.");
    }

    try {

        $conn = Database::getConnection();

        $sql = "INSERT INTO mensagens (nome, email, telefone, mensagem)
                VALUES (:nome, :email, :telefone, :mensagem)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':mensagem' => $mensagem
        ]);

        // REDIRECIONA DE VOLTA PRA LANDING
        header("Location: ../../layout/index.html?sucesso=1");
        exit;

    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}