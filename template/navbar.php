        <!-- ======= NAV BAR =========-->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <a class="navbar-brand" href="#">ETE Palmares</a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./home">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nome_usuario']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="./profile">Profile</a>
                            </li>
                            <li>
                                <a href="#">Mensagens</a>
                            </li>
                            <li>
                                <a href="#">Questões cadastradas</a>
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