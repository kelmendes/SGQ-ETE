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
    $resultado_valor = $conn->showInfo('1');

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
                <div class="col-md-8 col-md-offset-2">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Editar perfil </h3>
                        </div>
                        <div class="panel-body">
                        
                            <form>
                                <div class="form-group">
                                    <label for="idUserProfile">Identificação</label>
                                    <input type="text" name="user_id" class="form-control" id="idUserProfile" value="<?php echo($resultado_valor['user_id']); ?>" readonly required>
                                </div><!-- END FORM-GROUP ID USER -->

                                <div class="form-group">
                                    <label for="matriculaUserProfile">Matrícula</label>
                                    <input type="text" name="user_matricula" class="form-control" id="matriculaUserProfile" value="<?php echo($resultado_valor['user_matricula']); ?>" required maxlength="11">
                                </div><!-- END FORM-GROUP MATRICULA USER -->

                                <div class="form-group">
                                    <label for="nomeUserProfile">Nome</label>
                                    <input type="text" name="user_nome" class="form-control" id="nomeUserProfile" value="<?php echo($resultado_valor['user_nome']); ?>" required maxlength="100">
                                </div><!-- END FORM-GROUP NOME USER -->

                                <div class="form-group">
                                    <label for="emailUserProfile">Email</label>
                                    <input type="email" name="user_email" class="form-control" id="emailUserProfile" value="<?php echo($resultado_valor['user_email']); ?>" required maxlength="150">
                                </div><!-- END FORM-GROUP EMAIL USER -->

                                <div class="form-group">
                                    <label for="passwordUserProfile">Password</label>
                                    <input type="password" name="user_senha" class="form-control" id="passwordUserProfile" placeholder="Password" maxlength="20">
                                </div><!-- END FORM-GROUP PASSWORD USER -->
                                
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>

                            </form><!-- END FORMULARIO DE DADOS PROFILE -->

                        </div>                        
                    </div> <!-- PANEL EDIT PROFILE -->
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