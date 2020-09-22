<?php
session_start();
if (empty($_SESSION['user_id']))
    die('Вы не авторизованы. У вас нету прав.');
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
    
    <!--Добавим немного стилей-->
 <style type="text/css">
  TABLE {
    width: 300px; /* Ширина таблицы */
    border: 1px solid black; /* Рамка вокруг таблицы */
   }
   TD, TH {
    padding: 3px; /* Поля вокруг содержимого ячеек */
     border: 1px solid black; /* Параметры рамки */
   }
   TH {
    text-align: left; /* Выравнивание по левому краю */
    background: orange; /* Цвет фона */
    color: white; /* Цвет текста */
   }
 </style>
</head>


 <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap" id="home-section">
<a href='/admin.php' class="nav-link">Назад</a>
<table><tr><th>Таблица Путевки </tr></th></table>
<a href='/addtrip.php' class="nav-link">Добавить новую путевку</a>
<div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">

<?php
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
  or die("Ошибка " . mysqli_error($link));



// вывод таблицы Путевок
$query ="SELECT * FROM `Trips` INNER JOIN `Countries` ON Trips.Id_Country = Countries.Id INNER JOIN `TripTypes` ON Trips.Id_TripType = TripTypes.Id";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
  $rows = mysqli_num_rows($result); // количество полученных строк
  
  echo "<table><tr><th>Код</th><th>Название</th><th>Описание</th><th>Цена</th><th>Страна</th><th>Тип</th><th>Редактировать</th><th>Удалить</th></tr>";
  for ($i = 0 ; $i < $rows ; ++$i)
  {
    $row = mysqli_fetch_row($result);
    $subs = substr($row[2],0,20);
    echo "<tr>";
       echo "<td>$row[0]</td>";
         echo "<td>$row[1]</td>";
          echo "<td>$subs</td>";
          echo "<td>$row[3]</td>";
           echo "<td>$row[9]</td>";
            echo "<td>$row[11]</td>";
            echo "<td><a href='/edittrip.php?Id=$row[0]' class='nav-link'>Редактировать</a></td>";
            echo "<td><a href='/removetrip.php?Id=$row[0]' class='nav-link'>Удалить</a></td></td>";
    echo "</tr>";
  }
  echo "</table>";
  
  // очищаем результат
  mysqli_free_result($result);

}

mysqli_close($link);
  ?>
     </div>
     </div>
    </div>

  </body>
</html>
