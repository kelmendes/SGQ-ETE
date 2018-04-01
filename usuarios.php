<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // ADICIONANDO CLASS RESPONSAVEL POR LISTAR DISCIPLINAS 
    include './class/usuario.php';

    // ESTANCIANDO A CLASS 
    $usuarios = new Usuario();

    // PEGANDO RESULTADO DA CONSULTA 
    $resultado_usuarios = $usuarios->listUser();

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
                                    <!-- TESTANDO SE O RESULTADO DA CONSULTA FOI BEM SUCEDIDA PARA PODER PERCORRER O ARRAY -->
                                    <?php if ($resultado_usuarios) { ?>

                                        <?php  while($rows_usuarios = $resultado_usuarios->fetch(PDO::FETCH_ASSOC)) {?>
                                            <!-- Parte a ser repetida no while -->
                                            <tr>
                                                <td><?php echo ($rows_usuarios['user_id']); ?></td>
                                                <td><?php echo ($rows_usuarios['user_matricula']); ?></td>
                                                <td><?php echo ($rows_usuarios['user_nome']); ?></td>
                                                <td>
                                                    <?php 
                                                        if ($rows_usuarios['user_role'] = 1 ){
                                                            echo "Padrão";
                                                        }elseif($rows_usuarios['user_role'] = 2){
                                                            echo "Administrador";
                                                        }else{
                                                            echo "Não foi possível definir.";
                                                        } 
                                                    ?>      
                                                </td>
                                                <td><?php echo ($rows_usuarios['user_create_at']); ?></td>
                                                <td><?php echo ($rows_usuarios['user_update_at']); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-xs">Editar</a>
                                                    <a href="#" class="btn btn-danger btn-xs">Deletar</a>
                                                </td>
                                            </tr>
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
        <!--edn container  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>