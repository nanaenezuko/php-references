<?php require('../../../private/initialize.php'); ?>

<?php
  $page_title = "Pages";

  $pages_set = find_all_pages();

?>

<?php include(SHARED_PATH.'/staff_header.php'); ?>

  <div id="content">
    <div class="pages-listing">
      <div class="actions">
        <a href=<?php echo url_for('/staff/pages/page_new.php'); ?>>Create new Data</a>
      </div>

      <table width="1000">
        <tr>
          <th>ID</th>
          <th>POSITION</th>
          <th>VISIBLE</th>
          <th>MENU NAME</th>
          <th colspan="3"></th>
        </tr>

        <?php while($page = mysqli_fetch_assoc($pages_set)) { ?>
          <tr>
            <td><?php echo $page['_id']; ?></td>
            <td><?php echo $page['_position']; ?></td>
            <td><?php echo $page['_visible'] == 1 ? 'true':'false'; ?></td>
            <td><?php echo $page['_menu_name']; ?></td>
            <td> <a href=<?php echo url_for('/staff/pages/page_show.php?id='.$page['_id']); ?>>View</a> </td>
            <td> <a href=<?php echo url_for('/staff/pages/page_edit.php?id='.$page['_id']); ?>>Edit</a> </td>
            <td> <a href="#">Delete</a> </td>
          </tr>
        <?php } ?>

      </table>


    </div>
  </div>

<?php include(SHARED_PATH.'/staff_footer.php'); ?>
