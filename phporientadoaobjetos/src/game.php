<?php
session_start();

// Lista de imagens
$imagens = array(
    "imagem1.png",
    "imagem2.png",
    "imagem3.png",
    "imagem4.png",
    "imagem5.png",
    "imagem6.png"
);

// Embaralha a lista de imagens
shuffle($imagens);

// Define o número de linhas da tabela
$numLinhas = count($imagens) / 2;

// Verifica se a imagem foi clicada
if (isset($_POST["imagem"]) && isset($_POST["linha"]) && isset($_POST["coluna"])) {
    $linha = $_POST["linha"];
    $coluna = $_POST["coluna"];
    $imagem = $_POST["imagem"];
    $_SESSION["tabuleiro"][$linha][$coluna] = $imagem;
}

// Cria o tabuleiro
if (!isset($_SESSION["tabuleiro"])) {
    $_SESSION["tabuleiro"] = array();
    for ($i = 0; $i < $numLinhas; $i++) {
        $_SESSION["tabuleiro"][$i] = array();
        for ($j = 0; $j < 2; $j++) {
            $_SESSION["tabuleiro"][$i][$j] = null;
        }
    }
}

// Verifica se as imagens correspondem
function verificaImagens($tabuleiro, $linha1, $coluna1, $linha2, $coluna2) {
    $imagem1 = $tabuleiro[$linha1][$coluna1];
    $imagem2 = $tabuleiro[$linha2][$coluna2];
    if ($imagem1 == $imagem2) {
        return true;
    } else {
        return false;
    }
}

// Verifica se o jogo terminou
function verificaFimJogo($tabuleiro) {
    foreach ($tabuleiro as $linha) {
        foreach ($linha as $imagem) {
            if ($imagem == null) {
                return false;
            }
        }
    }
    return true;
}

// Mostra o tabuleiro
echo "<form method='post'>";
echo "<table>";
for ($i = 0; $i < $numLinhas; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 2; $j++) {
        echo "<td>";
        if ($_SESSION["tabuleiro"][$i][$j] == null) {
            echo "<input type='image' src='imagem.png' name='imagem' value='".$imagens[$i*2+$j]."' onClick='this.src=\"".$imagens[$i*2+$j]."\";submit();'>";
        } else {
            echo "<img src='".$_SESSION["tabuleiro"][$i][$j]."'>";
        }
        echo "<input type='hidden' name='linha' value='".$i."'>";
        echo "<input type='hidden' name='coluna' value='".$j."'>";
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</form>";

// Verifica se as imagens clicadas correspondem
if (isset($_POST["imagem1"]) && isset($_POST["linha1"]) && isset($_POST["coluna1"]) && isset($_POST["imagem2"]) && isset($_POST["linha2"]) && isset($_POST["coluna2"])) {
    $linha1 = $_POST["linha1"];
    $coluna1 = $_POST["coluna1"];
    $imagem1 = $_POST["imagem1"];
    $linha2 = $_POST["linha2"];
    $coluna2 = $_POST["coluna2"];
    $imagem2 = $_POST["imagem2"];
    if (verificaImagens($_SESSION["tabuleiro"], $linha1, $coluna1, $linha2, $coluna2)) {
        $_SESSION["tabuleiro"][$linha1][$coluna1] = $imagem1;
        $_SESSION["tabuleiro"][$linha2][$coluna2] = $imagem2;
    } else {
        $_SESSION["tabuleiro"][$linha1][$coluna1] = null;
        $_SESSION["tabuleiro"][$linha2][$coluna2] = null;
    }
}

// Verifica se o jogo terminou
if (verificaFimJogo($_SESSION["tabuleiro"])) {
    echo "<p>Jogo terminado!</p>";
    // Exibe a pontuação e o tempo total
    // ...
    // Adicione um botão para permitir que o usuário comece o jogo novamente
    echo "<form method='post'>";
    echo "<input type='submit' value='Recomeçar'>";
    echo "</form>";
}

?>