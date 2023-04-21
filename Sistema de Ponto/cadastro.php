<html lang="pt-br">       
    <head>       
        <meta charset="utf-8">
        <title>Protótipo | Cadastro</title>
        <link rel="stylesheet" href="./style.css">
        <script src="https://kit.fontawesome.com/2e74f8c7f8.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <form class="form" action="./cadastrarPHP.php" method="POST">
            <h3>Formulário de Cadastro</h3> 
            <label for="txtNome" class="labelNomeCad"><i class="fas fa-user"></i></label>
            <input type="text" name="txtNome" id="txtNome" placeholder="Insira o seu nome completo" required/>
            <label for="txtEmail" class="labelEmailCad"><i class="fas fa-envelope"></i></label>        
            <input type="text" name="txtEmail" id="txtEmail" placeholder="Insira o seu e-mail" pattern="^[a-zA-Z0-9.]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$" required/>
            <label for="txtSenha" class="labelSenhaCad"><i class="fas fa-key"></i></i></label>            
            <label class="verSenhaCad" onclick="verSenha();"><i class="fa-solid fa-eye"></i></label>
            <input type="password" name="txtSenha" id="txtSenha" placeholder="Insira a sua senha" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%* ?&])[A-Za-z\d@$!%*?&]{8,}$" title="A senha deve possuir 8 digitos dentre eles, uma letra maiúscula, uma minúscula, um caracter especial e um número!" required/>
            <label for="selUserType" class="labelAdminCad"><i class="fa-solid fa-list"></i></label>
            <select name="selUserType" id="selUserType" required>
                <option value="" selected>Selecione uma opção</option>
                <option value=1>Administrador</option>
                <option value=0>Usuário</option>
            </select>
            <input type="submit" name="btnSubmit" value="Cadastrar"/>
            <h5><a href="index.php">Voltar</a></h5>
            <?php 
                if (isset($_GET['error'])){
                    $error = $_GET['error'];
                    if ($error == 001){
                        echo "<h6>Email já cadastrado!</h6>";
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