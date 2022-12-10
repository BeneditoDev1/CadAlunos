<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $professor = array();
  // variavel global $_POST
  $professor['id'] = $_POST['id'];
  $professor['nome'] = $_POST['nome'];
  $professor['email'] = $_POST['email'];
  $professor['idade'] = $_POST['idade'];
  $professor['id_disciplina'] = $_POST['id_disciplina'];
  $professor['id_turma'] = $_POST['id_turma'];
  $professor['foto'] = $_POST['foto'];

  $arquivo = $_FILES['arquivo'];
  if ($arquivo['name']!="") {
    $arquivoTemporario = $arquivo['tmp_name'];
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $nomeArquivo = sha1(time()).".".$extensao;
    move_uploaded_file($arquivoTemporario, "_img/".$nomeArquivo);
    if ($professor['foto'] != "") {
      unlink('_img/'.$professor['foto']);
    }
    $professor['foto'] = $nomeArquivo;
  }

  if ($professor['id'] == 0) {
    salvarProfessor($professor);
  } else {
    alterarProfessor($professor);
  }
  setcookie("mensagem", "{$professor['nome']} foi salvo");
  // pede para o navegador chamar o recurso professores.php
  header('location: professores.php');
 ?>
