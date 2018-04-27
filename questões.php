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
                <div class="col-md-9">
                    <div class="panel  panel-default">
                        <div class="panel-heading" id="title-panel">
                            <?php echo ucwords(strtolower($resultado_assunto['disciplina_nome'])); ?> 
                            - 
                            <?php echo $resultado_assunto['disciplina_assunto_nome']; ?>      
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
                                                            echo '<i class="glyphicon glyphicon-list">';
                                                            //echo " DESCRITIVA";
                                                            echo '</i>';
                                                        } else {
                                                            echo '<i class="glyphicon glyphicon-ok-circle">';
                                                            //echo " MULTIPLA ESCOLHA";
                                                            echo '</i>';
                                                        }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-xs btn-primary" role="button">View</a>
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
      <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>