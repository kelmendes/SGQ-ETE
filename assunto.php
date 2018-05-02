<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // PEGANDO ID DA DISCIPLINA QUE SERA LISTADO OS ASSUNTO 
    $disciplina_id = (isset($_GET['disciplina']))? $_GET['disciplina'] : null;

    // ADICIONANDO CLASS DE ASSUNTO 
    include './class/assunto.php';

    // ESTANCIANDO A CLASS DE ASSUNTO 
    $assunto = new Assunto();

    // PEGANDO DADOS DA DISCIPLINA PARA EXIBIR NA PAGINA 
    $resultado_disciplina = $assunto->getInfoDisciplina($disciplina_id);

    //FAZENDO CONSULTA PELA CLASS 
    $resultado_assuntos = $assunto->listAssuntos($disciplina_id);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Assunto - <?php echo $resultado_disciplina['disciplina_nome_abreviacao']; ?></title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>
    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>

        <!-- END NAV BAR -->
        <div class="container-fluid">
             <div class="row" >
                  <div class="col-md-9">
                        <div class="panel  panel-default">
                            <div class="panel-heading" id="title-panel">
                                <?php echo mb_strimwidth($resultado_disciplina['disciplina_nome'], 0, 35, "..."); ?>
                                    -
                                Assuntos

                                <!-- TESTANDO SE O USUARIO TEM PERMISSAO DE ADICIONAR DISCIPLINAS -->
                                <?php if ( $_SESSION['nivel_acesso'] == 2) { ?>
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDisciplina">
                                        Adicionar
                                    </button>
                                <?php } ?>
                                <!-- END  TESTANDO SE O USUARIO TEM PERMISSAO DE ADICIONAR DISCIPLINAS -->
                                
                            </div>
                            <div class="panel-body" >
                                <ol class="breadcrumb" >
                                    <li>
                                        <a href="./home">
                                            Disciplinas
                                        </a>
                                    </li>
                                    <li class="active">
                                        <?php echo $resultado_disciplina['disciplina_nome_abreviacao']; ?>
                                    </li>
                                </ol>

                                <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['erro_msg_ASSUNTO'])) { ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_ASSUNTO']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_ASSUNTO']);
                                      ?>
                                   </div>
                                <?php } ?>
                                 <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->

                                 <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                    <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                    <?php if (isset($_SESSION['success_msg_ASSUNTO'])) { ?>
                                       <div class="alert alert-success" role="alert">
                                          <i class="glyphicon glyphicon-ok"></i>
                                          <?php 
                                             // EXIBINDO MESSAGEM
                                             echo $_SESSION['success_msg_ASSUNTO']; 
                                             // APAGANDO MESSAGEM DA SESSION
                                             unset($_SESSION['success_msg_ASSUNTO']);
                                          ?>
                                       </div>
                                    <?php } ?>
                                 <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->

                                 

                                <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA -->
                                <?php if ($resultado_assuntos) { ?>

                                    <?php  while($rows_assuntos = $resultado_assuntos->fetch(PDO::FETCH_ASSOC)) {?>
                                     <!-- Parte a ser repetida no while -->
                                     <ul class="list-group">
                                            <a href="./questoes?assunto=<?php echo $rows_assuntos['disciplina_assunto_id']; ?>" class="list-group-item">
                                                <span class="badge">
                                                    <!-- EXIBIR QUANTIDADE DE ASSUNTOS CADASTRADOS -->
                                                    Questões: 
                                                    <?php echo $rows_assuntos['assunto_total_questoes']; ?>
                                                </span>
                                                <?php echo ucwords(strtolower($rows_assuntos['disciplina_assunto_nome'])); ?>
                                            </a>
                                        </ul>
                                     <!-- END parte a ser repetida no while -->
                                    <?php } ?>
                                <?php } ?>

                            </div>
                     </div>
                </div>
                <!-- end col-md-6 --> 

                <div class="col-md-3">

                    <div class="panel panel-default" style="">
                        <div class="panel-heading" id="title-panel-select">
                            Questões Selecionadas
                        </div>
                        <div class="panel-body">
                            Panel content
                        </div>
                        <div class="panel-footer option-select">
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default">Clear All</button>
                                </div>

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default">Delete</button>
                                </div>

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default">Print</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- end div col-ms-3  Questões selecionadas -->
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
                        <h4 class="modal-title" id="title-panel">Adicionar Assunto</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="./function/disciplina_cadastro_assunto">

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="disciplina_codigo" placeholder="Código Disciplina" value=" <?php echo $disciplina_id; ?>" required maxlength="11" readonly >
                            </div>

                            <div class="form-group">
                                <label for="disciplina_assunto_nome">Nome Assunto</label>
                                <input type="text" class="form-control" name="disciplina_assunto_nome" placeholder="Nome Assunto" required maxlength="50">
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


        <!-- ADICIONANDO FOOTER PADRÃO -->
        <?php include './template/footer.php'; ?>
    </body>
</html>