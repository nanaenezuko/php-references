<?php require('../../../private/initialize.php');

  $page_title = "SUBJECT NEW";
  include(SHARED_PATH.'/staff_header.php');
?>

<div class="content">
  <a href=<?php echo url_for('staff/subjects/index.php'); ?>><== Back</a>

  <div class="subject-new">
    <h1>Create Subject</h1>

    <form class="form-subject-new" action=<?php echo url_for('staff/subjects/create.php'); ?> method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd> <input type="text" name="menu_name"/> </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0"/>
          <input type="checkbox" name="visible" value="1"/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" name="" value="Create Subject">
      </div>
    </form>
  </div>
</div>


<?php include(SHARED_PATH.'/staff_footer.php'); ?>
