<?php
require 'config.php';

$db = new mysqli(
  $connection['server'],
  $connection['user'],
  $connection['password'],
  $connection['database']
);

$db->set_charset("utf8");

$query = $db->query("delete from task where id=$_GET[id]");

?>