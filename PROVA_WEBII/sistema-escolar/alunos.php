<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Gestor Escolar</title>
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php
  include_once "menu-lateral.php";
  ?>

  <div class="content">
    <?php
    if (isset($_COOKIE['mensagem'])) {
      echo "
          <div class='alert alert-success'>
            {$_COOKIE['mensagem']}
          </div>";
      unset($_COOKIE['mensagem']);
      setcookie("mensagem", "", 1);
    }
    ?>

    <h1>Lista de Alunos</h1>
    <a href="frmAluno.php" class="btn btn-primary">Novo</a>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Foto</th>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Idade</th>
          <th>Turma(s)</th>
          <th>Excluir</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $alunos = getAlunos();
        foreach ($alunos as $aluno) {
          $foto = $aluno['foto'] != "" ? $aluno['foto'] : 'anonimo.png';
          echo "
           <tr>
              <td>
                <img src='_img/$foto'>
              </td>
              <td>{$aluno['id']}</td>
              <td>{$aluno['nome']}</td>
              <td>{$aluno['email']}</td>
              <td>{$aluno['idade']}</td>
              <td>{$aluno['turma_ano']}</td>
              <td><a href='excluirAluno.php?id={$aluno['id']}' class='btn btn-danger'>-</a></td>
              <td><a href='editarAluno.php?id={$aluno['id']}' class='btn btn-primary'>+</a></td>
           </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>