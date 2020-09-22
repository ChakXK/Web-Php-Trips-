<?php
session_start();
if (empty($_SESSION['user_id'])){
   header('Refresh: 2; URL=/auth.php');
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
<a href='/admin.php' class="nav-link">Назад</a>
  <div class="site-section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-10">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">РЕГИСТРАЦИЯ</span>
              <span class="subtitle-39191">РЕГИСТРАЦИЯ</span>
              <h3>ДЛЯ АДМИНИСТРАЦИИ</h3>
            </div>
          </div>
        </div>
       
       <?php 
    require_once 'connection.php'; // подключаем скрипт
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
     if(isset($_POST['a_password']) &&  isset($_POST['password_verify']) &&  isset($_POST['login'])){
    // экранирования символов для mysql
    $a_password= htmlentities(mysqli_real_escape_string($link, $_POST['a_password']));
    $login= htmlentities(mysqli_real_escape_string($link, $_POST['login']));
    $password_verify= htmlentities(mysqli_real_escape_string($link, $_POST['password_verify']));
     
    $hash = password_hash($a_password, PASSWORD_DEFAULT);
    if (password_verify($password_verify, $hash)) {
    
    // создание строки запроса
    $query ="INSERT INTO Admins(Login, Password) VALUES('$login', '$hash')";
     
          // выполняем запрос
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
      echo "<meta http-equiv='refresh' content='0'>";
      echo 'Новый администратор добавлен!';

} else {
    echo 'Пароли не совпадает';
}
}
mysqli_close($link);
?>

        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Логин" name="login">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="password" class="form-control" placeholder="Пароль" name="a_password">
                </div>
                  <div class="col-md-12">
                  <input type="password" class="form-control" placeholder="Повторить пароль" name="password_verify">
                </div>
              </div>
              <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Зарегистрироваться">
            </form>
          </div>
        </div>
      </div>
    </div> <!-- END .site-section -->

    </div>

  </body>
</html>
