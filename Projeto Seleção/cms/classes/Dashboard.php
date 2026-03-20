<?php

class Dashboard {
    public function show() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?class=Login");
            exit;
        }

        $html = file_get_contents('cms/html/dashboard.html');
        echo str_replace('{usuario}', $_SESSION['usuario']['login'], $html);
    }
}