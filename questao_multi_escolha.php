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
                <div class="panel panel-default" >
                        <div class="panel-heading">
                        </div><!-- end panel-heading -->
                        <div class="panel-body">
            
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

                                <!-- ALERTA CASO TENHA PROBLEMA NO CADASTRO DA ALTERNATIVA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['erro_msg_ALTERNATIVA'])) { ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_ALTERNATIVA']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_ALTERNATIVA']);
                                      ?>
                                   </div>
                                <?php } ?>
                                 <!-- END ALERTA CASO TENHA PROBLEMA NO CADASTRO DA ALTERNATIVA -->

                                 <!-- ALERTA CASO TENHA PROBLEMA NO CADASTRO DA ALTERNATIVA -->
                                    <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                    <?php if (isset($_SESSION['success_msg_ALTERNATIVA'])) { ?>
                                       <div class="alert alert-success" role="alert">
                                          <i class="glyphicon glyphicon-ok"></i>
                                          <?php 
                                             // EXIBINDO MESSAGEM
                                             echo $_SESSION['success_msg_ALTERNATIVA']; 
                                             // APAGANDO MESSAGEM DA SESSION
                                             unset($_SESSION['success_msg_ALTERNATIVA']);
                                          ?>
                                       </div>
                                    <?php } ?>
                                 <!-- END ALERTA CASO TENHA PROBLEMA NO CADASTRO DA ALTERNATIVA -->


                                <div class="form-group">
                                    <label for="IdQuestão">Alternativas</label>

                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDisciplina">
                                        Adicionar
                                    </button>    
 

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

                        </div><!-- end panel pody-->
                    
                </div>
                <!-- end panel -->
            </div>
            <!-- end  row --> 
        </div>
        <!--edn container  -->

    <!-- TESTANDO SE O USUARIO TEM PERMISSAO DE ADICIONAR DISCIPLINAS -->
    <?php if ( $_SESSION['nivel_acesso'] == 2) { ?>

    <!-- Modal -->
    <div class="modal fade" id="myModalDisciplina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title-panel">Cadastro de Alternativa</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./function/disciplina_cadastro_questao_alternativa">

                        <div class="form-group">
                            <label for="disciplina_assunto_questao_id">Questão</label>
                            <input type="text" class="form-control" name="disciplina_assunto_questao_id" required readonly value="<?php echo $disciplina_assunto_questao_id; ?>">
                        </div>

                        <div class="form-group">
                            <label for="disciplina_assunto_questao_mutipla_escolha_text">Alternativa</label>
                            <input type="text" class="form-control" name="disciplina_assunto_questao_mutipla_escolha_text" placeholder="Alternativa" required maxlength="249">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!--END TESTANDO SE O USUARIO TEM PERMISSAO DE ADICIONAR DISCIPLINAS -->


    <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>