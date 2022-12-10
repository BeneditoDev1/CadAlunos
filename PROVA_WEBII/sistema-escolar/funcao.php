<?php
  // CONEXAO COM O BANCO
  function getConnection() {
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=escola_webii;port=3306', "root", "");
        return $conexao;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
  }

  // FUNÇÕES GET
  function getAlunos() {
    $conexao = getConnection();
    $sql = "SELECT aluno.*, turma.ano AS turma_ano, turma.periodo AS turma_periodo FROM aluno
      JOIN turma ON turma.id = aluno.id_turma ORDER BY id";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }

  function getProfessores() {
    $conexao = getConnection();
    $sql = "SELECT professor.*, disciplina.nome AS disciplina_nome, turma.ano AS turma_ano, turma.periodo AS turma_periodo FROM professor
      JOIN disciplina ON disciplina.id = professor.id_disciplina 
      JOIN turma ON turma.id = professor.id_turma 
      ORDER BY id";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }

  function getTurmas() {
    $conexao = getConnection();
    $sql = "SELECT * FROM turma ORDER BY id";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }

  function getDisciplinas() {
    $conexao = getConnection();
    $sql = "SELECT * FROM disciplina ORDER BY id";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }

  // FUNÇÕES DE SALVAR
  function salvarAluno($aluno) {
    $conexao = getConnection();
    $sql = "INSERT INTO aluno (nome, email, idade, id_turma, foto) VALUES (?,?,?,?,?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $aluno['nome']);
    $sentenca->bindParam(2, $aluno['email']);
    $sentenca->bindParam(3, $aluno['idade']);
    $sentenca->bindParam(4, $aluno['id_turma']);
    $sentenca->bindParam(5, $aluno['foto']);
    $sentenca->execute();
    $conexao = null;
  }

  function salvarProfessor($professor) {
    $conexao = getConnection();
    $sql = "INSERT INTO professor (nome, email, idade, id_disciplina, id_turma, foto) VALUES (?,?,?,?,?,?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $professor['nome']);
    $sentenca->bindParam(2, $professor['email']);
    $sentenca->bindParam(3, $professor['idade']);
    $sentenca->bindParam(4, $professor['id_disciplina']);
    $sentenca->bindParam(5, $professor['id_turma']);
    $sentenca->bindParam(6, $professor['foto']);
    $sentenca->execute();
    $conexao = null;
  }

  function salvarTurma($turma) {
    $conexao = getConnection();
    $sql = "INSERT INTO turma (ano, periodo) VALUES (?,?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $turma['ano']);
    $sentenca->bindParam(2, $turma['periodo']);
    $sentenca->execute();
    $conexao = null;
  }

  function salvarDisciplina($disciplina) {
    $conexao = getConnection();
    $sql = "INSERT INTO disciplina (nome) VALUES (?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $disciplina['nome']);
    $sentenca->execute();
    $conexao = null;
  }

  // FUNÇÕES DE EXCLUSÃO
  function excluirAluno($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM aluno WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }

  function excluirProfessor($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM professor WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }

  function excluirTurma($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM turma WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }

  function excluirDisciplina($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM disciplina WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }

  // FUNÇÕES GET (ELEMENTOS DAS TABELAS)
  function getAluno($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM aluno WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $aluno = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $aluno;
  }

  function getProfessor($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM professor WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $professor = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $professor;
  }

  function getTurma($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM turma WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $turma = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $turma;
  }

  function getDisciplina($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM disciplina WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $turma = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $turma;
  }

  // FUNÇÕES DE EDIÇÃO
  function alterarAluno($aluno) {
    $conexao = getConnection();
    $sql = "UPDATE aluno SET nome=?, email=?, idade=?, foto=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $aluno['nome']);
    $sentenca->bindParam(2, $aluno['email']);
    $sentenca->bindParam(3, $aluno['idade']);
    $sentenca->bindParam(4, $aluno['foto']);
    $sentenca->bindParam(5, $aluno['id']);
    $sentenca->execute();
    $conexao = null;
  }

  function alterarProfessor($professor) {
    $conexao = getConnection();
    $sql = "UPDATE professor SET nome=?, email=?, idade=?, id_disciplina=?, id_turma=?, foto=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $professor['nome']);
    $sentenca->bindParam(2, $professor['email']);
    $sentenca->bindParam(3, $professor['idade']);
    $sentenca->bindParam(4, $professor['id_disciplina']);
    $sentenca->bindParam(5, $professor['id_turma']);
    $sentenca->bindParam(6, $professor['foto']);
    $sentenca->bindParam(7, $professor['id']);
    $sentenca->execute();
    $conexao = null;
  }

  function alterarTurma($turma) {
    $conexao = getConnection();
    $sql = "UPDATE turma SET ano=?, periodo=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $turma['ano']);
    $sentenca->bindParam(2, $turma['periodo']);
    $sentenca->bindParam(3, $turma['id']);
    $sentenca->execute();
    $conexao = null;
  }

  function alterarDisciplina($disciplina) {
    $conexao = getConnection();
    $sql = "UPDATE disciplina SET nome=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $disciplina['nome']);
    $sentenca->execute();
    $conexao = null;
  }

  // LOGIN
  function getUserByEmail($email) {
    $conexao = getConnection();
    $sql = "SELECT * FROM usuario WHERE email=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $email);
    $sentenca->execute();
    $usuario = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $usuario;
  }

 ?>
