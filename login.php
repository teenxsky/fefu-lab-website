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
      <h1 class="mb-4">Вход в аккаунт</h1>
      <form action="/login.php" method="POST" class="d-flex flex-column gap-3">
        <input required type="text" name="login" class="form-control" placeholder="логин">
        <input required type="password" name="password" class="form-control" placeholder="пароль">
        <button class="btn btn-primary" type="submit" name="submit">Войти!</button>
        <p class="mt-3">Пока что нет аккаунта? <a href="/registration.php">Зарегистрируйтесь!</a></p>
      </form>

      <?php
      require_once('db.php');

      $link = mysqli_connect('127.0.0.1', 'root', 'password', 'hack_site');

      if (isset($_COOKIE['User'])) {
        header("Location: /profile.php");
        exit();
      }

      if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        if (!$login || !$pass) {
          die("Введите все параметры");
        }

        $sql = "SELECT * FROM users WHERE username='$login' AND password='$pass'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) == 1) {
          setcookie("User", $login, time() + 7200);
          header("Location: /profile.php");
          exit();
        } else {
          echo "<div class=\"alert alert-danger text-center fw-semibold py-2 mb-3\" role=\"alert\">Неправильное имя или пароль</div>";
        }
      }
      ?>

    </div>
  </div>
</div>
</body>
</html>
