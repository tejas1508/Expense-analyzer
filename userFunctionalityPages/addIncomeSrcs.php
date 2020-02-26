<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ip-project";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: ".$conn->connect_error);
  }
  $username = $_SESSION['currentUser'];
  $sql = "select id from users where username='$username'";
  $result = $conn->query($sql);
  $r = $result->fetch_array();
  $user_id = $r['id'];

  $sql2 = "SELECT * FROM income_srcs WHERE user_id='$user_id'";
  $result2 = $conn->query($sql2);

  $monthly_inc = 0;
  foreach ($result2 as $res) {
    $monthly_inc += $res['amount']/$res['recurrence'] ;
  }
  $conn->close();
?>

<div class="card shadow1" id="abcd">
  <h2>Your current monthly income is</h2>
  <p><?php echo "<h3>$monthly_inc</h3>"; ?></p>
  <table class="table">
    <tr>
      <th>Source name</th>
      <th>Recurrence</th>
      <th>Amount</th>
    </tr>
      <?php foreach ($result2 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['recurrence']; ?>
        </td>
        <td>
          <?php echo $res['amount']; ?>
        </td>
      </tr>
      <?php } ?>
    </table>
    <span style="color:white;"><?php if(isset($_SESSION['successMsg1'])){ echo $_SESSION['successMsg1'];unset($_SESSION['successMsg1']); } ?></span>
</div>

<form class="form-group-side form" action="<?php echo htmlspecialchars('userFunctionalityPages/addIncomeToDB.php'); ?>" method="post" id="defg">
  <h3>Add a new income source</h3>
  <div class="row">
    <div class="col-25">
        <label for="name" class="side-label">Name :</label>
    </div>
    <div class="col-75">
        <input type="text" name="name" class="input-side">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <!-- <label for="recurrence" class="side-label">Recurrence :</label> -->
        Recurrence:
        <!-- <small>Enter 0 for one-time income</small> -->
    </div>
    <div class="col-75">
        <input type="number" name="recurrence" placeholder="in months" class="input-side">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
        <label for="amount" class="side-label">Amount :</label>
    </div>
    <div class="col-75">
        <input type="text" name="amount" class="input-side">
    </div>
  </div>
  <div style="width: 30px; margin: 0 auto;">
      <button  class="button btnFade btnBlueGreen" type="submit" name="button">Submit</button>
  </div>
</form>
