<?php  

    //Conexão com o Banco
    $usuario = 'root';
    $senha = '';
    $database = 'prototipo_db';
    $host = 'localhost:3312';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli->error){
        die("Falha ao conectar ao banco de dados: ") . $mysqli->error;
    }

    //Oculta os Erros do PHP
    error_reporting(0);

    //Inicia Sessão
    session_start();

?>
