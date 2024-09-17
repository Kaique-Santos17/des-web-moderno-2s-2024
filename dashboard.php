<?php
session_start();
require_once('sys/config.php');

if (!isset($_SESSION["id"])) {
    header("location: login");

    die();
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow">
    <title>Sistema</title>

    <link rel="shortcut icon" type="image/x-icon" href="https://preskool.dreamstechnologies.com/html/template/assets/img/favicon.png">


    <link rel="stylesheet" href="https://preskool.dreamstechnologies.com/html/template/assets/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css" integrity="sha512-tpsEzNMLQS7w9imFSjbEOHdZav3/aObSESAL1y5jyJDoICFF2YwEdAHOPdOr1t+h8hTzar0flphxR76pd0V1zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://preskool.dreamstechnologies.com/html/template/assets/css/style.css">
</head>

<body>
    <div id="global-loader">
        <div class="page-loader"></div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                LearningTrack
                <a id="toggle_btn" href="javascript:void(0);">
                    <i class="ti ti-menu-deep"></i>
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <div class="header-user">
                <div class="nav user-menu">

                    <div class="nav-item nav-search-inputs me-auto">
                        <div class="top-nav-search">
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown me-2">
                            <a href="#" class="btn btn-outline-light fw-normal bg-white d-flex align-items-center p-2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-calendar-due me-1"></i><?php echo $_SESSION['cargo']; ?> - Matrícula: XXXX
                            </a>
                        </div>
                    </div>


                    <div class="pe-1">
                        <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" id="btnFullscreen">
                            <i class="ti ti-maximize"></i>
                        </a>
                    </div>
                    <div class="dropdown ms-1">
                        <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                            <span class="avatar avatar-md rounded">
                                <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/profiles/avatar-27.jpg" alt="Img" class="img-fluid">
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="d-block">
                                <div class="d-flex align-items-center p-2">
                                    <span class="avatar avatar-md me-2 online avatar-rounded">
                                        <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/profiles/avatar-27.jpg" alt="img">
                                    </span>
                                    <div>
                                        <h6 class><?php echo $_SESSION['nome']; ?> </h6>
                                        <p class="text-primary mb-0"><?php echo $_SESSION['cargo']; ?> </p>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <a class="dropdown-item d-inline-flex align-items-center p-2" href="#">
                                    <i class="ti ti-user-circle me-2"></i>Meu Perfil</a>
                                <a class="dropdown-item d-inline-flex align-items-center p-2" href="#"><i class="me-2"></i>Ajustes</a>
                                <hr class="m-0">
                                <a class="dropdown-item d-inline-flex align-items-center p-2" href="sair"><i class="ti ti-login me-2"></i>Desconectar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dropdown mobile-user-menu">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#">My Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="sair">Logout</a>
            </div>
        </div>

    </div>


    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li>
                        <h6 class="submenu-hdr"><span>Principal</span></h6>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop active"><i class="fa fa-home"></i><span>Dashboard</span></a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="page-wrapper">
        <div class="content">

            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">Admin Dashboard</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="https://preskool.dreamstechnologies.com/html/template/index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Painel Administrativo</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">


                    <div class="card bg-dark">
                        <div class="overlay-img">
                            <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-04.png" alt="img" class="img-fluid shape-01">
                            <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-01.png" alt="img" class="img-fluid shape-02">
                            <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-02.png" alt="img" class="img-fluid shape-03">
                            <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/bg/shape-03.png" alt="img" class="img-fluid shape-04">
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-xl-center justify-content-xl-between flex-xl-row flex-column">
                                <div class="mb-3 mb-xl-0">
                                    <div class="d-flex align-items-center flex-wrap mb-2">
                                        <h1 class="text-white me-2">Bem Vindo de Volta <?php echo $_SESSION['nome']; ?> - <?php echo $_SESSION['matricula']; ?></h1>
                                        <a href="https://preskool.dreamstechnologies.com/html/template/profile.html" class="avatar avatar-sm img-rounded bg-gray-800 dark-hover"><i class="ti ti-edit text-white"></i></a>
                                    </div>
                                    <p class="text-white">Tenha um ótimo dia!</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>




            <script src="https://preskool.dreamstechnologies.com/html/template/assets/js/jquery-3.7.1.min.js" type="80439099ac4207603206daaf-text/javascript"></script>

            <script src="https://preskool.dreamstechnologies.com/html/template/assets/js/bootstrap.bundle.min.js" type="80439099ac4207603206daaf-text/javascript"></script>

            <script src="https://preskool.dreamstechnologies.com/html/template/assets/js/feather.min.js" type="80439099ac4207603206daaf-text/javascript"></script>

            <script src="https://preskool.dreamstechnologies.com/html/template/assets/js/jquery.slimscroll.min.js" type="80439099ac4207603206daaf-text/javascript"></script>

            <script src="https://preskool.dreamstechnologies.com/html/template/assets/js/script.js" type="80439099ac4207603206daaf-text/javascript"></script>
            <script src="https://preskool.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="80439099ac4207603206daaf-|49" defer></script>
</body>

</html>