<?php
  require_once 'connection.php'; // подключаем скрипт
    // подключаемся к серверу
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
  <a href='/' class="nav-link">Назад</a>

<?php
if($_GET['Id'])
{
  //подклюаемся к бд
$link = mysqli_connect($host, $user, $password, $database) 
          or die("Ошибка " . mysqli_error($link)); 
            $Id = $_GET['Id'];
             $query ="SELECT * FROM `Trips` INNER JOIN `Countries` ON Trips.Id_Country = Countries.Id INNER JOIN `TripTypes` ON Trips.Id_TripType = TripTypes.Id WHERE Trips.Id=$Id";
            // выполняем запрос
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  
        $rows = mysqli_num_rows($result); 
        if($rows!=1)
        {
          die ("Такой информации не существует");
        }
        $rowtrip = mysqli_fetch_row($result);
}
else  die("Без параметра");

?>
   <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('<?php echo "$rowtrip[7]"; ?>')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-5" data-aos="fade-up">
              <span class="text-white d-block mb-4">Цена: <strong><?php echo "$rowtrip[3]"; ?>руб.</strong></span>
              <h1 class="mb-3 text-white"><?php echo "$rowtrip[1]"; ?></h1>
              <p><?php echo "$rowtrip[9]. "; echo "$rowtrip[11]."; ?></p>
              
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">

      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-12">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center"><?php echo "$rowtrip[9]"; ?></span>
              <span class="subtitle-39191"><?php echo "$rowtrip[1]"; ?></span>
              <h3><?php echo "$rowtrip[11]"; ?></h3>
            </div>
          </div>
        </div>


        <div class="row mt-5 pt-5">
          <div class="col-md-6">
            <p><?php echo "$rowtrip[2]"; ?></p>
          </div>
          <div class="col-md-6">
            <img src="<?php echo "$rowtrip[7]"; ?>" alt="Image" class="img-fluid">
          </div>
        </div>

      </div>
    </div>

    </div>

    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>
