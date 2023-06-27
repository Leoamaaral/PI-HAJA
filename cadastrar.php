<?php
require_once 'CLASSES/usuarios.php';
//require_once 'conecta.php';
$u = new Usuario;
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <div id="corpo-form-cad">
    <h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="40">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="Usuario/E-mail" maxlength="30">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confsenha" placeholder="Confirmar senha" maxlength="15">
        <input type="submit" value="Cadastrar">
        <a href="index.php">Já é inscrito?<strong>Entre!</strong></a>
    </form>
    </div> 
    <?php
    //verificar se clicou botao
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $Confirmarsenha = addslashes($_POST['confsenha']);
        //verificar se esta preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email)
             && !empty($senha) && !empty($Confirmarsenha))
        {
            $u->conectar("project","localhost","root","");

            if($u->msgErro == "")//se esta tudo ok
            {
                if($senha == $Confirmarsenha)
                {
                    if($u->cadastrar($nome,$telefone,$email,$senha))
                    {
                        ?>
                        <div id="msg-sucesso">
                        Cadastrado com sucesso! Acesse para entrar!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                        Email já cadastrado!
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                    Senha e confirmar senha não correspondem!
                    </div>
                    <?php
                    
                }
                
            }
            else
            {   
                ?>
                 <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro; ?>
                </div>
                 <?php
                 
            }
        }     
        else
        {
            ?>
            <div class="msg-erro">
            Preencha todos os campos!
            </div>
            <?php
        }

    }
    
    ?>
</body>    
</html>