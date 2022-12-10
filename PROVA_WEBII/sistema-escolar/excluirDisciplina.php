<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

// variavel global que contem informacoes do método GET
  $id = $_GET['id'];

  $disciplina = getDisciplinas($id);
  excluirDisciplina($id);
  setcookie("mensagem", "Disciplina {$disciplina['nome']} foi excluída");
  header('location: disciplinas.php');
 ?>
