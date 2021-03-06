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
    
</head>


 <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap" id="home-section">
  <a href='/listtrips.php' class="nav-link">Назад</a>

<?php
if($_GET['Id'])
{
  //подклюаемся к бд
$link = mysqli_connect($host, $user, $password, $database) 
          or die("Ошибка " . mysqli_error($link)); 
            $Id = $_GET['Id'];
             $query ="SELECT * FROM `Trips` WHERE Id=$Id";
            // выполняем запрос
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  
        $rows = mysqli_num_rows($result); 
        if($rows!=1)
        {
          die ("Такой информации уже не существует");
        }
        $rowtrip = mysqli_fetch_row($result);

        //получаем стран
        $query ="SELECT * FROM `Countries`";
            // выполняем запрос
        $resultc = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  
      if($resultc)
            $rowscountries = mysqli_num_rows($resultc); // количество полученных строк

      //получение типов
      $query ="SELECT * FROM `TripTypes`";
            // выполняем запрос
        $resultt = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  
      if($resultt)
            $rowstypes = mysqli_num_rows($resultt); // количество полученных строк

}
else  die("Без параметра");

?>
  <div class="site-section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-10">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">Удаление путевки</span>
              <span class="subtitle-39191">Удаление путевки</span>
              <h3>ДЛЯ АДМИНИСТРАЦИИ</h3>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Название" name="name" disabled value="<?php echo $rowtrip[1]?>">
                </div>
              </div>
              <div class="form-group row">
              <div class="col-md-12">
                 <textarea rows="10" cols="45" name="description" placeholder="Описание" class="form-control" disabled><?php echo $rowtrip[2]?></textarea> 
             </div>
           </div>
           <div class="form-group row">
             <div class="col-md-12">
                  <input type="number" step="0.01" min="0" placeholder="0,00" class="form-control" placeholder="Цена" disabled name="price" value="<?php echo $rowtrip[3]?>">₽
             </div>
           </div>
            <div class="form-group row">
             <div class="col-md-12">
             <select name="country" style="width: 750px">
                <option disabled>Выберите страну</option>
                <?php
        
            for ($i = 0 ; $i < $rowscountries ; ++$i)
            {
                $rowc = mysqli_fetch_row($resultc);
                if($rowtrip[6]==$rowc[0]) echo"<option value=$rowc[0] selected disabled>$rowc[1]</option>";
                  else
              echo"<option value=$rowc[0] disabled>$rowc[1]</option>";
            }
                ?>
          </select>
            </div>
           </div>
             <div class="form-group row">
             <div class="col-md-12">
             <select name="type" style="width: 750px">
                <option disabled>Выберите тип</option>
                <?php
            for ($i = 0 ; $i < $rowstypes ; ++$i)
            {
                $rowt = mysqli_fetch_row($resultt);
                if($rowtrip[5]==$rowt[0]) echo"<option value=$rowt[0] selected disabled>$rowt[1]</option>";
                  else
              echo"<option value=$rowt[0] disabled>$rowt[1]</option>";
            }
        mysqli_free_result($result);
                ?>
          </select>
            </div>
           </div>
              <div class="form-group row">
                  <div class="col-md-12">
                    <img src="<?php echo $rowtrip[7] ?>">
                </div>
              </div>
              <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="decision" value="Удалить">
               <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="decision" value="Отмена">
            </form>
          </div>
        </div>
<?php

 if ($_POST['decision']=="Удалить")
{
   $query ="DELETE FROM Trips WHERE Id=$Id;";

          // выполняем запрос
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));   
      if($result)
      {
        echo "<meta http-equiv='refresh' content='0'>";
      }
    mysqli_close($link);
}


?>
  
      </div>
    </div> <!-- END .site-section -->

    </div>

  </body>
</html>
