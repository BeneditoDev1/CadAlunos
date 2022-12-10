<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $aluno = array();
  $aluno['id'] = $_POST['id'];
  $aluno['nome'] = $_POST['nome'];
  $aluno['email'] = $_POST['email'];
  $aluno['idade'] = $_POST['idade'];
  $aluno['id_turma'] = $_POST['id_turma'];
  $aluno['foto'] = $_POST['foto'];

  $arquivo = $_FILES['arquivo'];
  if ($arquivo['name']!="") {
    $arquivoTemporario = $arquivo['tmp_name'];
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $nomeArquivo = sha1(time()).".".$extensao;
    move_uploaded_file($arquivoTemporario, "_img/".$nomeArquivo);
    if ($aluno['foto'] != "") {
      unlink('_img/'.$aluno['foto']);
    }
    $aluno['foto'] = $nomeArquivo;
  }

  if ($aluno['id'] == 0) {
    salvarAluno($aluno);
  } else {
    alterarAluno($aluno);
  }
  setcookie("mensagem", "{$aluno['nome']} foi salvo");
  // pede para o navegador chamar o recurso alunos.php
  header('location: alunos.php');
 ?>
