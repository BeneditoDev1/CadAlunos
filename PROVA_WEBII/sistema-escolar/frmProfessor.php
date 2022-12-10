<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($professor)) {
  $professor = array();
  $professor['id'] = 0;
  $professor['nome'] = "";
  $professor['email'] = "";
  $professor['idade'] = 0;
  $professor['id_disciplina'] = 0;
  $professor['id_turma'] = 0;
  $professor['foto'] = "";
}

$foto = $professor['foto'] != "" ? $professor['foto'] : 'anonimo.png';
$turmas = getTurmas();
$disciplinas = getDisciplinas();
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
    <div>
      <div class="img">
        <img src="_img/<?php echo $foto ?>">
      </div>
      <h1>Cadastro de Professor</h1>
      <form action="salvarProfessor.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="foto" value="<?php echo $professor['foto']; ?>">
        <!-- ID -->
        <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $professor['id']; ?>">
        </div>
        <!-- NOME -->
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $professor['nome']; ?>">
        </div>        
        <!-- EMAIL -->
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $professor['email']; ?>">
        </div>
        <!-- IDADE -->
        <div class="mb-3">
          <label for="idade" class="form-label">Idade</label>
          <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $professor['idade']; ?>">
        </div>
        <!-- ESPECIALIDADE -->
        <div class="mb-3">
          <label for="id_disciplina" class="form-label">Especialidade</label>
          <select class="form-select" name="id_disciplina" id="id_disciplina">
            <?php
            foreach ($disciplinas as $disciplina) {
              $selected = $disciplina['id'] == $professor['id_disciplina'] ? 'selected' : '';
              echo "<option $selected value='{$disciplina['id']}'>{$disciplina['nome']}</option>";
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="id_turma" class="form-label">Turma</label>
          <select class="form-select" name="id_turma" id="id_turma">
            <?php
            foreach ($turmas as $turma) {
              $selected = $turma['id'] == $professor['id_turma'] ? 'selected' : '';
              echo "<option $selected value='{$turma['id']}'>{$turma['ano']}</option>";
            }
            ?>
          </select>
        </div>
        <!-- FOTO -->
        <div class="mb-3">
          <label for="arquivo" class="form-label">Foto</label>
          <input type="file" class="form-control" id="arquivo" name="arquivo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Gravar</button>
      </form>
    </div>
  </div>

  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>