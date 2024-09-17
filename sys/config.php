<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'faculdade');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('ERROR_MESSAGE', 'Erro de Banco de dados<br>Tente novamente mais tarde :(');

try {
    $odb = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
$odb->exec("SET NAMES utf8mb4");
$odb->exec("SET CHARACTER SET utf8mb4");
} catch (PDOException $Exception) {
    error_log('ERROR: ' . $Exception->getMessage() . ' - ' . $_SERVER['REQUEST_URI'] . ' at ' . date('l jS \of F, Y, h:i:s A') . "\n", 3, 'error.log');
    die(ERROR_MESSAGE);
}

function error($string)
{
    return '' . $string . '';
}

function success($string)
{
    return '' . $string . '';
}

setlocale(LC_ALL, 'pt_BR.utf8');

$dataHoje = date('Y-m-d'); // Obtém a data atual no formato "aaaa-mm-dd"

$meses = array(
    1 => 'janeiro',
    2 => 'fevereiro',
    3 => 'março',
    4 => 'abril',
    5 => 'maio',
    6 => 'junho',
    7 => 'julho',
    8 => 'agosto',
    9 => 'setembro',
    10 => 'outubro',
    11 => 'novembro',
    12 => 'dezembro'
);

$dataDividida = explode('-', $dataHoje); // Divide a data em partes separadas (ano, mês, dia)

$mesAtual = (int)$dataDividida[1]; // Obtém o mês atual convertendo para um número inteiro

$dataTraduzida = $dataDividida[2] . ' de ' . $meses[$mesAtual] . ' de ' . $dataDividida[0]; // Monta a data traduzida

$timezone = new DateTimeZone('America/Sao_Paulo');



?>
