<?php

   include('./CONNECTIONS/connection.php');  

    //Realiza Log-Out do usuário
   if(!isset($_SESSION)){
      session_start();
   }  

   $codigoUsuario = $_SESSION['CODIGO'];
   $insertLog = "INSERT INTO LOGUSUARIO(USUARIO_Codigo, LOGUSUARIO_Realizado, LOGUSUARIO_Descricao) VALUES ($codigoUsuario, now(), 'LOGOUT')";
   $queryInsertLog = $mysqli->query($insertLog) or die("Falha na execução do código sql" . $mysqli->error);

   session_destroy();
   
   header("Location: ./index.php");

?>