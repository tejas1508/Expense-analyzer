<?php session_start(); ?>

<?php include 'inc\base.php' ?>
<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="landingPage.php"><img src="logo-3.png" alt="ExpenseAnalyzer" width="35" height="35"></a></li>
      <li><a href="contactus.php">Contact Us</a></li>
      <li><a href="about.html">About</a></li>
      <li class="fl"><a href="registerPage.php">Register</a></li>
      <li class="fl"><a href="loginPage.php">Log in</a></li>
    </ul>
  </nav>
</div>
<div style="text-align:center; padding-top:30px;">
  <h2>LOG INTO YOUR ACCOUNT</h2>
</div>
<div style="text-align: center;">
  <div class="form-group">
    <span style="color:red;"><?php if(isset($_SESSION["loginErr"])){echo $_SESSION["loginErr"];} unset($_SESSION['loginErr']);?></span>
    <span style="color:red;"><?php if(isset($_SESSION['unauthorisedAccess'])){echo $_SESSION["unauthorisedAccess"];}?></span>
    <span style="color:green;"><?php if(isset($_SESSION['successMsg'])){ echo $_SESSION['successMsg']; } ?></span>
    <form action="<?php echo htmlspecialchars('verifyLogin.php') ?>" method="POST">
      <div class="row">
        <div class="col-25">
            <label for="username">Username :</label>
        </div>
        <div class="col-75">
            <input type="text" name="username" placeholder="Enter your username"><br>
            <span class="error" style="color:red;">
              <?php
                if(isset($_SESSION["nameErr"])){
                echo $_SESSION["nameErr"];
              }
              ?>
            </span>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
            <label for="pwd">Password :</label>
        </div>
        <div class="col-75">
            <input type="password" name="pwd" placeholder="Enter your password"><br>
            <span class="error" style="color:red;">
              <?php
                if(isset($_SESSION["pwdErr"])){
                echo $_SESSION["pwdErr"];
              }
              ?>
            </span>
        </div>
      </div>
      <div style="width: 30px; margin: 0 auto;">
          <button  class="button btnFade btnBlueGreen" type="submit" name="button">Log in</button>
      </div>
    </form>
  </div>
  <div>
    new user? <a class="link" href="registerPage.php">Register</a>
  </div>
</div>
<footer style="width:100%;">
  <p style="padding:20px;color:#ffffff;background-color:#006666;text-align: center;">ExpenseAnalyzer, Copyright &copy; 2019</p>
</footer>
