<?php
session_start();
header("Content-Type:application/json");
require_once('conexao.php');
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$data_start = str_replace('/','-',$dados['start']);
$data_start_convert = date('Y-m-d H:i:s', strtotime($data_start));

$data_end = str_replace('/','-',$dados['end']);
$data_end_convert = date('Y-m-d H:i:s', strtotime($data_end));

$sql="INSERT INTO events(title, color, start, end)VALUES(:title, :color, :start, :end)";
$sql=$db->prepare($sql);
$sql->bindValue(':title', $dados['titulo']);
$sql->bindValue(':color', $dados['color']);
$sql->bindValue(':start', $data_start_convert);
$sql->bindValue(':end', $data_end_convert);
$sql->execute();

$cad = true;
if ($cad) {
    $retorna = ['sit'=>true, 'msg'=>"<div class='alert alert-success' role='alert'>Evento'". $dados['titulo'] ."'Cadastrado com Sucesso!</div>"];
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Evento'". $dados['start'] ."'Cadastrado com Sucesso!</div>";
} else {
    $retorna = ['sit'=>true, 'msg'=>"<div class='alert alert-success' role='alert'>Evento'". $dados['titulo'] ."'Não Cadastrado!</div>"];
}

echo json_encode($retorna);