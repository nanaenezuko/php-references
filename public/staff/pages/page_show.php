<?php

  require('../../../private/initialize.php');

  $id = $_GET['id'] ?? 'Request Unavailable';

  if ($id == "") {
    $id = "PAGE NOT FOUND";
  }

  include(SHARED_PATH. '/staff_header.php');
 ?>
 <div id="content">
   <h1><?php echo h($id); ?></h1>
 </div>

 <?php include(SHARED_PATH. '/staff_footer.php'); ?>
