<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // ADICIONANDO CLASS
    require './class/questões.php';

    // ESTANIANDO CLASS 
    $questaD = new Questões();

    $disciplina_assunto_questao_id = (isset($_GET['id']))? $_GET['id'] : null;

    $questao = $questaD->getQuestaoMultiEscolha($disciplina_assunto_questao_id);
    $alternativas = $questaD->getQuestaoMultiEscolhaAlternativas($disciplina_assunto_questao_id);



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
                        <label for="IdQuestão">Alternativas</label>
                        <?php while ( $rows =  $alternativas->fetch(PDO::FETCH_ASSOC)){ ?> 
                           <div >
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" value="<?php  echo $rows['disciplina_assunto_questao_mutipla_escolha_text'] ?>">
                                    <?php  echo $rows['disciplina_assunto_questao_mutipla_escolha_text'] ?>
                                </label>
                            </div>
                        <?php } ?>
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