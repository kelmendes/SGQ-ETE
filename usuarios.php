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
        <title>Usuários</title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>

    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>

        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="title-panel">Usuários</div>
                        <div class="panel-body">
                            
                            <ol class="breadcrumb">
                                <li>
                                    Sistema
                                </li>
                                <li class="active">
                                    Usuários
                                </li>
                            </ol>

                            <table class="table">
                                <thead>
                                    <th>ID</th>
                                    <th>MATRICULA</th>
                                    <th>NOME</th>
                                    <th>PERMISSÃO</th>
                                    <th>CREAT AT</th>
                                    <th>UPDATE AT</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>##</td>
                                        <td>########</td>
                                        <td>#################</td>
                                        <td>######</td>
                                        <td>########</td>
                                        <td>########</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-xs">Editar</a>
                                            <a href="#" class="btn btn-danger btn-xs">Deletar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                <!-- end col-md-6 --> 

            </div>
            <!-- end  row --> 
        </div>
        <!--edn container  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>