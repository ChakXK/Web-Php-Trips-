<?php
session_start();
if (empty($_SESSION['user_id'])){
   header('Refresh: 1; URL=/auth.php');
   echo "Вы не авторизованы. У вас нету прав.";
  exit;
}
?>
<html>
<head>
<title>Туристическое Агенство</title>

 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    
</head>

 <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>
      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold">
                  <img src="images/logo.png" alt="Image" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-9  text-right">
              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="a"><a href="/admin.php" class="nav-link">Главная</a></li>
                  <li><a href="/register.php" class="nav-link">Регистрация администрации</a></li>
                  <li><a href="/listtrips.php" class="nav-link">Путевки</a></li>
                  <li><a href='/out.php' class="nav-link">Выйти</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5" data-aos="fade-right">
              <h1 class="mb-3 text-white">Let's Enjoy The Wonders of Nature</h1>
              <p></p>
              <p class="d-flex align-items-center">
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  </body>
</html>
