<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    $disciplina_assunto_questao_id = (isset($_GET['id']))? $_GET['id'] : null;

    $conn = new PDO('mysql:host=localhost;dbname=test', 'root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $star = $conn->prepare("
        SELECT
            *
        FROM
            disciplina_assunto_questao AS Q
        WHERE
            Q.disciplina_assunto_questao_id = :disciplina_assunto_id

    ");

    $star->bindValue(":disciplina_assunto_id", $disciplina_assunto_questao_id , PDO::PARAM_INT);
    $star->execute();
    $questao = $star->fetch(PDO::FETCH_ASSOC);


    $alternativas = $conn->prepare("
        SELECT
            *
        FROM
            disciplina_assunto_questao_mutipla_escolha AS M
        WHERE
            M.disciplina_assunto_questao_id = :disciplina_assunto_id

    ");

    $alternativas->bindValue(":disciplina_assunto_id", $disciplina_assunto_questao_id , PDO::PARAM_INT);
    $alternativas->execute();



?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>

    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>
        
        <div class="container">
             <div class="row" >

                <?php
                    foreach ($questao as &$value) {
                        echo $value."</br>";
                    }
                ?>

                <?php

                    while ( $rows =  $alternativas->fetch(PDO::FETCH_ASSOC)){
                        echo $rows['disciplina_assunto_questao_mutipla_escolha_id'] . "-";
                        echo $rows['disciplina_assunto_questao_mutipla_escolha_text'] . "</br>";
                    }
                ?>
        
            </div>
            <!-- end  row --> 
        </div>
        <!--edn container  -->


    <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>