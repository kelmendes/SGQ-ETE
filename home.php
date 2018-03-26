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

        <div class="container">
             <div class="row" >
                  <div class="col-md-9">
                     <div class="panel panel-primary">
                          <div class="panel-heading" id="title-panel">Disciplinas</div>
                          <div class="panel-body">
                            
                            <ol class="breadcrumb">
                                <li class="active"><a href="./home">Disciplinas</a></li>
                           </ol>
                           <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA PARA PODER PERCORRER O ARRAY -->
                           <?php if ($resultado_disciplana) { ?>

                                <?php  while($rows_disciplinas = $resultado_disciplana->fetch(PDO::FETCH_ASSOC)) {?>
                                    <!-- Parte a ser repetida no while -->
                                    <ul class="list-group">
                                        <a href="./assunto?disciplina=<?php echo $rows_disciplinas['disciplina_id']; ?>" class="list-group-item">
                                            <span class="badge">
                                                <!-- EXIBIR QUANTIDADE DE ASSUNTOS CADASTRADOS -->
                                                <?php echo $rows_disciplinas['disciplina_id']; ?>
                                            </span>
                                            <?php echo $rows_disciplinas['disciplina_nome']; ?>
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

                  <div class="panel panel-primary">
                    <div class="panel-heading" id="title-panel-select">Provas Anteriores</div>
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