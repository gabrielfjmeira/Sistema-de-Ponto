<?php
    //Incluí Conexão
    include('./CONNECTIONS/connection.php');      
    
    //Cria variáveis
    $nome           = $_POST['txtNome'];   
    $email          = $_POST['txtEmail'];
    $senha          = $_POST['txtSenha'];                 
    $tipo           = $_POST['selUserType'];

    //Criptografa a senha para popular no banco de dados
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $selectUsuario = "SELECT * FROM USUARIO WHERE USUARIO_Email = '$email'";
    $querySelectUsuario = $mysqli->query($selectUsuario) or die("Falha na execução do código sql" . $mysqli->error);
    if($querySelectUsuario->num_rows == 1){
        //Redireciona para o index
        header("Location: ./cadastro.php?error=1");
    }else{
        //insere no banco de dados
        $insertUsuario = "INSERT INTO USUARIO(USUARIO_Nome, USUARIO_Email, USUARIO_Senha, USUARIO_Administrador) VALUES ('$nome', '$email', '$senhaCriptografada', $tipo)";
        $queryInsertUsuario = $mysqli->query($insertUsuario) or die("Falha na execução do código sql" . $mysqli->error);              
        
        //Redireciona para o login
        header("Location: ./index.php?cadastrado=1");
    }        
?>