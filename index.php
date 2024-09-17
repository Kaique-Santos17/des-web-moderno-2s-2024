<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title> Sistema - Central Aluno</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- jquery Ui -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css" integrity="sha512-tpsEzNMLQS7w9imFSjbEOHdZav3/aObSESAL1y5jyJDoICFF2YwEdAHOPdOr1t+h8hTzar0flphxR76pd0V1zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="assets/js/growl-notification.min.js"></script>
    <link rel="stylesheet" href="assets/css/colored-theme.min.css">
</head> 
<body>
<script>
      function conectar() {
        var login = $('#login').val();
        var senha = $('#senha').val();
        var xmlhttp;
        if (window.XMLHttpRequest) { // IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else { // IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText.search("Ola") != -1) {
              GrowlNotification.notify({
                title: 'Boa!',
                description: 'Olá, ' + login + ' Seja Bem Vindo',
                type: 'success',
                position: 'top-right',
                closeTimeout: 3000
              });
              setTimeout(() => {
                window.location.href = "dashboard";
              }, "3000")
            } else {
              GrowlNotification.notify({
                title: 'Oh não!',
                description: xmlhttp.responseText,
                type: 'danger',
                position: 'top-right',
                closeTimeout: 5000
              });
            }
          }
        }
        xmlhttp.open("POST", "sys/cadastros.php?type=login", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("login=" + login + "&senha=" + senha);
      }
    </script>
<!--==================== Preloader Start ====================-->
  <div class="preloader">
    <div class="loader"></div>
  </div>
<!--==================== Preloader End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="side-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

    <section class="auth d-flex">
        <div class="auth-left bg-main-50 flex-center p-24">
            <img src="assets/images/thumbs/auth-img1.png" alt="">
        </div>
        <div class="auth-right py-40 px-24 flex-center flex-column">
            <div class="auth-right__inner mx-auto w-100">
                <a href="login" class="auth-right__logo">
                    LearningTrack
                </a>
                <h2 class="mb-8">Acesso Restrito! &#128075;</h2>
                <p class="text-gray-600 text-15 mb-32">Insira seus dados de acesso para poder prosseguir.</p>

                <form action="#">
                    <div class="mb-24">
                        <label for="fname" class="form-label mb-8 h6">Matrícula</label>
                        <div class="position-relative">
                            <input type="text" class="form-control py-11 ps-40" id="login" placeholder="Insira sua Matrícula">
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ti ti-user"></i></span>
                        </div>
                    </div>
                    <div class="mb-24">
                        <label for="current-password" class="form-label mb-8 h6">Senha</label>
                        <div class="position-relative">
                            <input type="password" class="form-control py-11 ps-40" id="senha" placeholder="Insira sua Senha" value="">
                            <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash" id="current-password"></span>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ti ti-lock"></i></span>
                        </div>
                    </div>
                    <div class="mb-32 flex-between flex-wrap gap-8">
                        <div class="form-check mb-0 flex-shrink-0">
                            <input class="form-check-input flex-shrink-0 rounded-4" type="checkbox" value="" id="remember">
                            <label class="form-check-label text-15 flex-grow-1" for="remember">Lembrar-Me </label>
                        </div>
                        <a href="forgot-password.html" class="text-main-600 hover-text-decoration-underline text-15 fw-medium">Esqueceu sua Senha?</a>
                    </div>
                    <button type="button" class="btn btn-main rounded-pill w-100" onclick="conectar()">Conectar</button>
                    <p class="mt-32 text-gray-600 text-center">Aluno Novo?
                        <a href="registrar" class="text-main-600 hover-text-decoration-underline">Ative sua matrícula!</a>
                    </p>

                    
                </form>
            </div>
        </div>
    </section>

        <!-- Jquery js -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="assets/js/boostrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/jquery-ui.js"></script>
    
    <!-- main js -->
    <script src="assets/js/main.js"></script>



    </body>

</html>