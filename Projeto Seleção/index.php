<?php
session_start();

spl_autoload_register(function($class){
    $caminhos = [
        "cms/classes/{$class}.php",
        "{$class}.php"
    ];
    
    foreach ($caminhos as $caminho) {
        if (file_exists($caminho)) {
            require_once $caminho;
            break;
        }
    }
});

$classe = $_GET['class'] ?? 'Login'; 
$metodo = $_GET['method'] ?? 'show';      

if (!isset($_SESSION['usuario']) && $classe !== 'Login') {
    header("Location: index.php?class=Login");
    exit;
}

if (class_exists($classe)) {
    $pagina = new $classe();
    
    if ($metodo !== 'show' && method_exists($pagina, $metodo)) {
        $pagina->$metodo($_REQUEST);
    }
    
    if (isset($_SESSION['usuario']) && $classe !== 'Login') {
        if (file_exists('cms/html/header.html')) {
            include 'cms/html/header.html';
        }
    }
    
    $pagina->show();

} else {
    echo "Erro: A página '$classe' não existe.";
}