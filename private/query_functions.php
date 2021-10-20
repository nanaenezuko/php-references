<?php
  require('validation_functions.php');

  function find_all_subjects(){
    global $db;
    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY _position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function insert_subject($menu_name, $position, $visible){
    global $db;
    $sql = "INSERT INTO subjects (_menu_name, _position, _visible)";
    $sql .= "VALUES (";
    $sql .= "'". $menu_name ."',";
    $sql .= "'". $position ."',";
    $sql .= "'". $visible ."'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if ($result) {
      return true;
    } else {
      //INSERT Failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_subject($subject){
    global $db;

    $errors = validate_subject($subject);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE subjects SET ";
    $sql .= "_menu_name = '". $subject['menu_name']. "',";
    $sql .= "_position = '". $subject['position'] . "',";
    $sql .= "_visible = '". $subject['visible']. "' ";
    $sql .= "WHERE _id = '". $subject['id'] ."' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if ($result) {
      return true;
    } else {
      //INSERT Failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function find_subject_by_id($id){
    global $db;
    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE subjects._id = '".$id."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
  }

  function validate_subject($subject){
    $errors = [];

    if (is_blank($subject['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255 ])) {
      $errors[] = "Name must be between 2 and 255 Characters.";
    }

    $position_int = (int) $subject['position'];
    if ($position_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    } elseif ($position_int > 999) {
      $errors[] = "Position must be less than 999";
    }

    $visible_str = (string) $subject['visible'];
    if (!has_inclusion_of($visible_str, ["0", "1"])) {
      $errors[] = "Visible must be true or false";
    }

    return $errors;
  }

  function find_all_pages(){
    global $db;
    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY _position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_page_by_id($id){
    global $db;

    $sql = "SELECT * FROM subjcets ";
    $sql .= "WHERE _id = '". $id. "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $pages = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $pages;
  }

  function insert_page($page){
    global $db;

    $sql = "INSERT INTO subjects (_menu_name, _position, _visible) ";
    $sql .= "VALUES ('".$page['menu_name']."',";
    $sql .= "'".$page['position']."',";
    $sql .= "'".$page['visible']."'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if ($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function get_count_row($table_name ){
    global $db;

    $sql = "SELECT COUNT(*) FROM ".$table_name;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $count = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $count[0];
  }

  function delete_item($id){
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE _id = '". $id ."' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if ($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function db_escape($db, $query){
      return mysqli_real_escape_string($db, $query);
  }

 ?>
