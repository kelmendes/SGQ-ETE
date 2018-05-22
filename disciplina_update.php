<?php
    // VERIFICAR SE O USUARIO ESTA AUTENTICADO 
    require './function/verificar_login.php';
    require './function/verificar_acesso_admin.php';


    // PEGANDO O ID DA DISCIPLINA 
    $id_disciplina = isset($_GET['id'])? $_GET['id'] : null;



    // ADICIONANDO A CLASS
    include './class/disciplina.php';

    // CRIANDO OBJETO 
    $disciplina = new Disciplina();
    
    // RESULTADO DA CONSULTA 
    $resultado_disciplina = $disciplina->listDisciplinasUpdate($id_disciplina);

    
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
						 Atualização Disciplina -
                         <?php
                            echo ($resultado_disciplina['disciplina_nome']);
                         ?>
                     </div><!-- end panel header -->
                     
                     <!-- panel body -->
                     <div class="panel-body">
                         
                        <!-- form atualizar -->
						<form action="#" method="POST">
							<div class="form-group">
								<input type="text" class="form-control hidden" placeholder="Identificação Disciplina" value="<?php echo $resultado_disciplina['disciplina_id']; ?>" readonly>
						  	</div>
							
							<div class="form-group">
								<label for="labelNomeDisciplina">Nome Disciplina</label>
								<input type="text" class="form-control" placeholder="Nome Disciplina" value="<?php echo $resultado_disciplina['disciplina_nome']; ?>" maxlength="70" required>
						  	</div>
							
							<div class="form-group">
								<label for="labelNomeDisciplina">Nome Disciplina - Abreviado</label>
								<input type="text" class="form-control" placeholder="Nome Abreviado" value="<?php echo $resultado_disciplina['disciplina_nome']; ?>" maxlength="15" required>
						  	</div>
							
							<div class="form-group">
								<label for="labelAbreviacaoDisciplina">Código Disciplina</label>
								<input type="text" class="form-control" placeholder="Código Disciplina" value="<?php echo $resultado_disciplina['disciplina_nome_abreviacao']; ?>" maxlength="11" required>
						  	</div>
								
                     
                     </div><!-- end panel body -->
                     
                     <!-- panel footer -->
                     <div class="panel-footer">
                        <input type="submit" value="Atualizar" class="btn btn-success">
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