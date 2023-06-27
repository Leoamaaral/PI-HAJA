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
                <div class="meus-dados">
                    <h2>Meus Dados</h2><br>
                    <?php
                        // Executando a consulta para obter os dados da tabela
                        $sql = "SELECT * FROM dados WHERE id_usuario = {$_SESSION['id_usuario']}";
                        $result = $conn->query($sql);

                        // Verificando se existem registros retornados
                        if ($result->num_rows > 0) {
                            // Exibindo os dados na tela
                            while ($row = $result->fetch_assoc()) {
                                // echo '<div class="meus-dados">';
                                echo $row["equipe"] . "<br>";
                                echo $row["carro"] . "<br><br>";
                                echo "Dianteira <br>" ;
                                echo $row["kmola"] . "<br>";
                                echo $row["seno"] . "<br>";
                                echo $row["arctg"] . "<br>";
                                echo $row["angulo"] . "<br><br>";
                                echo "Traseira <br>" ;
                                echo $row["kmola2"] . "<br>";
                                echo $row["seno2"] . "<br>";
                                echo $row["arctg2"] . "<br>";
                                echo $row["angulo2"] . "<br>";
                                // Adicione aqui os outros campos que deseja exibir
                                echo "<br>";
                                echo "________________________________________";
                                echo "<br>";
                            }
                        } else {
                            echo "Nenhum resultado encontrado.";
                        }

                        // Fechando a conexão com o banco de dados
                        $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </body>    
</html>


