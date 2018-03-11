<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // PEGANDO O ID DO USUARIO
    $idUser = $_SESSION['id_usuario'];

    // PEGAR OS DADOS DO USUARIO NO DB
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile </title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>

    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>

        <div class="container">
             <div class="row" >
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Editar perfil </h3>
                        </div>
                        <div class="panel-body">
                            
                        </div>                        
                    </div> <!-- PANEL EDIT PROFILE -->
                </div>
                <!-- end col-md-6 -->
            </div>
            <!-- end  row --> 
        </div>
        <!--edn container  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>