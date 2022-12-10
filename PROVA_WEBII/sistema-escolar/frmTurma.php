<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($turma)) {
  $turma = array();
  $turma['id'] = 0;
  $turma['ano'] = 0;
  $turma['periodo'] = "";
}
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
      <h1>Cadastro de Turmas</h1>
      <form action="salvarTurma.php" method="post">
        <!-- ID -->
        <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $turma['id']; ?>">
        </div>
        <!-- ANO -->
        <div class="mb-3">
          <label for="ano" class="form-label">Ano</label>
          <input type="number" class="form-control" id="ano" name="ano" value="<?php echo $turma['ano']; ?>">
        </div>
        <!-- PERIODO -->
        <div class="mb-3">
          <label for="periodo" class="form-label">Periodo</label>
          <select class="form-select" name="periodo" id="periodo">
            <option value="Matutino">Matutino</option>
            <option value="Vespertino">Vespertino</option>
            <option value="Noturno">Noturno</option>
          </select>
        </div>      
        <button type="submit" class="btn btn-primary">Gravar</button>
      </form>
    </div>
  </div>

  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>