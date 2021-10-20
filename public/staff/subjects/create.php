<?php
  require('../../../private/initialize.php');
   //handle form values sent by subject_new.php

  if (is_post_request()) {
    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    insert_subject($menu_name, $position, $visible);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/subjects/subject_show.php?id='.h(u($new_id))));
  } else {
    redirect_to(url_for('/staff/subjects/subject_new.php'));
  }

 ?>
