<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile </title>
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
                           <!-- Parte a ser repetida no while -->
                            <div class="panel panel-default" >
                                  <div class="panel-heading"><a href="./assunto">[Disciplina 1]</a></div>
                            </div>
                            <!-- END parte a ser repetida no while -->

                            <!-- Parte a ser repetida no while -->
                            <div class="panel panel-default" >
                                  <div class="panel-heading"><a href="./assunto">[Disciplina 2]</a></div>
                            </div>
                            <!-- END parte a ser repetida no while -->

                            <!-- Parte a ser repetida no while -->
                            <div class="panel panel-default" >
                                  <div class="panel-heading"><a href="./assunto">[Disciplina 3]</a></div>
                            </div>
                            <!-- END parte a ser repetida no while -->

                            <!-- Parte a ser repetida no while -->
                            <div class="panel panel-default" >
                                  <div class="panel-heading"><a href="./assunto">[Disciplina 4]</a></div>
                            </div>
                            <!-- END parte a ser repetida no while -->
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