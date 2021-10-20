<?php require('../../../private/initialize.php'); ?>

<?php

  $id = $_GET['id'] ?? 'Request Unavailable';

  $subject = find_subject_by_id($id);
  if (!$subject['_id']) {
    redirect_to(url_for('/staff/subjects'));
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2><?php echo "SUBJECT ID : ".h($id); ?></h1>
    <h3>
      <?php
        echo "POSITION : ".$subject['_position'];
        echo "<br>MENU  NAME : ".$subject['_menu_name'];
        echo "<br>VISIBLE : ".$subject['_visible'];
      ?>
    </h3>
  </body>
</html>

<a href="subject_show.php?name=<?php echo u('Hoo Yeon Jung'); ?>">Link</a>
<a href="subject_show.php?company=<?php echo u('Widgets&More'); ?>">Link_0</a>
<a href="subject_show.php?query=<?php echo u('!#*?'); ?>">Link_1</a>
