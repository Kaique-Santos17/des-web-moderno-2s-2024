<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preskool.dreamstechnologies.com/html/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 00:25:27 GMT -->

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

    <script src="assets/js/growl-notification.min.js"></script>
    <link rel="stylesheet" href="assets/css/colored-theme.min.css">
</head>

<body class="account-page">

<script>
    function registrar() {
        var nome = $('input[type="text"]:eq(0)').val(); // Nome
        var email = $('input[type="text"]:eq(1)').val(); // E-mail
        var senha = $('input[type="password"]:eq(0)').val(); // Senha
        var confirmarSenha = $('input[type="password"]:eq(1)').val(); // Confirmar Senha
        var telefone = $('input[type="text"]:eq(2)').val(); // Telefone

        if (senha !== confirmarSenha) {
            GrowlNotification.notify({
                title: 'Erro',
                description: 'As senhas não coincidem!',
                type: 'danger',
                position: 'top-right',
                closeTimeout: 5000
            });
            return;
        }

        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText.search("Registro realizado com sucesso") != -1) {
                    GrowlNotification.notify({
                        title: 'Sucesso!',
                        description: 'Registro realizado com sucesso, bem-vindo(a) ' + nome,
                        type: 'success',
                        position: 'top-right',
                        closeTimeout: 3000
                    });
                    setTimeout(() => {
                        window.location.href = "dashboard";
                    }, 3000);
                } else {
                    GrowlNotification.notify({
                        title: 'Erro!',
                        description: xmlhttp.responseText,
                        type: 'danger',
                        position: 'top-right',
                        closeTimeout: 5000
                    });
                }
            }
        };

        xmlhttp.open("POST", "sys/cadastros.php?type=registrar", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("nome=" + nome + "&email=" + email + "&senha=" + senha + "&telefone=" + telefone);
    }
</script>


    <div class="main-wrapper">
        <div class="container-fuild">
            <div class="login-wrapper w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-background position-relative d-lg-flex align-items-center justify-content-center d-lg-block d-none flex-wrap vh-100 overflowy-auto">
                            <div>
                                <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/authentication/authentication-01.jpg" alt="Img">
                            </div>
                            <div class="authen-overlay-item  w-100 p-4">
                                <h4 class="text-white mb-3">Novidades</h4>
                                <div class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                                    <div>
                                        <h6>Adicionado um Sistema de Login</h6>
                                        <p class="mb-0 text-truncate">Cadastre e Logue a vontade.</p>
                                    </div>
                                    <a href="javascript:void(0);"><i class="ti ti-chevrons-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                            <div class="col-md-8 mx-auto p-4">
                                <form action="#">
                                    <div>
                                        <div class="card">
                                            <div class="card-body p-4">
                                                <div class=" mb-4">
                                                    <h2 class="mb-2">Registrar</h2>
                                                    <p class="mb-0">Por favor, insira suas informações</p>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="mb-3 ">
                                                        <label class="form-label">Nome</label>
                                                        <div class="input-icon mb-3 position-relative">
                                                            <span class="input-icon-addon">
                                                                <i class="ti ti-user"></i>
                                                            </span>
                                                            <input type="text" value class="form-control">
                                                        </div>
                                                        <label class="form-label">E-mail</label>
                                                        <div class="input-icon mb-3 position-relative">
                                                            <span class="input-icon-addon">
                                                                <i class="ti ti-mail"></i>
                                                            </span>
                                                            <input type="text" value class="form-control">
                                                        </div>
                                                        <label class="form-label">Senha</label>
                                                        <div class="pass-group mb-3">
                                                            <input type="password" class="pass-input form-control">
                                                            <span class="ti toggle-password ti-eye-off"></span>
                                                        </div>
                                                        <label class="form-label">Confirmar Senha</label>
                                                        <div class="pass-group  mb-3">
                                                            <input type="password" class="pass-input form-control">
                                                            <span class="ti toggle-password ti-eye-off"></span>
                                                        </div>
                                                        <label class="form-label">Telefone</label>
                                                        <div class="input-icon mb-3 position-relative">
                                                            <span class="input-icon-addon">
                                                                <i class="ti ti-phone"></i>
                                                            </span>
                                                            <input type="text" value class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-wrap form-wrap-checkbox mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check form-check-md mb-0 me-2">
                                                                <input class="form-check-input mt-0" type="checkbox">
                                                            </div>
                                                            <h6 class="fw-normal text-dark mb-0">Eu aceito os<a href="#" onclick="alerta()" class="hover-a "> Termos de Uso</a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="button" onclick="registrar()" class="btn btn-primary w-100">Registrar</button>
                                                </div>
                                                <div class="text-center">
                                                    <h6 class="fw-normal text-dark mb-0">Ja possui uma conta ativa?<a href="login" class="hover-a "> Conecte-se</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <p class="mb-0 ">Copyright &copy; 2024 - LearningTrack</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
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