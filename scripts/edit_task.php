<?php
require 'config.php';

$db = new mysqli(
  $connection['server'],
  $connection['user'],
  $connection['password'],
  $connection['database']
);

$db->set_charset("utf8");

$data = json_decode(file_get_contents('php://input'), true);

$tasks = $db->query("update task set name='$data[name]', is_done=$data[is_done]  
  where id=$data[id]");
if($tasks) {
  if ($data['is_done']) {
    echo "<input id='id-$data[id]' type='checkbox' checked>";
  } else {
    echo "<input id='id-$data[id]' type='checkbox'>";
  }
  echo "<label for='id-$data[id]'></label><span>$data[name]</span>";
}

?>