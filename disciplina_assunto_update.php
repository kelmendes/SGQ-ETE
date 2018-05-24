<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';
    require './function/verificar_acesso_admin.php';


    // PEGANDO ID DA DISCIPLINA QUE SERA LISTADO OS ASSUNTO 
    $disciplina_id = (isset($_GET['id']))? $_GET['id'] : null;

    // ADICIONANDO CLASS DE ASSUNTO 
    include './class/assunto.php';

    // ESTANCIANDO A CLASS DE ASSUNTO 
    $assunto = new Assunto();

    //FAZENDO CONSULTA PELA CLASS 
    $resultado_assuntos = $assunto->listAssunto($disciplina_id);

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>

    </head>
    <body>
        <!-- ADICIONANDO A NAV BAR -->
        <?php include './template/navbar.php'; ?>
        
        <div class="container">
             <div class="row">
				 <div class="col-md-10 col-md-offset-1">
                 	<div class="panel panel-default">
                
                     <!-- panel header -->
                     <div class="panel panel-heading" id="title-panel">
						 Atualização Assunto -
                         <?php
                            echo ($resultado_assuntos['disciplina_assunto_nome']);
                         ?>
                     </div><!-- end panel header -->
                     
                     <!-- panel body -->
                     <div class="panel-body">

                        <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DOS DADOS -->
                            <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                            <?php if (isset($_SESSION['erro_msg_ATUALIZAR_ASSUNTO'])) { ?>
                               <div class="alert alert-danger" role="alert">
                                  <i class="glyphicon glyphicon-alert"></i>
                                  <?php 
                                     // EXIBINDO MESSAGEM
                                     echo $_SESSION['erro_msg_ATUALIZAR_ASSUNTO']; 
                                     // APAGANDO MESSAGEM DA SESSION
                                     unset($_SESSION['erro_msg_ATUALIZAR_ASSUNTO']);
                                  ?>
                               </div>
                            <?php } ?>
                         <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DOS DADOS  -->

                         <!-- ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DOS DADOS -->
                            <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                            <?php if (isset($_SESSION['success_msg_ATUALIZAR_ASSUNTO'])) { ?>
                               <div class="alert alert-success" role="alert">
                                  <i class="glyphicon glyphicon-ok"></i>
                                  <?php 
                                     // EXIBINDO MESSAGEM
                                     echo $_SESSION['success_msg_ATUALIZAR_ASSUNTO']; 
                                     // APAGANDO MESSAGEM DA SESSION
                                     unset($_SESSION['success_msg_ATUALIZAR_ASSUNTO']);
                                  ?>
                               </div>
                            <?php } ?>
                         <!-- END ALERTA CASO TENHA PROBLEMA NA ATUALIZACAO DOS DADOS  -->
                         
                        <!-- form atualizar -->
						<form action="./function/disciplina_assunto_atualizar" method="POST">
							<div class="form-group">
								<input type="text" class="form-control hidden" placeholder="disciplina_assunto_id" value="<?php echo $resultado_assuntos['disciplina_assunto_id']; ?>" readonly name="disciplina_assunto_id">
						  	</div>
							
							<div class="form-group">
								<label for="labelNomeDisciplina">Nome Assunto</label>
								<input type="text" class="form-control" placeholder="Nome Assunto" value="<?php echo $resultado_assuntos['disciplina_assunto_nome']; ?>" maxlength="70" required name="disciplina_assunto_nome">
						  	</div>
							
							<div class="form-group has-warning has-error">
								<label for="labelNomeDisciplina">Id Disciplina</label>
								<input type="text" class="form-control" placeholder="Id Disciplina" value="<?php echo $resultado_assuntos['disciplina_assunto_id_disciplina']; ?>" maxlength="15" required name="disciplina_assunto_id_disciplina">
						  	</div>
							

                     
                     </div><!-- end panel body -->
                     
                     <!-- panel footer -->
                     <div class="panel-footer">
                        <input type="submit" value="Atualizar" class="btn btn-success" ">
                        <input type="reset" value="Limpar" class="btn btn-primary">
						</form><!-- end form atualizar -->
                      </div><!-- end panel footer -->
                     

                     
                 </div><!-- end panel panel-default -->
        		 </div>
            </div><!-- end  row --> 
        </div><!--edn container  -->


    <!-- ADICIONANDO HEADER PADRÃO -->
    <?php include './template/footer.php'; ?>
    </body>
</html>