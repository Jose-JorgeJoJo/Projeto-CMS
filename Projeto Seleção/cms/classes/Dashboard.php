<?php

class Dashboard {
    public function show() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?class=Login");
            exit;
        }

        // 1. Puxa todas as mensagens usando sua classe Mensagem
        $todasMensagens = Mensagem::all();
        
        // 2. Verifica se a lista não está vazia
        if (!empty($todasMensagens)) {
            $ultima = $todasMensagens[0]; // Como está ordenado por DESC, a [0] é a última
            $nome = htmlspecialchars($ultima['nome']);
            $texto = nl2br(htmlspecialchars($ultima['mensagem']));
            $data = date("d/m/Y H:i", strtotime($ultima['data']));

            $conteudo = "<strong>De:</strong> {$nome} <small>({$data})</small><br>";
            $conteudo .= "<p style='margin-top:10px; color: #475569;'>\"" . substr($texto, 0, 150) . "...\"</p>";
        } else {
            // Caso não tenha nenhuma mensagem no banco
            $conteudo = "<p style='color: #94a3b8; font-style: italic;'>Não há novas mensagens no momento.</p>";
        }

        $html = file_get_contents('cms/html/dashboard.html');
        
        // 3. Faz as substituições
        $html = str_replace('{usuario}', $_SESSION['usuario']['login'], $html);
        $html = str_replace('{conteudo_dashboard}', $conteudo, $html);
        
        echo $html;
    }
}