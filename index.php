<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/my_tasks.css">
    <title>My tasks</title>
  </head>
  <body>
    <link rel="stylesheet" href="css/header.css">
    <?php
    if ($_POST['id']) {
      require 'header_auth.php';
      include 'scripts/tasks.php';
    }
    else {
      require 'header.php';
    }
    ?>
    <div class="my-tasks page">
      <div class="page-title">
        <h1>Мои задачи</h1>
      </div>
      <section class="task-commands">
        <input class="task-input" type="text">
        <div class="task-btn-group">
          <button class="task-btn task-add">add</button>
          <button class="task-btn task-edit">edit</button>
          <button class="task-btn task-delete">delete</button>
        </div>
      </section>
      <section class="task-list">
        <?php
          if ($_POST['id']) {
            while ($row = $tasks->fetch_assoc()) {
              echo "<div class='task-el' data-id='$row[id]'>";
              if ($row['is_done']) {
                echo "<input id='id-$row[id]' type='checkbox' checked>";
              } else {
                echo "<input id='id-$row[id]' type='checkbox'>";
              }
              echo "<label for='id-$row[id]'></label><span>$row[name]</span>";
              echo "</div>";
            }
          }
          else {
            include 'templates/task_list.php';
          }
        ?>
      </section>
    </div>
    <script src="js/index.js"></script>
  </body>
</html>
