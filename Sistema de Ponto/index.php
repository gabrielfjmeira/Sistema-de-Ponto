<?php

    //Incluí conexão
    include('./CONNECTIONS/connection.php');     

    //Verifica se o Usuário está Logado
    if ($_SESSION['LOGGED'] == True){
        if ($_SESSION['TIPOUSUARIO'] == 1){
            header ("Location: ./homeAdmin.html");
        } else{
            header ("Location: ./homeUser.html");
        }        
    }

?>

<html lang="pt-br">       
    <head>       
        <meta charset="utf-8">
        <title>Protótipo | Login</title>
        <link rel="stylesheet" href="./style.css">
        <script src="https://kit.fontawesome.com/2e74f8c7f8.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <form class="form" action="./loginPHP.php" method="POST">
            <h3>Formulário de Login</h3> 
            <label for="txtEmail" class="labelEmail"><i class="fas fa-envelope"></i></label>        
            <input type="text" name="txtEmail" id="txtEmail" placeholder="Insira o seu e-mail" pattern="^[a-zA-Z0-9.]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$" title="Formato de email inválido, digite novamente!" required/>
            <label for="txtSenha" class="labelSenha"><i class="fas fa-key"></i></i></label>
            <label class="verSenha" onclick="verSenha();"><i class="fa-solid fa-eye"></i></label>
            <input type="password" name="txtSenha" id="txtSenha" placeholder="Insira a sua senha" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%* ?&])[A-Za-z\d@$!%*?&]{8,}$" title="A senha deve possuir 8 digitos dentre eles, uma letra maiúscula, uma minúscula, um caracter especial e um número!" required/>
            <input type="submit" name="btnSubmit" value="Entrar"/>
            <h5>Não tem Cadastro? <a href="cadastro.php">Realizar Cadastro</a></h5>
            <?php 
                if (isset($_GET['cadastrado'])){
                    $cadastrado = $_GET['cadastrado'];
                    if ($cadastrado == 001){
                        echo "<h6 class='advice'>cadastro realizado com sucesso!</h6>";
                    } 
                }  

                if (isset($_GET['error'])){
                    $error = $_GET['error'];
                    if ($error == 001){
                        echo "<h6 class='error'>Email não cadastrado!</h6>";
                    } else if($error == 002){
                        echo "<h6 class='error'>Email ou Senha incorreto(s)!</h6>";
                    } else if($error == 003){
                        echo "<h6 class='error'>Realize o login para usar a plataforma!</h6>";
                    } 
                }            
            ?>
        </form>

        <script>
            var txtEmail = document.getElementById('txtEmail');
            var txtSenha = document.getElementById('txtSenha');

            txtEmail.addEventListener('focus', ()=>{
                txtEmail.style.borderColor = "#4A5F6A"; 
            });

            txtEmail.addEventListener('blur', ()=>{
                txtEmail.style.borderColor = "#ccc"; 
            });

            txtSenha.addEventListener('focus', ()=>{
                txtSenha.style.borderColor = "#4A5F6A"; 
            });

            txtSenha.addEventListener('blur', ()=>{
                txtSenha.style.borderColor = "#ccc"; 
            });

            function verSenha(){
                let txtSenha = document.getElementById('txtSenha');                                
                
                if (txtSenha.type == "password"){
                    txtSenha.type = "text";                    
                } else {
                    txtSenha.type = "password";                    
                }              
            }
        </script>
    </body>
</html>