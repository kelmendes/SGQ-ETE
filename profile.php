<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';

    // PEGANDO O ID DO USUARIO
    $idUser = $_SESSION['id_usuario'];

    // PEGAR OS DADOS DO USUARIO NO DB

    // ADICIONANDO A CLASSE QUE IRA VALIDAR OS USUARIOS 
    include './class/profile.php';

    // ESTANCIANDO A CLASSE 
    $conn = new Profile();

    // TESTANDO RESULTADO DA CONSULTA 
    $resultado_valor = $conn->showInfo($idUser);

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

        <div class="container-fluid">
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
                                   if (isset($_SESSION['erro_msg_DADOS_CONTA'])) {
                                ?>
                                   <div class="alert alert-danger" role="alert">
                                      <i class="glyphicon glyphicon-alert"></i>
                                      <?php 
                                         // EXIBINDO MESSAGEM
                                         echo $_SESSION['erro_msg_DADOS_CONTA']; 
                                         // APAGANDO MESSAGEM DA SESSION
                                         unset($_SESSION['erro_msg_DADOS_CONTA']);
                                      ?>
                                   </div>
                                <?php } ?>
                             <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DE DADOS DA CONTA  -->
                        
                            <form action="./function/profile_dados_conta" method="POST">
                                <div class="form-group">
                                    <!-- <label for="idUserProfile">Identificação</label> -->
                                    <input type="hidden" name="user_id" class="form-control" id="idUserProfile" value="<?php echo($resultado_valor['user_id']); ?>" readonly required hidden>
                                </div><!-- END FORM-GROUP ID USER -->

                                <div class="form-group">
                                    <label for="matriculaUserProfile">Matrícula</label>
                                    <input type="text" name="user_matricula" class="form-control" id="matriculaUserProfile" value="<?php echo($resultado_valor['user_matricula']); ?>" required readonly maxlength="11">
                                </div><!-- END FORM-GROUP MATRICULA USER -->

                                <div class="form-group">
                                    <label for="nomeUserProfile">Nome</label>
                                    <input type="text" name="user_nome" class="form-control" id="nomeUserProfile" value="<?php echo($resultado_valor['user_nome']); ?>" required maxlength="60">
                                </div><!-- END FORM-GROUP NOME USER -->

                                <div class="form-group">
                                    <label for="emailUserProfile">Email</label>
                                    <input type="email" name="user_email" class="form-control" id="emailUserProfile" value="<?php echo($resultado_valor['user_email']); ?>" required maxlength="100">
                                </div><!-- END FORM-GROUP EMAIL USER -->
                                
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
                        
                            <form action="./function/profile_password" method="POST">

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