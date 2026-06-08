<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Куторгин Руслан Алексеевич</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="row">
    <div class="col-12 text-center">
      <h1 class="mb-4">Регистрация</h1>
      <form action="/registration.php" method="POST" class="d-flex flex-column gap-3">
        <input required type="text" name="login" class="form-control" placeholder="login">
        <input required type="email" name="email" class="form-control" placeholder="email">
        <input required type="password" name="password" class="form-control" placeholder="password">
        <button class="btn btn-primary" type="submit" name="submit">Зарегистрироваться</button>
        <p class="mt-3">Уже есть аккаунт? <a href="/login.php">Войти!</a></p>
      </form>
    </div>
  </div>
</div>
</body>
</html>

<?php
require_once('db.php');

if (isset($_COOKIE['User'])) {
  header("Location: /profile.php");
  exit();
}

$link = mysqli_connect('127.0.0.1', 'root', 'password', 'hack_site');

if (isset($_POST['submit'])) {
  $login = $_POST['login'];
  $email = $_POST['email'];
  $pass = $_POST['password'];

  if (!$login || !$email || !$pass) {
    die("Введите все параметры");
  }

  $sql = "INSERT INTO users (username, email, password)
            VALUES ('$login', '$email', '$pass')";

  if (!mysqli_query($link, $sql)) {
    echo "Не удалось добавить пользователя";
  } else {
    header("Location: /login.php");
    exit();
  }
}
?>
