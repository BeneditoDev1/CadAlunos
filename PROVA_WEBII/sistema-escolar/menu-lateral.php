<?php
include_once "funcao.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: login/frmLogin.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Gestor Escolar</title>
    <!-- FONT AWESOME (Para os icones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- CSS LOCAL -->
    <link rel="stylesheet" href="_css/menu-lateral.css">
</head>

<body>
    <!-- MENU LATERAL-->
    <nav class="sidebar">
        <!-- TITULO -->
        <div class="text">
            <i class="fa-solid fa-school fa-2xl" style="margin-top: 70px;"></i>
            <p>Gestor Escolar</p>
        </div>
        <!-- MENU -->
        <ul style="padding: 0px;">
            <!-- VOLTAR PARA O INICIO (HOME)-->
            <li>
                <a href="index.php">
                    <i class="fa-solid fa-house fa-lg" style="margin-right: 10px;"></i>
                    Inicio
                </a>
            </li>
            <!-- ESTUDANTES -->
            <li>
                <a href="alunos.php" class="feat-btn">
                    <i class="fa-solid fa-users fa-lg" style="margin-right: 10px;"></i>
                    Alunos
                </a>
            </li>
            <!-- PROFESSORES -->
            <li>
                <a href="professores.php" class="serv-btn">
                    <i class="fa-solid fa-person-chalkboard fa-lg" style="margin-right: 10px;"></i>
                    Professores
                </a>
            </li>
            <!-- TURMAS -->
            <li>
                <a href="turmas.php" class="turm-btn">
                <i class="fa-sharp fa-solid fa-graduation-cap fa-lg" style="margin-right: 10px"></i>
                    Turmas
                </a>
            </li>
            <!-- DISCIPLINAS -->
            <li>
                <a href="disciplinas.php" class="disc-btn">
                    <i class="fa-solid fa-book-open fa-lg" style="margin-right: 10px;"></i>
                    Disciplinas
                </a>
            </li>
            <!-- SAIR (LOGOUT)-->
            <li>
                <a href="login/logout.php">
                    <i class="fa-solid fa-right-from-bracket fa-lg" style="margin-right: 10px;"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>
    
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- DESTACAR LINKS DO MENU -->
    <script>
        $(function(){
            // this will get the full URL at the address bar
            var url = window.location.href; 

            // passes on every "a" tag 
            $(".sidebar a").each(function() {
                    // checks if its the same on the address bar
                if(url == (this.href)) { 
                    $(this).closest("li").addClass("active");
                }
            });
        });
    </script>
</body>

</html>