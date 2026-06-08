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
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="row">
    <div class="col-12 text-center">
      <h1 class="mb-4">Добро пожаловать!</h1>

      <?php if (!isset($_COOKIE['User'])) { ?>
        <div class="d-flex justify-content-center gap-3">
          <a href="/registration.php" class="btn btn-primary">Регистрация</a>
          <a href="/login.php" class="btn btn-primary">Вход в аккаунт</a>
        </div>
      <?php } else {
        $link = mysqli_connect('127.0.0.1', 'root', 'password', 'hack_site');
        $sql = "SELECT * FROM posts";
        $res = mysqli_query($link, $sql);

        if (mysqli_num_rows($res) > 0) {
          while ($post = mysqli_fetch_array($res)) {
            echo "<a href='/posts.php?id=" . $post["id"] . "'>"
              . $post["title"] . "</a><br>";
          }
        } else {
          echo "Постов пока что нет :(";
        }
      } ?>
    </div>
  </div>
</div>
</body>
</html>
