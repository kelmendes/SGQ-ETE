<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    $host = 'testep1.mysql.dbaas.com.br';
    $dbname = 'testep1';
    $user = 'testep1';
    $password = 'P@ssAlun0';


    $disciplina_assunto_questao_id = (isset($_GET['id']))? $_GET['id'] : null;

    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $star = $conn->prepare("
        SELECT
            *
        FROM
            disciplina_assunto_questao AS Q
        WHERE
            Q.disciplina_assunto_questao_id = :disciplina_assunto_id
    ");

    $star->bindValue(":disciplina_assunto_id", $disciplina_assunto_questao_id , PDO::PARAM_INT);
    $run = $star->execute();
    $questao = $star->fetch(PDO::FETCH_ASSOC);

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

                <form class="form">

                    <div class="form-group">
                        <label for="IdQuestão">Id</label>
                        <input type="text" class="form-control" value="<?php echo $questao['disciplina_assunto_questao_id'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="IdQuestão">Nome</label>
                        <input type="text" class="form-control" value="<?php echo $questao['disciplina_assunto_questao_nome'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="IdQuestão">Pergunta</label>
                        <input type="text" class="form-control" value="<?php echo $questao['disciplina_assunto_questao_pergunta'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="IdQuestão">Data Criação</label>
                        <input type="text" class="form-control" value="<?php echo $questao['disciplina_assunto_questao_creat_at'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="IdQuestão">Resposta</label>
                        <textarea  class="form-control" rows="2"></textarea>
                    </div>

                </form>
        
            </div>
            <!-- end  row --> 
        </div>
        <!--edn container  -->


    <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>