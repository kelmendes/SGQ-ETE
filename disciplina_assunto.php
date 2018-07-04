<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';
    require './function/verificar_acesso_admin.php';

   // PEGANDO ID DA DISCIPLINA QUE SERA LISTADO OS ASSUNTO 
    $disciplina_id = (isset($_GET['id']))? $_GET['id'] : null;

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
        <title>Deletar Assunto Disciplina</title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>
    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>

        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading" id="title-panel">
                            Disciplinas
                        </div>
                        <div class="panel-body">
                            
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./deletar_disciplina">
                                        Disciplinas
                                    </a>
                                </li>
                                <li class="active">
                                    <?php echo $resultado_disciplina['disciplina_nome_abreviacao']; ?>
                                </li>
                            </ol>

                            <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['erro_msg_DELETAR_ASSUNTO'])) { ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_DELETAR_ASSUNTO']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_DELETAR_ASSUNTO']);
                                      ?>
                                   </div>
                                <?php } ?>
                            <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->

                            <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['success_msg_DELETAR_ASSUNTO'])) { ?>
                                   <div class="alert alert-success" role="alert">
                                      <i class="glyphicon glyphicon-ok"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['success_msg_DELETAR_ASSUNTO']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['success_msg_DELETAR_ASSUNTO']);
                                      ?>
                                   </div>
                                <?php } ?>
                            <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->

                            <table class="table table-condensed table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Questões</th>
                                    <th>Criado em</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA PARA PODER PERCORRER O ARRAY -->
                                    <?php if ($resultado_assuntos) { ?>

                                        <?php  while($rows_assuntos = $resultado_assuntos->fetch(PDO::FETCH_ASSOC)) {?>
                                            <!-- Parte a ser repetida no while -->
                                            <tr>
                                                <td><?php echo $rows_assuntos['disciplina_assunto_id']; ?></td>
                                                <td>
                                                    <?php
                                                        $encoding = mb_internal_encoding();
                                                        echo "<b>" . mb_strtoupper($rows_assuntos['disciplina_assunto_nome'], $encoding ) . "</b>"; ?>
                                                </td>
                                                <td><?php echo $rows_assuntos['assunto_total_questoes']; ?></td>
                                                <td><?php echo $rows_assuntos['disciplina_assunto_create_at']; ?></td>
                                                <td>
                                                    <a href="./function/disciplina_assunto_deletar?id=<?php echo $rows_assuntos['disciplina_assunto_id']; ?>" class="btn btn-xs btn-danger">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                    
                                                    
                                                    <a href="./disciplina_assunto_update?id=<?php echo $rows_assuntos['disciplina_assunto_id']; ?>" class="btn btn-xs btn-info">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                    
                                                    
                                                </td>
                                            </tr>
                                            <!-- END parte a ser repetida no while -->
                                        <?php } ?>

                                    <?php } ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                    <nav aria-label="pagination nav">
                        <ul class="pager">
                            <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span>Previous</a></li>
                            <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav><!-- end pagination nav -->

                </div><!-- end col-md-6 --> 
            </div><!-- end  row --> 
        </div>

        <!-- ADICIONANDO FOOTER PADRÃO -->
        <?php include './template/footer.php'; ?>
    </body>
</html>