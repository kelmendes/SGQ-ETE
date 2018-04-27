<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // PEGANDO ID DO USUARIO A SER EDITADO 
    $idUser = (isset($_GET['user']))? $_GET['user'] : null;

    // PEGAR OS DADOS DO USUARIO NO DB
    // ADICIONANDO A CLASSE QUE IRA VALIDAR OS USUARIOS 
    include './class/usuario.php';

    // ESTANCIANDO A CLASSE 
    $conn = new Usuario();

    // TESTANDO RESULTADO DA CONSULTA 
    $resultado_valor = $conn->listInfoUser($idUser);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editar - Usuários</title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>

    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>
        
        <div class="container">
             <div class="row" >
                <!-- PARTE DE DADOS DA CONTA -->
                <div class="col-md-7 ">
                    
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Dados da conta </h4>
                        </div>
                        <div class="panel-body">

                            <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php
                                   if (isset($_SESSION['erro_msg_UPDATE_USER'])) {
                                ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_UPDATE_USER']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_UPDATE_USER']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->

                            <!-- ALERTA CASO TENHA SIDO CADASTRADO COM SUCESSO-->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php
                                   if (isset($_SESSION['success_msg_UPDATE_USER'])) {
                                ?>
                                   <div class="alert alert-success" role="alert">
                                      <i class="glyphicon glyphicon-ok-sign"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['success_msg_UPDATE_USER']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['success_msg_UPDATE_USER']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA SIDO CADASTRADO COM SUCESSO  -->
                        
                            <form action="./function/usuario_update" method="POST">
                                <div class="form-group">
                                    <!-- <label for="idUserProfile">Identificação</label> -->
                                    <input type="hidden" name="user_id" class="form-control" id="idUserProfile" value="<?php echo($resultado_valor['user_id']); ?>" readonly required hidden>
                                </div><!-- END FORM-GROUP ID USER -->

                                <div class="form-group">
                                    <label for="matriculaUserProfile">Matrícula</label>
                                    <input type="text" name="user_matricula" class="form-control" id="matriculaUserProfile" value="<?php echo($resultado_valor['user_matricula']); ?>" required maxlength="11">
                                </div><!-- END FORM-GROUP MATRICULA USER -->

                                <div class="form-group">
                                    <label for="nomeUserProfile">Nome</label>
                                    <input type="text" name="user_nome" class="form-control" id="nomeUserProfile" value="<?php echo($resultado_valor['user_nome']); ?>" required maxlength="60">
                                </div><!-- END FORM-GROUP NOME USER -->

                                <div class="form-group">
                                    <label for="emailUserProfile">Email</label>
                                    <input type="email" name="user_email" class="form-control" id="emailUserProfile" value="<?php echo($resultado_valor['user_email']); ?>" required maxlength="100">
                                </div><!-- END FORM-GROUP EMAIL USER -->

                                 <div class="form-group">
                                    <label for="userRoleProfile">Permissão</label>
                                    <select class="form-control" name="user_role">
                                        <?php if ($resultado_valor['user_role'] == 1 ){ ?>
                                            <option value="1" >Padrão</option>
                                            <option value="2">Administração</option>
                                        <?php } else { ?>
                                            <option value="2" >Administração</option>
                                            <option value="1" >Padrão</option>
                                        <?php } ?>
                                    </select>
                                </div><!-- END FORM-GROUP USER ROLE -->
                                
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>

                            </form><!-- END FORMULARIO DE DADOS PROFILE -->

                        </div>                        
                    </div> <!-- PANEL EDIT PROFILE -->
                </div>
                <!-- end col-md-6 -->
                <!-- END PARTE DE DADOS DA CONTA -->

                <!-- PARTE DE CADASTRO DE NOVA SENHA -->
                <div class="col-md-5 ">
                    
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Password </h4>
                        </div>
                        <div class="panel-body">    

                            <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE SENHA -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php
                                   if (isset($_SESSION['erro_msg_PASSWORD'])) {
                                ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_PASSWORD']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_PASSWORD']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE SENHA  -->


                              <!-- ALERTA CASO ALTERACAO DE SENHA FOI UM SUCESSO -->
                                <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                                <?php
                                   if (isset($_SESSION['success_msg_UPDATE_USER_PASSWORD'])) {
                                ?>
                                   <div class="alert alert-success" role="alert">
                                      <i class="glyphicon glyphicon-ok-sign"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['success_msg_UPDATE_USER_PASSWORD']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['success_msg_UPDATE_USER_PASSWORD']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- ALERTA CASO ALTERACAO DE SENHA FOI UM SUCESSO -->
                        
                            <form action="./function/usuario_update_password" method="POST">

                                <div class="form-group">
                                    <!-- <label for="idUserProfile">Identificação</label> -->
                                    <input type="hidden" name="user_id" class="form-control" id="idUserProfile" value="<?php echo($resultado_valor['user_id']); ?>" readonly required hidden>
                                </div><!-- END FORM-GROUP ID USER -->

                                <div class="form-group">
                                    <label for="passwordUserProfile">New Password</label>
                                    <input type="password" name="user_senha_new" class="form-control" id="passwordUserProfile" placeholder="New Password" maxlength="20" required>
                                </div><!-- END FORM-GROUP PASSWORD USER -->

                                <div class="form-group">
                                    <label for="passwordUserProfile">Confirm Password</label>
                                    <input type="password" name="user_senha_confirm" class="form-control" id="passwordUserProfile" placeholder="Confirm Password" maxlength="20" required>
                                </div><!-- END FORM-GROUP PASSWORD USER -->
                                
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-danger">Limpar</button>

                            </form><!-- END FORMULARIO DE DADOS PROFILE -->

                        </div>                        
                    </div> <!-- PANEL EDIT PROFILE -->
                </div>
                <!-- END PARTE DE CADASTRO DE NOVA SENHA -->
            </div>
            <!-- end  row --> 
        </div>
        <!--edn container  -->


    <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>