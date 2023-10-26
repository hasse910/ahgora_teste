<?php

// Obtém o texto do formulário
$estrutura = $_POST['estrutura'];

// Separa o texto em blocos de 6 caracteres
$arrayEstrutura = str_split($estrutura, 6);

// Exibe a estrutura
foreach ($arrayEstrutura as $bloco) {
    echo $bloco . "<br>";
}



// Verifique se todas as letras da sequência são válidas.
foreach ($arrayEstrutura as $string) {
    foreach (str_split($string) as $letra) {
        if (!in_array($letra, ["A", "T", "C", "G"])) {
            echo "Humano <br>";
        }
    }
}

?>
