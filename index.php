<!DOCTYPE html>
<html>
   <head>
      <title>Login</title>
        <!-- ADICIONANDO HEADER PADRÃO -->
        <?php include './template/header.php'; ?>
   </head>
   <body>
      <!-- ======================
         ===== NAV BAR =========
       -->
      <nav class="navbar navbar-inverse navbar-static-top">
         <div class="container">
            <a class="navbar-brand" href="#">ETE Palmares</a>				
         </div>
         <!-- end container -->
      </nav>
      <!-- END NAV BAR -->
      <div class="container">
         <div class="col-md-8  col-md-offset-2">
            <div class="jumbotron">
               <h1>Login</h1>
               <form action="./function/login" method="POST">
                  <div class="form-group">

                     <!-- ALERTA CASO TENHA PROBLEMA NO LOGIN -->
                        <!-- TESTAR SE SESSION ERRO LOGIN EXISTE -->
                        <?php
                           session_start();
                           if (isset($_SESSION['erro_msg'])) {
                        ?>
                           <div class="alert alert-danger" role="alert">
                              <i class="glyphicon glyphicon-alert"></i>
                              <?php 
                                 // EXIBINDO MESSAGEM
                                 echo $_SESSION['erro_msg']; 
                                 // APAGANDO MESSAGEM DA SESSION
                                 unset($_SESSION['erro_msg']);
                              ?>
                           </div>
                        <?php } ?>
                     <!-- END ALERTA CASO TENHA PROBLEMA NO LOGIN -->


                     <!-- USER NAME INPUT -->
                     <label for="inputLabelMatricula">Matrícula</label>
                     <input type="text" name="username" class="form-control" placeholder="Matrícula" aria-describedby="inputLoginUserName" required maxlength="11">

                     <!-- PASSWORD INPUT -->
                     <label for="inputLabelPassword">Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="inputLoginPassword" required maxlength="25">
                  </div>
                  <!-- end input celular group -->
                  <br/>
                  <input type="submit" name="Acessar" class="button btn btn-primary">
               </form>
               <!-- end formulário -->
            </div>
            <!-- end Jumbotron login -->
         </div><!-- end col-md --> 		
      </div>
      <!-- end container -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.js"></script>
   </body>
</html>