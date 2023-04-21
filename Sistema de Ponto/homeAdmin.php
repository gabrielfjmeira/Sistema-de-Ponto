<?php
    //Incluí Conexão
    include('./CONNECTIONS/connection.php');

    //Verifica Login
    if (!$_SESSION['LOGGED']){
        header ("Location: ./index.php?error=3");
    }   

    //Verifica se é um Admin
    if ($_SESSION['TIPOUSUARIO'] != 1){
        header ("Location: ./homeUser.php");
    }

?>

<html lang="pt-br">       
    <head>       
        <meta charset="utf-8">
        <title>Protótipo | Home</title>
        <link rel="stylesheet" href="./style.css">
        <script src="https://kit.fontawesome.com/2e74f8c7f8.js" crossorigin="anonymous"></script>
    </head>

    <body>           
        <div class="fundo">
            <h4>Seja bem vindo a home administrador</h4>
            <h4><?php echo $_SESSION['NOME'];?></h4>
            <button onclick="window.location.href = './logout.php';" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button> 

            <div class="ponto">                
                
                <h5>Logs de Usuários:</h5>
                <?php                    
                    //Imprime pontos anteriores
                    $logs = "SELECT * FROM LOGUSUARIO ORDER BY LOGUSUARIO_Realizado ASC";                    
                    $queryLogs = $mysqli->query($logs) or die(mysql_error());                        
                    if($queryLogs->num_rows > 0){
                        while($log = mysqli_fetch_array($queryLogs)){?>
                            <center>
                                <div class="ponto_box">                            
                                    <h6>Usuário: <?php  
                                        $usuario = $log['USUARIO_Codigo'];                                      
                                        $usuario = "SELECT * FROM USUARIO WHERE USUARIO_Codigo = $usuario";
                                        $queryUsuario = $mysqli->query($usuario) or die(mysql_error());
                                        $usuario_data = mysqli_fetch_array($queryUsuario);
                                        echo $usuario_data['USUARIO_Nome'];                                                                

                                    ?></h6>
                                    <h6>Realizado: <?php echo $log['LOGUSUARIO_Realizado'];?></h6>
                                    <h6>Descricao: <?php echo $log['LOGUSUARIO_Descricao'];?></h6>                          
                                </div>
                            </center><?php               
                        }
                    }else{?>
                        <center>
                            <div class="ponto_box">   
                                <h6>Sem logs registrados!</h6>
                            </div>
                        </center>
                    <?php
                    }
                ?>
                
            </div>                       

        </div>
    </body>
</html>