<?php

  require_once('../../../private/initialize.php');

  require_once(SHARED_PATH. '/staff_header.php');

  $id = $_GET['id'];
  $page_title = "DELETE SUBJECT";

  if (is_post_request()) {
    $result = delete_item($id);
    redirect_to(url_for('staff/subjects/'));
  } else {
    $subject = find_subject_by_id($id);
  }

 ?>


 <form class="" action="<?php echo url_for('staff/subjects/subject_delete.php?id='
 .h(u($subject['_id']))); ?>" method="post">

    <h3>Areyou sure want to delete this item?</h3>
    <h4><?php echo "ID : ".$id; ?></h4>
    <h4><?php echo "Name : ".$subject['_menu_name']; ?></h4>
    <input type="submit" name="" value="YES">

 </form>


 <?php

  require_once(SHARED_PATH. '/staff_footer.php');

  ?>
