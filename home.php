<?php 
  include_once 'runners/connect_db.php';
  include_once 'runners/session.php';
 ?>

 
<?php
if ($login_user) {
}else{
  die("<center>
      Please Login First!
      <br /><br />
      <a href=\"index.php\">Go to Login Screen</a>
    </center>");
}
?>

    <?php include 'inc/header.php'; ?>

    <?php include 'inc/other_Side.php'; ?>
    <?php include 'inc/left_pannel.php'; ?>

    <?php include 'inc/footer.php'; ?>

    