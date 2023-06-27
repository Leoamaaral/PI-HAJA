<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
         exit;     
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

                <!--div calculadora do K da mola dianteira-->            
                <div class="Kmola">
                    <h2>K da mola Dianteira</h2><br>

                    <label for="P">Peso(P) do carro em kg:</label>
                    <input type="number" id="P" required><br>

                    <label for="percent">Distribuição do peso em %:</label>
                    <input type="number" id="percent" required><br>

                    <label for="D">Distância(D) em (mm):</label>
                    <input type="number" id="D" required><br>

                    <label for="d">Distância(d) em (mm):</label>
                    <input type="number" id="d" required><br>

                    <i class="fa-solid fa-calculator" onclick="calcularK1()"></i><br>
                    <div class="bloco-calculo"><div class="resultado-calculos" id="resultadoF1"></div></div> 
                    <br>
                </div>
                <!--div nome equipe-->
                <div class="Kmola">
                    <h2>Nome da equipe</h2><br>

                    <label for="equipe">Nome da equipe:</label>
                    <input type="text" id="equipe" required><br>

                    <label for="numCar">Nº do carro:</label>
                    <input type="number" id="numCar" required><br>

                    <i class="fa-solid fa-square-check" onclick="mostraEquipe()"></i><br>
                    <div class="bloco-calculo">
                        <div class="resultado-calculos" id="resultadoEquipe"></div>
                        <div class="resultado-calculos" id="numeroCarro"></div>
                    </div> 
                    <br>
                </div>

                <!--div calculadora do K da mola traseira-->            
                <div class="Kmola">
                    <h2>K da mola Traseira</h2><br>

                    <label for="P2">Peso(P) do carro em kg:</label>
                    <input type="number" id="P2" required><br>

                    <label for="percent2">Distribuição do peso em %:</label>
                    <input type="number" id="percent2" required><br>

                    <label for="D2">Distância(D) em (mm):</label>
                    <input type="number" id="D2" required><br>

                    <label for="d2">Distância(d) em (mm):</label>
                    <input type="number" id="d2" required><br>

                    <i onclick="calcularK2()" class="fa-solid fa-calculator"></i><br>

                    <div class="bloco-calculo"><div class="resultado-calculos" id="resultadoF2"></div></div> 
                    <br>
                </div>
            </div>
            <br><br>
            <div class="big-block">
                <!--div calculadora do Ângulo dianteira-->
                <div class="Angulo">
                    <h2>Ângulo Dianteiro</h2><br>

                    <label for="CO">Altura (a) do veículo em (mm):</label>
                    <input type="number" id="CO" required><br>

                    <label for="HIP">Braço da suspensão em (mm):</label>
                    <input type="number" id="HIP" required><br>

                    <i onclick="calcularSeno()" class="fa-solid fa-calculator"></i><br>

                    <div class="bloco-calculo">
                        <div class="resultado-calculos" id="resultadoSeno"></div>
                        <div class="resultado-calculos" id="resultadoAngulo"></div>
                        <div class="resultado-calculos" id="resultadoCursor"></div>
                    </div>
                    <br>
                </div> 
                
                <!--div calculadora do Ângulo traseira-->
                <div class="Angulo">
                    <h2>Ângulo Traseiro</h2><br>

                    <label for="CO2">Altura (a) do veículo em (mm):</label>
                    <input type="number" id="CO2" required><br>

                    <label for="HIP2">Braço da suspensão em (mm):</label>
                    <input type="number" id="HIP2" required><br>

                    <i onclick="calcularSeno2()" class="fa-solid fa-calculator"></i><br>
                    
                    <div class="bloco-calculo">
                        <div class="resultado-calculos" id="resultadoSeno2"></div>
                        <div class="resultado-calculos" id="resultadoAngulo2"></div>
                        <div class="resultado-calculos" id="resultadoCursor2"></div>
                    </div>
                    <br>
                </div>
            </div>
        </div>

        <!--------SCRIPTS SALVA DADOS---------->
<script>
var salvarDadosButton = document.getElementById('salvarDadosButton');

    salvarDadosButton.addEventListener('click', function() {

    var resultadoEquipe = document.getElementById('resultadoEquipe').innerHTML;
    var numeroCarro = document.getElementById('numeroCarro').innerHTML;
    var resultadoSeno = document.getElementById('resultadoSeno').innerHTML;
    var resultadoAngulo = document.getElementById('resultadoAngulo').innerHTML;
    var resultadoCursor = document.getElementById('resultadoCursor').innerHTML;
    var resultadoF1 = document.getElementById('resultadoF1').innerHTML;
    var resultadoSeno2 = document.getElementById('resultadoSeno2').innerHTML;
    var resultadoAngulo2 = document.getElementById('resultadoAngulo2').innerHTML;
    var resultadoCursor2 = document.getElementById('resultadoCursor2').innerHTML;
    var resultadoF2 = document.getElementById('resultadoF2').innerHTML;

    var imprime = resultadoEquipe + '\n' + numeroCarro + '\n' + '================' + '\n' + resultadoF1 + '\n' + resultadoSeno + '\n' + resultadoAngulo + '\n' + resultadoCursor + '\n' + '================'
                + '\n' +resultadoF2 + '\n' + resultadoSeno2 + '\n' + resultadoAngulo2 + '\n' + resultadoCursor2;

    var link = document.createElement('a');
    link.href = 'data:text/plain;charset=utf-8,' + encodeURIComponent(imprime);
    link.download = 'Projeto_HAJA.txt';

    link.click();
    });
    
    // função para salvar os dados no banco de dados
    var id_usuario = <?php echo $_SESSION['id_usuario']; ?>;
    var salvaMysql = document.getElementById('salvaMysql');

    salvaMysql.addEventListener('click', function() {
    
    var resultadoEquipe = document.getElementById('resultadoEquipe').innerHTML;
    var numeroCarro = document.getElementById('numeroCarro').innerHTML;    
    var resultadoSeno = document.getElementById('resultadoSeno').innerHTML;
    var resultadoAngulo = document.getElementById('resultadoAngulo').innerHTML;
    var resultadoCursor = document.getElementById('resultadoCursor').innerHTML;
    var resultadoF1 = document.getElementById('resultadoF1').innerHTML;
    var resultadoSeno2 = document.getElementById('resultadoSeno2').innerHTML;
    var resultadoAngulo2 = document.getElementById('resultadoAngulo2').innerHTML;
    var resultadoCursor2 = document.getElementById('resultadoCursor2').innerHTML;
    var resultadoF2 = document.getElementById('resultadoF2').innerHTML;


    // Criar um objeto com os dados e envia para o php
    var dados = {
        id_usuario: id_usuario,
        resultadoEquipe: resultadoEquipe,
        numeroCarro: numeroCarro,
        resultadoSeno: resultadoSeno,
        resultadoAngulo: resultadoAngulo,
        resultadoCursor: resultadoCursor,
        resultadoF1: resultadoF1,
        resultadoSeno2: resultadoSeno2,
        resultadoAngulo2: resultadoAngulo2,
        resultadoCursor2: resultadoCursor2,
        resultadoF2: resultadoF2
    };

    var xhr = new XMLHttpRequest();
    xhr.open('POST','inserir_dados.php', true);
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      console.log(xhr.responseText); // resposta do servidor
      alert("Dados inseridos com sucesso no banco de dados!");
    } else {
      alert("Erro ao inserir os dados no banco de dados. Por favor, tente novamente.");
    }
  }
};
    xhr.send(JSON.stringify(dados));
});


</script>
<!--------/SCRIPTS SALVA DADOS---------->
    </body>
</html>


