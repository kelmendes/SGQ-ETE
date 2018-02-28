<!DOCTYPE html>
<html>
   <head>
      <title>Projeto Integrador I</title>
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
               <form action="" method="">
                  <div class="input-group">
                     <!-- Email -->
                     <input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
                     <span class="input-group-addon" id="basic-addon2">@ete.edu.com.br</span>
                  </div>
                  <!-- end input email group -->
                  <br/>
                  <div class="input-group">
                     <!-- Celular -->
                     <span class="input-group-addon" id="sizing-addon2">Senha</span>
                     <input type="text" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
                  </div>
                  <!-- end input celular group -->
                  <br/>
                  <a href="./home" class="button btn btn-primary" role="button" type="submit" >Enviar!</a>
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