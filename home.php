<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // ADICIONANDO CLASS RESPONSAVEL POR LISTAR DISCIPLINAS 
    include './class/disciplina.php';

    // ESTANCIANDO A CLASS 
    $disciplina = new Disciplina();

    // PEGANDO RESULTADO DA CONSULTA 
    $resultado_disciplana = $disciplina->listDisciplinas();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>

    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>

        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="title-panel">
                            <div class="col-md-11">Disciplinas</div>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDisciplina">
                                Adicionar
                            </button>
                        </div>
                        <div class="panel-body">
                            
                            <ol class="breadcrumb">
                                <li class="active">
                                    Disciplinas
                                </li>
                            </ol>

                            <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['erro_msg_CADASTRO_DISCIPLINA'])) { ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_CADASTRO_DISCIPLINA']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_CADASTRO_DISCIPLINA']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->

                             <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['success_msg_CADASTRO_DISCIPLINA'])) { ?>
                                   <div class="alert alert-success" role="alert">
                                      <i class="glyphicon glyphicon-ok"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['success_msg_CADASTRO_DISCIPLINA']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['success_msg_CADASTRO_DISCIPLINA']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->
                            
                            <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA PARA PODER PERCORRER O ARRAY -->
                           <?php if ($resultado_disciplana) { ?>

                                <?php  while($rows_disciplinas = $resultado_disciplana->fetch(PDO::FETCH_ASSOC)) {?>
                                    <!-- Parte a ser repetida no while -->
                                    <ul class="list-group">
                                        <a href="./assunto?disciplina=<?php echo $rows_disciplinas['disciplina_id']; ?>" class="list-group-item">

                                            <span class="badge">
                                                <!-- EXIBIR QUANTIDADE DE ASSUNTOS CADASTRADOS -->
                                                Assuntos: 
                                                <?php echo $rows_disciplinas['disciplina_total_assunto']; ?>
                                            </span>

                                            <?php echo "<b>" . strtoupper($rows_disciplinas['disciplina_nome']) . "</b>"; ?>


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

        <!-- Modal -->
        <div class="modal fade" id="myModalDisciplina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="title-panel">Cadastro de Disciplina</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="./function/disciplina_cadastro">
                            <div class="form-group">
                                <label for="disciplina_codigo">Código Disciplina</label>
                                <input type="text" class="form-control" name="disciplina_codigo" placeholder="Código Disciplina" required maxlength="11">
                            </div>

                            <div class="form-group">
                                <label for="disciplina_nome">Nome</label>
                                <input type="text" class="form-control" name="disciplina_nome" placeholder="Nome" required maxlength="70">
                            </div>

                            <div class="form-group">
                                <label for="disciplina_nome_abreviacao">Sigla Disciplina</label>
                                <input type="text" class="form-control" name="disciplina_nome_abreviacao" placeholder="Sigla Disciplina" required maxlength="15">
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



        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/footer.php'; ?>
    </body>
</html>