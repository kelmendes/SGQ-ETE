<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Integrador I</title>
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
                    <div class="jumbotron">
                        <div class="page-header">
                            <h1>  Questões - <small> Assunto </small></h1>
                        </div>
                        <ol class="breadcrumb">
                            <li><a href="./home">Disciplinas</a></li>
                            <li><a href="./assunto">Assuto</a></li>
                            <li class="active" ><a href="#">Questões</a></li>
                        </ol>
                        <!-- Parte a ser repetida no while -->
                        <div class="panel panel-default" >
                              <div class="panel-heading"><a href="#">[Assunto 1]</a></div>
                        </div>
                        <!-- END parte a ser repetida no while -->


                        <!-- end jumbuttom -->
                    </div>
                    <!-- end Jumbotron login -->
                </div>
                <!-- end col-md-6 --> 

                <div class="col-md-3">
                  <div class="jumbotron">
                     <h3 style="text-align: center;"> Questões Selecionadas</h3>
                  </div>
                  <!-- end jumbotron questões selecioandas -->
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