        <!-- ======= NAV BAR =========-->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ETE Palmares</a>

                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="./home">Home</a>
                    </li>

                    <?php if ( $_SESSION['nivel_acesso'] == 2) { ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sistema<span class="caret"></span></a>
                            <ul class="dropdown-menu">

                                <li>
                                    <a href="./usuarios">Usuários</a>
                                </li>
                                
                                <li role="separator" class="divider"></li>

                                <li>
                                    <a href="deletar_disciplina">Disciplianas</a>
                                </li>
                                
                            </ul> 
                        </li> 

                    <?php } ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo strstr($_SESSION['nome_usuario'], ' ', true); ?>

                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="./profile">Profile</a>
                            </li>
                            
                            <li role="separator" class="divider"></li>

                            <li>
                                <a href="./function/logout">Logout</a>
                            </li>
                            
                        </ul> 
                    </li> 
                </ul>

            </div>
            <!-- end container -->
        </nav>
        <!-- END NAV BAR -->