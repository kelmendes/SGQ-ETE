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
                        <div class="panel-heading" id="title-panel">
                            Usuários
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModal">
                                Adicionar Usuário
                            </button>
                        </div>
                        <div class="panel-body">
                            
                            <ol class="breadcrumb">
                                <li>
                                    Sistema
                                </li>
                                <li class="active">
                                    Usuários
                                </li>
                            </ol>

                            <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['erro_msg_CADASTRO_USUARIO'])) { ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_CADASTRO_USUARIO']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_CADASTRO_USUARIO']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->

                             <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php if (isset($_SESSION['success_msg_CADASTRO_USUARIO'])) { ?>
                                   <div class="alert alert-success" role="alert">
                                      <i class="glyphicon glyphicon-ok"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['success_msg_CADASTRO_USUARIO']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['success_msg_CADASTRO_USUARIO']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->



                            <table class="table table-condensed">
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
                                                        if ($rows_usuarios['user_role'] == 1 ){
                                                            echo "Padrão";
                                                        }elseif($rows_usuarios['user_role'] == 2){
                                                            echo "Administrador";
                                                        }else{
                                                            echo "Não foi possível definir.";
                                                        } 
                                                    ?>      
                                                </td>
                                                <td><?php echo ($rows_usuarios['user_create_at']); ?></td>
                                                <td><?php echo ($rows_usuarios['user_update_at']); ?></td>
                                                <td>
                                                    <a href="./usuarios_edit?user=<?php echo ($rows_usuarios['user_id']); ?>" class="btn btn-primary btn-xs">Editar</a>

                                                    <!-- USUARIO FORM COM DADOS OCULTOS PARA USAR METHOD POST -->
                                                    <form method="POST" action="./function/usuario_cadastro_deletar">
                                                        
                                                        <input type="text" name="user_id" value="<?php echo ($rows_usuarios['user_id']); ?>" hidden>
                                                        <input type="submit" class="btn btn-danger btn-xs" value="Deletar">

                                                    </form>

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

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="title-panel">Cadastro de Usuário</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="./function/usuario_cadastro">
                            <div class="form-group">
                                <label for="user_matricula">Matrícula</label>
                                <input type="text" class="form-control" name="user_matricula" placeholder="Matrícula" required maxlength="11">
                            </div>

                            <div class="form-group">
                                <label for="user_nome">Nome Completo</label>
                                <input type="text" class="form-control" name="user_nome" placeholder="Nome Completo" required maxlength="60">
                            </div>

                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" class="form-control" name="user_email" placeholder="Email" required maxlength="100">
                            </div>

                            <div class="form-group">
                                <label for="user_role">Permissão</label>
                                <input type="text" class="form-control" name="user_role" placeholder="Email" required maxlength="100">
                            </div>

                            <div class="form-group">
                                <label for="user_senha">Senha</label>
                                <input type="password" class="form-control" name="user_senha" placeholder="Senha" required maxlength="20">
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

        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/footer.php'; ?>
    </body>
</html>