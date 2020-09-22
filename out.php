<?
  session_start();
  unset($_SESSION['user_id']); // разрегистрировали переменную
  session_destroy(); // разрушаем сессию
  header("Location: /auth.php");
  exit;
?>