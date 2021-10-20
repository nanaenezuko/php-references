<?php
  require_once('../../../private/initialize.php');

  $page_title = "Create New Pages";
  $counting = get_count_row('subjects');

  if (is_post_request()) {
    $page['menu_name'] = $_POST['menu_name'];
    $page['position'] = $_POST['position'];
    $page['visible'] = $_POST['visible'];

    insert_page($page);
    echo "<script type='text/javascript'>alert('Insert Data Success');</script>";
  }

  include(SHARED_PATH.'/staff_header.php');
 ?>

 <div class="content">
   <img src="" alt="" onload="myFunction()">
   <a href=<?php echo url_for('staff/pages'); ?>>Back</a>

   <form class="" action=<?php echo url_for('staff/pages/page_new.php'); ?> method="post">
     <dl class="">
       <dt>Menu Name</dt>
       <dd> <input type="text" name="menu_name" > </dd>
     </dl>
     <dl class="">
       <dt>Position</dt>
       <dd>
         <select class="" name="position">
           <?php
             for ($i=1; $i <= $counting +1; $i++) {
               echo "<option value='".$i."' >".$i."</option>";
             }
            ?>
         </select>
       </dd>
     </dl>
     <dl class="">
       <dt>Visible</dt>
       <dd>
         <input type="hidden" name="visible" value="0">
         <input type="checkbox" name="visible" value="1">
       </dd>
     </dl>
     <dl class="">
       <input type="submit">
     </dl>
   </form>
 </div>

 <?php include(SHARED_PATH.'/staff_footer.php') ?>
