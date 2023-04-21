<?php
    include('./CONNECTIONS/connection.php');  
       
    $_SESSION ['LOGGED'] = $_SESSION ['LOGGED'] || False;

    //Verifica o Login
    if(isset($_POST['txtEmail']) || isset($_POST['txtSenha'])){
        
        $email = $mysqli->real_escape_string($_POST['txtEmail']);
        $senha = $mysqli->real_escape_string($_POST['txtSenha']);

        $login = "SELECT * FROM USUARIO WHERE USUARIO_Email = '$email'";
        $existeLogin = $mysqli->query($login) or die("Falha na execução do código sql" . $mysqli->error);
        
        //Verifica se o registro existe no banco
        if($existeLogin->num_rows == 1){
            
            $usuario = $existeLogin->fetch_assoc();
            if(password_verify($senha, $usuario['USUARIO_Senha'])){                
                
                $codigoUsuario = $usuario['USUARIO_Codigo'];
                $nomeUsuario = $usuario['USUARIO_Nome'];                
                $tipoUsuario   = $usuario['USUARIO_Administrador'];                

                //Redireciona o Administrador
                if ($tipoUsuario == 1){
                                                                  
                    $_SESSION['CODIGO'] =  $codigoUsuario;   
                    $_SESSION['NOME'] = $nomeUsuario;        
                    $_SESSION['TIPOUSUARIO']  = $tipoUsuario;
                    $_SESSION['LOGGED'] = True;

                    $insertLog = "INSERT INTO LOGUSUARIO(USUARIO_Codigo, LOGUSUARIO_Realizado, LOGUSUARIO_Descricao) VALUES ($codigoUsuario, now(), 'LOGIN')";
                    $queryInsertLog = $mysqli->query($insertLog) or die("Falha na execução do código sql" . $mysqli->error);       
                    
                    header("Location: ./homeAdmin.php");                    
                    
                } else{ //Redireciona demais usuários
                    
                    $_SESSION['CODIGO'] = $codigoUsuario;    
                    $_SESSION['NOME'] = $nomeUsuario;        
                    $_SESSION['TIPOUSUARIO']  = $tipoUsuario;
                    $_SESSION ['LOGGED'] = True;

                    $insertLog = "INSERT INTO LOGUSUARIO(USUARIO_Codigo, LOGUSUARIO_Realizado, LOGUSUARIO_Descricao) VALUES ($codigoUsuario, now(), 'LOGIN')";
                    $queryInsertLog = $mysqli->query($insertLog) or die("Falha na execução do código sql" . $mysqli->error);    
                    
                    header("Location: ./homeUser.php");
                }
                
            }else{
                header("Location: ./index.php?error=002");                
            }       
            
        }else{
            header("Location: ./index.php?error=001");            
        }              
    }    
?>