<!doctype html>
<html lang="en">

  <head>
    <title>Туристическое Агенство</title>
    <meta charset="utf-8">
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
                  <li class="active"><a href="index.html" class="nav-link">Главная</a></li>
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
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p>
              <p class="d-flex align-items-center">
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section">

      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-7">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">Journey</span>
              <span class="subtitle-39191">Journey</span>
              <h3>Your Journey Starts Here</h3>
            </div>
          </div>
        </div>
        <div class="row">

          <?php
require_once 'connection.php'; // подключаем скрипт
    // подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
  or die("Ошибка " . mysqli_error($link));


// вывод таблицы Путевок
$query ="SELECT * FROM `Trips` INNER JOIN `Countries` ON Trips.Id_Country = Countries.Id INNER JOIN `TripTypes` ON Trips.Id_TripType = TripTypes.Id";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
  $rows = mysqli_num_rows($result); // количество полученных строк

  for ($i = 0 ; $i < $rows ; ++$i)
  {
    $row = mysqli_fetch_row($result);
    $subs = substr($row[2],0,20);
    ?>
        <div class="col-lg-4 col-md-6 mb-4' data-aos='fade-up">
            <div class="listing-item">
              <div class="listing-image">
                <?php if ($row[7]) 
                echo "<img src='$row[7]' alt='Image' class='img-fluid'>";
                else echo "<img src='images/logo.png' alt='Image' class='img-fluid'>"
                ?>
              </div>
              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="/single.php?Id=<?php echo $row[0]?>"><?php echo $row[3]?>руб.</a>
                <h2 class="mb-1"><a href="/single.php?Id=<?php echo $row[0]?>"><?php echo $row[1]?></a></h2>
              </div>
            </div>
          </div>

        <?php
  }
  
  // очищаем результат
  mysqli_free_result($result);

}

mysqli_close($link);
            ?>
        </div>

      </div>
    </div>
    </div>
  
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

