<?php
  session_start();
  if(!isset($_SESSION['currentUser']))
  {
    $msg = "Please login!";
    $_SESSION['unauthorisedAccess'] = $msg;
    header("Location: loginPage.php");
  }
?>
<?php
  if(isset($_SESSION['currentUser'])){
    $dest = 'adminDashboard.php';
  }
  else {
    $dest = 'landingPage.php';
  }
?>

<?php include 'inc\base.php' ?>
<script type="text/javascript">
  function loadForm1(){
    $("#here").load("addTrendings.php");
  }
  function loadForm(){
    $("#here").load("deleteUserForm.php");
  }
  function loadForm2(){
    $("#here").load("userFeedback.php");
  }
</script>
<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="<?php echo $dest ?>"><img src="logo-3.png" alt="ExpenseAnalyzer" width="50" height="50"></a></li>
      <div style="float:right;padding-right:20px;padding-top:20px;">
        <li><button class="button btnFade btnBlueGreen" id="logout"><i class="fa fa-sign-out" aria-hidden="true">Log Out</button></i></li>
      </div>
    </ul>
  </nav>
</div>
<div class="main-content">
  <span>
    <div class="sidenavbar">
      <nav>
        <ul>
          <li><a href="#" id="link4" onclick="loadForm1()">Add trendings</a></li>
          <li><a href="#" id="link5" onclick="loadForm2()">View User Feedback</a></li>
          <li><a href="#" id="link1" onclick="loadForm()">Delete User</a></li>
        </ul>
      </nav>
    </div>
    <input type="hidden" name="mysession" id="mysession">
  </span>
  <span>
    <aside>
      <div style="text-align: center;">
        <div id="here" style="display: inline-block;">

        </div>
      </div>
    </aside>
  </span>
</div>
<?php include 'inc/footer.php' ?>
<script type="text/javascript">
      document.getElementById("logout").onclick = function () {
      location.href = "logout.php";
  };
</script>
