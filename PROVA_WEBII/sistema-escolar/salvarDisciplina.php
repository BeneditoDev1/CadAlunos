<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $disciplina = array();
  $disciplina['id'] = $_POST['id'];
  $disciplina['nome'] = $_POST['nome'];

  if ($disciplina['id'] == 0) {
    salvarDisciplina($disciplina);
  } else {
    alterarDisciplina($disciplina);
  }
  setcookie("mensagem", "{$disciplina['nome']} foi salva");
  // pede para o navegador chamar o recurso disciplinas.php
  header('location: disciplinas.php');
 ?>
