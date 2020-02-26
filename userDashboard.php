<?php
  session_start();
  if(!isset($_SESSION['currentUser']))
  {
    $msg = "Please login!";
    $_SESSION['unauthorisedAccess'] = $msg;
    header("Location: loginPage.php");
  }
?>

<?php include 'inc\base.php' ?>
  <?php include 'inc\navbars.php' ?>
<?php include 'inc\footer.php' ?>
