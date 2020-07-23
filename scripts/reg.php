<?php

require 'config.php';

$db = new mysqli(
  $connection['server'],
  $connection['user'],
  $connection['password'],
  $connection['database']
);

if($db->connect_errno) {
  exit('{"error": "Ошибка подключения к базе данных"');
}

$db->set_charset("utf8");

$new_user = $db->query("insert into `user` 
  values(null, '$_POST[username]', '$_POST[password]', '$_POST[email]')");
if($new_user) {
  $user = $db->query("select * from user 
  where email='$_POST[email]' 
  and password='$_POST[password]'");
  $row = $user->fetch_assoc();
  exit (json_encode($row));
}
else {
  exit(json_encode($db->error));
}
?>