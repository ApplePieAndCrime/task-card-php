<?php

require 'config.php';

$db = new mysqli(
  $connection['server'],
  $connection['user'],
  $connection['password'],
  $connection['database']
);

if($db->connect_errno) {
  exit('{"error": "Ошибка подключения к базе данных"}');
}

$db->set_charset("utf8");

$user = $db->query("select * from user 
  where email='$_POST[email]' 
  or username='$_POST[email]' 
  and password='$_POST[password]'");

if($row = $user->fetch_assoc()) {
  exit (json_encode($row));
}
else {
  exit ('{"error": "Неверный логин/пароль"}');
}

?>