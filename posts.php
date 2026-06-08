<?php
$id = $_GET['id'];
$link = mysqli_connect('127.0.0.1', 'root', 'password', 'hack_site');
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);

$title = $rows['title'];
$main_text = $rows['main_text'];
?>

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
    <div class="d-flex gap-3">
      <a class="nav-link text-light" href="/profile.php">Профиль</a>
      <a class="nav-link text-light" href="/posts.php">Посты</a>
      <a class="nav-link text-light" href="/index.php">Выйти</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="mb-4">Мои посты</h2>

  <div class="card mb-3">
    <div class="card-body">
      <?php
      echo "<h5 class=\"card-title\">$title</h5>";
      echo "<p class=\"card-text\">$main_text</p>";
      ?>
    </div>
  </div>
</div>
</body>
</html>
