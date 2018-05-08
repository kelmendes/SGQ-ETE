<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';
    require './function/verificar_acesso_admin.php';

    // ADICIONANDO CLASS RESPONSAVEL POR LISTAR DISCIPLINAS 
    include './class/disciplina.php';

    // ESTANCIANDO A CLASS 
    $disciplina = new Disciplina();

    // PEGANDO RESULTADO DA CONSULTA 
    $resultado_disciplana = $disciplina->listDisciplinas();

    // PEGANDO ID DO USUARIO LOGADO 
    $id_user = $_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Deletar Disciplina</title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>
    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>

        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-11">
                    <div class="panel panel-danger">
                        <div class="panel-heading" id="title-panel">
                            Disciplinas
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

                            <table class="table table-condensed table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Assuntos</th>
                                    <th>Criado em</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA PARA PODER PERCORRER O ARRAY -->
                                    <?php if ($resultado_disciplana) { ?>

                                        <?php  while($rows_disciplinas = $resultado_disciplana->fetch(PDO::FETCH_ASSOC)) {?>
                                            <!-- Parte a ser repetida no while -->
                                            <tr>
                                                <td><?php echo $rows_disciplinas['disciplina_id']; ?></td>
                                                <td><?php echo $rows_disciplinas['disciplina_codigo']; ?></td>
                                                <td><?php echo "<b>" . strtoupper($rows_disciplinas['disciplina_nome']) . "</b>"; ?></td>
                                                <td><?php echo $rows_disciplinas['disciplina_total_assunto']; ?></td>
                                                <td><?php echo $rows_disciplinas['disciplina_create_at']; ?></td>
                                                <td>
                                                    <a href="./function/disciplina_cadastro_deletar?id=<?php echo $rows_disciplinas['disciplina_id']; ?>" class="btn btn-xs btn-danger">
                                                        <span class="glyphicon glyphicon-trash"></span>
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
                </div>
                <!-- end col-md-6 --> 
            </div>
            <!-- end  row --> 
        </div>

        <!-- ADICIONANDO FOOTER PADRÃO -->
        <?php include './template/footer.php'; ?>
    </body>
</html>