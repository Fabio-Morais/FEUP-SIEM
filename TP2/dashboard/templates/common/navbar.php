

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a href="index.php"><img src="public/img/icon.png" class="icon ml-3"></a>
        <a class="navbar-brand" href="index.php">ExplicaFeup</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Profile-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="perfil.php">Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Menu principal</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if ($aux == 0) : ?>
                            <div class="sb-sidenav-menu-heading">Aprender</div>
                            <a class="nav-link" href="avaliacao.php">
                                <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                                Avaliação
                            </a>

                            <a class="nav-link" href="aula.php">
                                <div class="sb-nav-link-icon"><i class="fab fa-youtube"></i></div>
                                Aula
                            </a>
                            <div class="sb-sidenav-menu-heading">Notas de cursos</div>
                            <a class="nav-link" href="notas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Notas
                            </a>
                            <div class="sb-sidenav-menu-heading">Cursos</div>
                            <a class="nav-link" href="comprar_curso.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Comprar curso
                            </a>
                            <a class="nav-link" href="historico.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                Historico
                            </a>
                        <?php elseif ($aux == 1) : ?>
                            <a class="nav-link" href="alunos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                Alunos
                            </a>
                            <a class="nav-link" href="salario.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-euro-sign"></i></div>
                                Salário
                            </a>
                        <?php elseif ($aux == 2) : ?>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="estatisticas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Estatisticas
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $username ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>