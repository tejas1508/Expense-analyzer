<?php include 'inc\base.php' ?>
<?php session_start(); ?>
<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="landingPage.php"><img src="logo-3.png" alt="ExpenseAnalyzer" width="35" height="35"></a></li>
      <li><a href="contactus.php">Contact Us</a></li>
      <li><a href="about.php">About</a></li>
      <li class="fl"><a href="registerPage.php">Register</a></li>
      <li class="fl"><a href="loginPage.php">Log in</a></li>
    </ul>
  </nav>
</div>
<div style="text-align:center; padding-top:30px;">
  <h2>REGISTER YOUR ACCOUNT</h2>
</div>
<div style="text-align: center;">
  <div class="form-group">
    <form class="" action="<?php echo htmlspecialchars('registerUser.php') ?>" method="post">
      <span style="color:yellow; padding-bottom: :50px;"><?php if(isset($_SESSION['usernameErr'])){ echo $_SESSION['usernameErr']; } ?></span>
      <div class="row">
        <div class="col-25">
            <label for="name">Full name :</label>
        </div>
        <div class="col-75">
            <input type="text" name="name" placeholder="Enter your full name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
            <label for="username">Username :</label>
        </div>
        <div class="col-75">
            <input type="text" name="username" placeholder="Enter your username">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
            <label for="email">Email Id :</label>
        </div>
        <div class="col-75">
            <input type="email" name="email" placeholder="Enter your email-id">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
            <label for="pwd1">Password :</label>
        </div>
        <div class="col-75">
            <input type="password" name="pwd1" placeholder="Enter your password">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
            <label for="pwd2">Confirm Password :</label>
        </div>
        <div class="col-75">
            <input type="password" name="pwd2" placeholder="Confirm your password">
        </div>
      </div>
      <div style="width: 30px; margin: 0 auto;">
          <button  class="button btnFade btnBlueGreen" type="submit" name="button">Register</button>
      </div>
    </form>
  </div>
  <div>
    Already a user? <a class="link" href="loginPage.php">Log in</a>
  </div>
</div>
<footer>
  <p style="padding:20px;color:#ffffff;background-color:#006666;text-align: center;">ExpenseAnalyzer, Copyright &copy; 2019</p>
</footer>

<?php include 'inc\footer.php' ?>
