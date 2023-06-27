<?php
// Receber os dados enviados pelo JavaScript
$data = json_decode(file_get_contents('php://input'), true);

$server = "localhost";
$user = "root";
$password = "";
$db = "project";

$conexao = mysqli_connect($server, $user, $password, $db);

// Verificar erros na conexão
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}

// Inserir os dados na tabela
$sql = "INSERT INTO dados (id_usuario, equipe, carro, kmola, seno, arctg, angulo, kmola2, seno2, arctg2, angulo2) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param('issssssssss',$data['id_usuario'], $data['resultadoEquipe'], $data['numeroCarro'], $data['resultadoSeno'], $data['resultadoAngulo'], $data['resultadoCursor'], $data['resultadoF1'], $data['resultadoSeno2'], $data['resultadoAngulo2'], $data['resultadoCursor2'], $data['resultadoF2']);
$stmt->execute();

// Fechar a conexão com o banco de dados
$stmt->close();
$conexao->close();

?>