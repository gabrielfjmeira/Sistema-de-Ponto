<?php
    //Incluí Conexão
    include('./CONNECTIONS/connection.php');

    //Verifica Login
    if (!$_SESSION['LOGGED']){
        header ("Location: ./index.php?error=3");
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
            <h4>Seja bem vindo a home</h4>
            <h4><?php echo $_SESSION['NOME'];?></h4>
            <button onclick="window.location.href = './logout.php';" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button> 

            <div class="ponto">                
                <form class="formPonto" action="./salvarPontoPHP.php" method="POST">
                    <h4>Bater Ponto</h4>
                    <label class="clock"><i class="fa-solid fa-clock"></i></label>
                    <label for="selTipoPonto" class="listPonto"><i class="fa-solid fa-list"></i></label>
                    <select name="selTipoPonto" id="selTipoPonto" required/>
                        <option value="" selected>Selecione uma opção</option>
                        <option value=1>Entrada</option>
                        <option value=0>Saída</option>
                    </select>
                    <input class="submit" type="submit" value="Bater Ponto"/>

                    <br><br>
                    <h5>Pontos Anteriores:</h5>
                    <?php
                        $usuario = $_SESSION['CODIGO'];
                        //Imprime pontos anteriores
                        $pontos = "SELECT * FROM PONTO WHERE USUARIO_Codigo = $usuario";                    
                        $queryPontos = $mysqli->query($pontos) or die(mysql_error());                        
                        if($queryPontos->num_rows > 0){
                            while($ponto = mysqli_fetch_array($queryPontos)){?>
                                <center>
                                    <div class="ponto_box">                            
                                        <h6>Realizado: <?php echo $ponto['PONTO_Realizado'];?></h6>
                                        <h6>Tipo: <?php 
                                            if($ponto['PONTO_Tipo'] == 1){
                                                echo "Entrada";
                                            }else{
                                                echo "Saída";
                                            }                           
                                        ?></h6>                          
                                    </div>
                                </center><?php               
                            }
                        }else{?>
                            <center>
                                <div class="ponto_box">   
                                    <h6>Sem pontos registrados!</h6>
                                </div>
                            </center>
                        <?php
                        }
                    ?>

                </form>
            </div>                       
        </div>

        
        
    </body>
</html>