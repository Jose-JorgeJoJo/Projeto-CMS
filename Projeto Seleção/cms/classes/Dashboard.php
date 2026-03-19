<?php

class Dashboard {
    public function show() {
       
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?class=Login");
            exit;
        }

        $usuario = $_SESSION['usuario'];

        echo "<h1>Dashboard</h1>";
        echo "<p>Bem-vindo, " . $usuario . "!</p>";

        
        echo '<a href="index.php?class=UsuarioList"><button>Usuários</button></a><br><br>';
        echo '<a href="index.php?class=PreferenciaForm"><button>Preferências</button></a><br><br>';
        echo '<a href="index.php?class=CaracteristicaList"><button>Características</button></a><br><br>';
        echo '<a href="index.php?class=TestemunhoList"><button>Testemunhos</button></a><br><br>';
        echo '<a href="index.php?class=MensagemList"><button>Mensagens</button></a><br><br>';

        echo '<br><a href="index.php?class=Login&method=logout">Sair</a>';
    }
}