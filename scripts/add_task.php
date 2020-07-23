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

$tasks = $db->query("insert into task values (null, '$data[name]', $data[user_id], 0)");
if($tasks) {
  $task_id = $db->insert_id;
  echo "<div class='task-el' data-id='$task_id'>";
  echo "<input id='id-$task_id' type='checkbox'>";
  echo "<label for='id-$task_id'></label><span>$data[name]</span>";
  echo "</div>";
}

?>