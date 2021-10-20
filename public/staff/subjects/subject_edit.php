<?php require('../../../private/initialize.php');

  $page_title = "SUBJECT NEW";

  if (!isset($_GET['id'])) {
    //redirect_to(url_for('staff/subjects'));
  }

  $id = $_GET['id'];
  $counting = get_count_row('subjects') + 1;
  $menu_name = '';
  $position = '';
  $visible = '';

  if (is_post_request()) {
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $menu_name = $subject['menu_name'];
    $position = $subject['position'];
    $visible = $subject['visible'];

    $result = update_subject($subject);
    if ($result === true) {
      redirect_to(url_for('/staff/subjects/subject_show.php?id='.h(u($id))));
    } else {
      $errors = $result;
      var_dump($result);
    }

  } else {
    $subject = find_subject_by_id($id);
    $menu_name = $subject['_menu_name'];
    $position = $subject['_position'];
    $visible = $subject['_visible'];
  }

  include(SHARED_PATH.'/staff_header.php');
?>

<div class="content">
  <a href=<?php echo url_for('staff/subjects/index.php'); ?>><== Back</a>

  <div class="subject-edit">
    <h1>Edit Subject</h1>

    <form class="form-subject-new" action=<?php echo url_for('/staff/subjects/subject_edit.php?id='.h(u($id))); ?> method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd> <input type="text" name="menu_name" value="<?php echo  $menu_name; ?>"></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position" >
            <?php $selected = "selected";
              for ($i=1; $i < $counting; $i++) {
                echo "<option value='".$i."' ";
                if ($i == $position) {
                  echo $selected;
                }
                echo ">".$i."</option>";
              }

            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0">
          <input type="checkbox" name="visible" value="1"
          <?php if ($visible ==  1){
            echo "checked";
          } ?>>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" name="" value="Create Subject">
      </div>
    </form>
  </div>
</div>


<?php include(SHARED_PATH.'/staff_footer.php'); ?>
