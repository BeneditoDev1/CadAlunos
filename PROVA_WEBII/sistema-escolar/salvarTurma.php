<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $turma = array();
  // variavel global $_POST
  $turma['id'] = $_POST['id'];
  $turma['ano'] = $_POST['ano'];
  $turma['periodo'] = $_POST['periodo'];

  if ($turma['id'] == 0) {
    salvarTurma($turma);
  } else {
    alterarTurma($turma);
  }
  setcookie("mensagem", "{$turma['nome']} foi salvo");
  // pede para o navegador chamar o recurso turmas.php
  header('location: turmas.php');
 ?>
