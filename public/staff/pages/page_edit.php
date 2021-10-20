<?php
  require_once('../../../private/initialize.php');

  if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages'));
  }

  $menu_name = '';
  $position = '';
  $visible = '';

  if (is_post_request()) {
    $menu_name = $_POST['menu_name'];
    $position = $_POST['position'];
    $visible = $_POST['visible'];

    echo "MENU NAME : ".$menu_name;
    echo "<br>POSITION : ".$position;
    echo "<br>VISIBLE : ".($visible == 1 ? "ture":"false");
  }

  $id = $_GET['id'];

  include(SHARED_PATH.'/staff_header.php');
 ?>

 <div class="content">
   <a href=<?php echo url_for('staff/pages'); ?>>Back</a>

   <form class="" action=<?php echo url_for('staff/pages/page_edit.php?id='.h(u($id))); ?> method="post">
     <dl class="">
       <dt>Menu Name</dt>
       <dd> <input type="text" name="menu_name" value="<?php echo $menu_name; ?>" ></dd>
     </dl>
     <dl class="">
       <dt>Position</dt>
       <dd>
         <select class="" name="position">
           <option value="1">1</option>
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
       <input type="submit" name="" value="submit">
     </dl>
   </form>
 </div>

 <?php include(SHARED_PATH.'/staff_footer.php'); ?>
