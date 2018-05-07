<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // PEGANDO ID DA DISCIPLINA QUE SERA LISTADO OS ASSUNTO 
    $assunto_id = (isset($_GET['assunto']))? $_GET['assunto'] : null;


    // ADICIONANDO CLASS DE ASSUNTO 
    include './class/questões.php';

    // ESTANCIANDO A CLASS DE ASSUNTO 
    $questões = new Questões();

    // PEGANDO DADOS DA DISCIPLINA PARA EXIBIR NA PAGINA 
    $resultado_assunto = $questões->getInfoAssunto($assunto_id);


    // FAZENDO CONSULTA DAS QUESTOES 
    $resultado_questões = $questões->getQuestoes($assunto_id);

    // PEGANDO ID DO USUARIO LOGADO 
    $id_user = $_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Questões - <?php echo $resultado_assunto['disciplina_assunto_nome']; ?></title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>
    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>

        <!-- END NAV BAR -->
        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-8">
                    <div class="panel  panel-default">
                        <div class="panel-heading" id="title-panel">
                            <?php echo strtoupper($resultado_assunto['disciplina_nome']); ?> 
                            <!-- TESTANDO SE O USUARIO TEM PERMISSAO DE ADICIONAR DISCIPLINAS -->
                            <?php if ( $_SESSION['nivel_acesso'] == 2) { ?>
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDisciplina">
                                    Adicionar
                                </button>    
                            <?php } ?>
                            <!-- END  TESTANDO SE O USUARIO TEM PERMISSAO DE ADICIONAR DISCIPLINAS -->  
                        </div>
                        <div class="panel-body">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./home">
                                        Disciplinas
                                    </a>
                                </li>
                                <li>
                                    <a href="./assunto?disciplina=<?php echo $resultado_assunto['disciplina_id']; ?>">
                                        <?php echo $resultado_assunto['disciplina_nome_abreviacao']; ?>
                                    </a>
                                </li>
                                <li class="active" >
                                    <?php echo $resultado_assunto['disciplina_assunto_nome']; ?>
                                </li>
                            </ol>


                            <!-- ALERTA CASO TENHA PROBLEMA NO CADASTRO DA QUESTAO -->
                            <!-- TESTAR SE SESSION erro_msg_ASSUNTO EXISTE -->
                            <?php if (isset($_SESSION['erro_msg_QUESTAO'])) { ?>
                               <div class="alert alert-danger" role="alert">
                                  <i class="glyphicon glyphicon-alert"></i>
                                  <?php 
                                     // EXIBINDO MESSAGEM
                                     echo $_SESSION['erro_msg_QUESTAO']; 
                                     // APAGANDO MESSAGEM DA SESSION
                                     unset($_SESSION['erro_msg_QUESTAO']);
                                  ?>
                               </div>
                            <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NO CADASTRO DA QUESTAO -->

                             <!-- ALERTA CASO TENHA PROBLEMA NO CADASTRO DA QUESTAO -->
                                <!-- TESTAR SE SESSION success_msg_ASSUNTO EXISTE -->
                                <?php if (isset($_SESSION['success_msg_QUESTAO'])) { ?>
                                   <div class="alert alert-success" role="alert">
                                      <i class="glyphicon glyphicon-ok"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['success_msg_QUESTAO']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['success_msg_QUESTAO']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NO CADASTRO DA QUESTAO -->
                            
                            <!-- TEMPORARIO ATE DEFINIR COMO EXIBIR AS QUESTOES E A ESTRUTURA DO DB -->
                            <table class="table table-condensed">
                                <thead>
                                    <th>ID</th>
                                    <th>NOME</th>
                                    <th>CRIADO EM </th>
                                    <th>TIPO</th>
                                    <th>AÇÕES</th>
                                </thead>
                                <tbody>
                                    <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA PARA PODER PERCORRER O ARRAY -->
                                    <?php if ($resultado_questões) { ?>
                                        <?php  while($rows_questões = $resultado_questões->fetch(PDO::FETCH_ASSOC)) {?>
                                            <!-- Parte a ser repetida no while -->
                                            <tr>
                                                <td><?php echo ($rows_questões['disciplina_assunto_questao_id']); ?></td>
                                                <td><?php echo ($rows_questões['disciplina_assunto_questao_nome']); ?></td>
                                                <td><?php echo ($rows_questões['disciplina_assunto_questao_creat_at']); ?></td>
                                                <td>
                                                    <?php 
                                                        if ($rows_questões['disciplina_assunto_questao_mutipla_escolha'] == 0){
                                                            echo '
                                                            <a href="#" class="btn btn-sm btn-default" role="button">
                                                                <span class="glyphicon glyphicon-list"></span>
                                                            </a>';
                                                        } else {
                                                            echo '
                                                            <a href="#" class="btn btn-sm btn-default" role="button">
                                                                <span class="glyphicon glyphicon-ok-circle"></span>
                                                            </a>';
                                                        }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php  if ($rows_questões['disciplina_assunto_questao_mutipla_escolha'] == 0){ ?>
                                                        <a href="./questao_dissertativa?id=<?php echo ($rows_questões['disciplina_assunto_questao_id']); ?>" class="btn btn-sm btn-primary" role="button">
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="./questao_multi_escolha?id=<?php echo ($rows_questões['disciplina_assunto_questao_id']); ?>" class="btn btn-sm btn-primary" role="button">
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                        </a>
                                                    <?php } ?>  
                                                    <a href="./function/questao_selecionar?user_id=<?php echo $id_user; ?>&questao_id=<?php echo ($rows_questões['disciplina_assunto_questao_id']); ?>" class="btn btn-sm btn-success" role="button">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" role="button">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- END parte a ser repetida no while -->
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                
                            </table>

                            <!-- END TEMPORARIO ATE DEFINIR COMO EXIBIR AS QUESTOES E A ESTRUTURA DO DB -->
                        </div>
                    </div>
                </div>
                <!-- end col-md-6 --> 

                <div class="col-md-4">

                    <!-- ADICIONANDO PANEL SIDEBAR QUESTOES SELECIONADAS -->
                    <?php include './template/panel_sidebar_questoes_selecionadas.php'; ?>

                </div>
                <!-- end div col-ms-3  Questões selecionadas -->
            </div>
            <!-- end  row --> 
        </div>
    <!-- TESTANDO SE O USUARIO TEM PERMISSAO DE ADICIONAR DISCIPLINAS -->
    <?php if ( $_SESSION['nivel_acesso'] == 2) { ?>
    <!-- Modal -->
    <div class="modal fade" id="myModalDisciplina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title-panel">Cadastro de Questão</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./function/disciplina_cadastro_questao">

                        <div class="form-group">
                            <label for="disciplina_questao_id_assunto">Assunto</label>
                            <input type="text" class="form-control" name="disciplina_questao_id_assunto" required readonly value="<?php echo $assunto_id; ?>">
                        </div>


                        <div class="form-group">
                            <label for="disciplina_questao_mutipla_escolha">Tipo</label>
                            <select class="form-control" name="disciplina_questao_mutipla_escolha" required>
                                <option value="">Selecionar tipo</option>
                                <option value="0">Dissertativa</option>
                                <option value="1">Múltipla Escolha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="disciplina_questao_nome">Nome</label>
                            <input type="text" class="form-control" name="disciplina_questao_nome" placeholder="Nome" required maxlength="49">
                        </div>

                        <div class="form-group">
                            <label for="disciplinaquestao_pergunta">Pergunta</label>
                            <input type="text" class="form-control" name="disciplinaquestao_pergunta" placeholder="Pergunta" required maxlength="449">
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

    <!--edn container  -->
    <?php } ?> 

    <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>