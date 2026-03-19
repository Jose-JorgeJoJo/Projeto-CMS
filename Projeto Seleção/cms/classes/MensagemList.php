<?php

class MensagemList {
    private $html;

    public function __construct() {
        $this->html = file_get_contents('cms/html/mensagenslist.html');
    }

    public function show() {
        $mensagens = Mensagem::all();
        $linhas = "";

        foreach ($mensagens as $m) {
            $data = date("d/m/Y H:i", strtotime($m['data']));
            $linhas .= "<tr>";
            $linhas .= "<td>{$m['id']}</td>";
            $linhas .= "<td>" . htmlspecialchars($m['nome']) . "</td>";
            $linhas .= "<td>" . htmlspecialchars($m['email']) . "</td>";
            $linhas .= "<td>" . htmlspecialchars($m['telefone']) . "</td>";
            $linhas .= "<td>" . nl2br(htmlspecialchars($m['mensagem'])) . "</td>";
            $linhas .= "<td>{$data}</td>";
            $linhas .= "</tr>";
        }

        echo str_replace('{tabela}', $linhas, $this->html);
    }
}