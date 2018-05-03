<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // ADICIONANDO CLASS
    require './class/questões.php';

    // ESTANIANDO CLASS 
    $questaD = new Questões();

    $disciplina_assunto_questao_id = (isset($_GET['id']))? $_GET['id'] : null;

    $questao = $questaD->getQuestaoDissertativa($disciplina_assunto_questao_id);

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
                <div class="panel panel-default">   
                    <div class="panel panel-heading"></div><!-- end panel heading -->
                    <div class="panel panel-body">
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
                    </div><!-- end panel panel-body-->
                </div><!-- end panel panel-body -->       
            </div><!-- end  row --> 
        </div><!--edn container  -->


    <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>