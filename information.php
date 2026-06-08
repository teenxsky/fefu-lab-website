<?php
$link = mysqli_connect('127.0.0.1', 'root', 'password');

if (!$link) {
  die('Ошибка подключения: ' . mysqli_connect_error());
}

echo 'Подключение к MariaDB успешно установлено';
