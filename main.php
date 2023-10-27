<?php
require_once ("./service.php");
function processPostRequest(): array
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $estrutura = filter_input(INPUT_POST, 'estrutura', FILTER_SANITIZE_STRING);
        return str_split($estrutura, 6);
    }
    return [];
}

$arrayEstrutura = processPostRequest();

if (!empty($arrayEstrutura)) {
    $dna = new DnaService($arrayEstrutura);
    echo $dna->getSequencia() ? "Sigmano" : "Humano";
}
