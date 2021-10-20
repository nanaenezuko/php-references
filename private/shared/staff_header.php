<?php if (!isset($page_title)) {
  $page_title = "Staff Area";
} ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>

    <link rel="stylesheet" href=<?php echo url_for('stylesheets/staff.css'); ?>
  </head>
  <body>
    <header>
      <h1>Staff Area</h1>
    </header>

    <nav>
      <ul>
        <li> <a href=<?php echo WWW_ROOT . '/staff/index.php'; ?>>Back To Menu</a></li>
        <li> <a href=<?php echo url_for('staff/subjects/index.php'); ?>>Subjects</a></li>
        <li> <a href=<?php echo url_for('staff/pages/index.php'); ?>>Pages</a></li>
      </ul>
    </nav>
