<?php
    //Incluí Conexão
    include('./CONNECTIONS/connection.php');      
    
    //Cria variáveis
    $tipoPonto = $_POST['selTipoPonto'];   
    $usuario   = $_SESSION['CODIGO'];
        
    //insere no banco de dados
    $insertPonto = "INSERT INTO PONTO(USUARIO_Codigo, PONTO_Realizado, PONTO_Tipo) VALUES ($usuario, now(), $tipoPonto)";
    $queryInsertPonto = $mysqli->query($insertPonto) or die("Falha na execução do código sql" . $mysqli->error);              
    
    $codigoUsuario = $_SESSION['CODIGO'];
    $insertLog = "INSERT INTO LOGUSUARIO(USUARIO_Codigo, LOGUSUARIO_Realizado, LOGUSUARIO_Descricao) VALUES ($codigoUsuario, now(), 'REGISTRO DE PONTO')";
    $queryInsertLog = $mysqli->query($insertLog) or die("Falha na execução do código sql" . $mysqli->error);

    //Redireciona para o login
    header("Location: ./homeUser.php");

?>