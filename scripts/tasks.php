<?php
require 'config.php';

$db = new mysqli(
  $connection['server'],
  $connection['user'],
  $connection['password'],
  $connection['database']
);

$db->set_charset("utf8");

$tasks = $db->query("select * from task 
  where user_id='$_POST[id]' order by id desc");
?>