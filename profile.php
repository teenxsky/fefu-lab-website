<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Куторгин Руслан Алексеевич</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">Сайт лабы №2</a>

    <div class="d-flex gap-2 align-items-center">
      <a href="/profile.php" class="btn btn-outline-light">Профиль</a>
      <a href="/posts.php" class="btn btn-outline-light">Посты</a>

      <?php if (isset($_COOKIE['User'])): ?>
        <form action="/logout.php" method="POST" class="m-0">
          <button type="submit" class="btn btn-outline-danger">
            Выйти
          </button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-4 text-center">
      <img src="img/avatar.jpg" alt="avatar" class="img-fluid rounded-circle mb-3" style="max-width: 200px;">
      <h3>Куторгин Руслан Алексеевич</h3>
      <p class="text-muted">Студент / Backend-разработчик</p>
    </div>
    <div class="col-md-8">
      <h4>Обо мне</h4>
      <p>Дада это я)</p>
      <h4>Контакты</h4>
      <ul>
        <li>Почта: kutorgin.ra@dvfu.ru</li>
        <li>Тг: @simplyflawless4ortythre3</li>
      </ul>
    </div>
    <form action="/profile.php" method="POST" enctype="multipart/form-data" class="mb-4 d-flex flex-column gap-2">
      <input required type="text" name="title" class="form-control" placeholder="Заголовок поста">
      <textarea required class="form-control" name="main_text" rows="3" placeholder="Текст поста"></textarea>
      <input type="file" name="file" class="form-control" accept="image/*">
      <button type="submit" name="submit" class="btn btn-primary align-self-start">Опубликовать</button>
    </form>
  </div>
</div>

<div class="text-center mt-4">
  <button id="toggleButton" class="btn btn-primary">Открыть</button>
</div>
<div id="extraImage" class="mt-3 text-center" style="display: none;">
  <img class="hacker-img" src="img/extra.jpg" alt="скрытое_фото">
</div>

<script src="js/script.js"></script>
</body>
</html>

<?php
require_once('db.php');

if (!isset($_COOKIE['User'])) {
  header("Location: /login.php");
  exit();
}

$link = mysqli_connect('127.0.0.1', 'root', 'password', 'hack_site');

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $mainText = $_POST['main_text'];

  if (!$title || !$mainText) die("Заполните все поля");

  $sql = "INSERT INTO posts (title, main_text)
          VALUES ('$title', '$mainText')";
  if (!mysqli_query($link, $sql)) die("Ошибка при сохранении поста");

  if (!empty($_FILES["file"]["name"])) {
    $type = @$_FILES["file"]["type"];
    $size = @$_FILES["file"]["size"];
    $allowed = [
      "image/gif",
      "image/jpeg",
      "image/jpg",
      "image/pjpeg",
      "image/x-png",
      "image/png"
    ];

    if (in_array($type, $allowed) && $size < 102400) {
      move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
      echo "Файл загружен в: upload/" . $_FILES["file"]["name"];
    } else {
      echo "Ошибка при загрузке файла";
    }
  }
}
?>
