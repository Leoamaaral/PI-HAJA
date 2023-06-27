<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
         exit;     
    }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Criando a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/styleCalculadora.css">
    <script src="funcoesCalculadora.js"></script>
    <script src="https://kit.fontawesome.com/09710fdc1c.js" crossorigin="anonymous"></script>
 <title>Calculadora para HAJA</title>
</head>
    <body>
        <nav>
            <div class="logo">
                <img src="IMAGENS/logo.png" alt="Logo">
                <span>HAJA</span>
            </div>
            <ul>
                <li>
                    <a href="AreaPrivada.php">
                        <i class="fa-solid fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="salvaMysql">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span class="nav-item" class="botao-cabecalho">Salvar</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="salvarDadosButton">
                        <i class="fa-solid fa-file-export"></i>
                        <span class="nav-item">Exportar</span>
                    </a>
                </li>
                <li>
                    <a href="meuSave.php">
                        <i class="fa-solid fa-cloud"></i>
                        <span class="nav-item">Salvos</span>
                    </a>
                </li>
                <li>
                    <a href="info.php">
                        <i class="fa-solid fa-circle-info"></i>
                        <span class="nav-item">Informações</span>
                    </a>
                </li>
                <li>
                    <a href="sair.php" class="logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="nav-item">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="mainPage">

            <div class="big-block">
                <div class="dados-software">
                    <h2>Desenvolvedores</h2><br>
                    <p><span id="nome">Leonardo do Amaral</span></p><br>
                    <p><span id="nome">Marcio H. do Amaral</span></p><br>
                    <p><span id="nome">Mateus Mena</span></p><br>
                    <p><span id="nome">Cleverson Thoaldo</span></p><br>
                </div>
                    <div class="dados-software">
                    <h2>Informações de Contato</h2><br>
                        <p>Email: <span id="email">leonardoamaral.dev@gmail.com</span></p><br>
                        <p>Celular: <span id="celular">(41)98801-7557</span></p><br>
                    </div>
                    <div class="info">
                        <h3>Versão do Software</h3><br>
                        <p><strong>Versão: </strong><span id="versao"><strong>1.0</strong></span></p><br>
                    </div>
            </div>
        </div>
    </body>    
</html>


