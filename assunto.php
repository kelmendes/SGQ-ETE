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
        <div class="container">
             <div class="row" >
                  <div class="col-md-9">
                        <div class="panel  panel-default">
                            <div class="panel-heading" id="title-panel">
                                <?php echo ucwords(strtolower($resultado_disciplina['disciplina_nome'])); ?>
                                -
                                Assuntos
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

                                <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA -->
                                <?php if ($resultado_assuntos) { ?>

                                    <?php  while($rows_assuntos = $resultado_assuntos->fetch(PDO::FETCH_ASSOC)) {?>
                                     <!-- Parte a ser repetida no while -->
                                     <ul class="list-group">
                                            <a href="./questões?assunto=<?php echo $rows_assuntos['disciplina_assunto_id']; ?>" class="list-group-item">
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.js"></script>
    </body>
</html>