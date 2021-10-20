<?php require('../../../private/initialize.php'); ?>

<?php

  $subjects_set = find_all_subjects();
 ?>

<?php $page_title = "Subjects" ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="content">
  <div class="subjects-listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a href=<?php echo url_for('staff/subjects/subject_new.php'); ?> class="action">Create new Subject</a>
    </div>

    <table class="table-data">
      <tr>
        <th>ID</th>
        <th>POSITION</th>
        <th>VISIBLE</th>
        <th>NAME</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

    <?php while($subject = mysqli_fetch_assoc($subjects_set)){ ?>
        <tr>
          <td><?php echo $subject['_id']; ?></td>
          <td><?php echo $subject['_position']; ?></td>
          <td><?php echo $subject['_visible'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo $subject['_menu_name']; ?></td>
          <td> <a href=<?php echo url_for('staff/subjects/subject_show.php?id='.
          h(u($subject['_id'])));?> class="action">View</a></td>
          <td> <a href=<?php echo url_for('staff/subjects/subject_edit.php?id='.
          h(u($subject['_id'])));?> class="action">Edit</a></td>
          <td> <a href=<?php echo url_for('staff/subjects/subject_delete.php?id='
          .h(u($subject['_id']))) ?> class="action">Delete</a></td>
        </tr>
    <?php } ?>
    </table>
    <?php
      mysqli_free_result($subjects_set);
     ?>
  </div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
