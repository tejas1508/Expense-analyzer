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

  $sql2 = "SELECT * FROM goals1 WHERE user_id='$user_id'";
  $result2 = $conn->query($sql2);

  $goalamount = 0;
  foreach ($result2 as $res) {
    $goalamount += $res['goalamount'] ;
  }
  $conn->close();
?>

<div class="card shadow1" id="abcd">
  <h2>Your Total Goal Amount Is</h2>
  <p><?php echo "<h3>$goalamount ₹</h3>"; ?></p>
  <table class="table">
    <tr>
      <th>Goal Type</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Goal Amount(in ₹)</th>
      <th>amt/month</th>
    </tr>
      <?php foreach ($result2 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['goaltype']; ?>
        </td>
        <td>
          <?php echo $res['startdate']; ?>
        </td>
        <td>
          <?php echo $res['enddate']; ?>
        </td>
        <td>
          <?php echo $res['goalamount']; ?>
        </td>
        <td>
          <?php echo $res['ginvestpmonth']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
  <span style="color:white;"><?php if(isset($_SESSION['successMsg1'])){ echo $_SESSION['successMsg1']; } ?></span>
</div>
<div id="defg">
  <form class="form form-group-side" style="height: auto;" action="<?php echo htmlspecialchars('userFunctionalityPages/AddgoaltoDB.php'); ?>" method="post">
      <h3>Set New Goal</h3>
      <div class="row">
      <div class="col-25">
          <label for="goaltype">Goal Type</label>
      </div>
      <div class="col-75">
      <input type="text" style="width: 250px;" name="goaltype" list="goaltype" required/>
          <datalist id="goaltype">
            <option value="Emergency Fund">Emergency Fund</option>
            <option value="Paying Off Debt">Paying Off Debt</option>
            <option value="Buying A home">Buying A home</option>
            <option value="Saving for Retirement">Saving for Retirement</option>
            <option value="College Or School Fees">College Or School Fees</option>
            <option value="New Car">New Car</option>
            <option value="Vacation">Vacation</option>
            <option value="Large Purchases">Large Purchases</option>
            <option value="Charity">Charity</option>
            <option value="Business">Business</option>
          </datalist>
        </div>
      </div>
      <div class="row">
      <div class="col-25">
          <label for="startdate" class="side-label">Start Date:</label>
          <!-- <small>Enter 0 for one-time income</small> -->
      </div>
      <div class="col-75">
          <input type="date" name="startdate" placeholder="dd/mm/yy" class="input-side" required>
      </div>
      </div>
      <div class="row">
      <div class="col-25">
          <label for="enddate" class="side-label">End Date:</label>
          <!-- <small>Enter 0 for one-time income</small> -->
      </div>
      <div class="col-75">
          <input type="date" min="2018-01-01" name="enddate" placeholder="dd/mm/yy" class="input-side" required>
      </div>
      </div>
      <div class="row">
      <div class="col-25">
          <label for="goalamount" class="side-label">Goal Amount:</label>
      </div>
      <div class="col-75">
          <input type="text" name="goalamount" class="input-side" required>
      </div>
      </div>
      <div class="row">
      <div class="col-25">
          <label for="ginvestpmonth" class="side-label">Investment/Month:</label>
      </div>
      <div class="col-75">
          <input type="text" name="ginvestpmonth" class="input-side" required>
      </div>
      </div>
      <div style="width: 30px; margin: 0 auto;">
        <table>
          <tr>
            <td>
                <button  class="button btnFade btnBlueGreen" type="submit" name="submit">Submit</button>
            </td>
            <td>
                <button  class="button btnFade btnBlueGreen" type="reset" name="reset">Reset</button>
            </td>
          </tr>
        </table>
      </div>
  </form>
  <!-- delete a previous goals -->
  <form class="form form-group-side" style="clear: right; height:100%;" action="<?php echo htmlspecialchars('userFunctionalityPages/deletepreviousgoals.php'); ?>" method="post">
  <h3>Delete goals</h3>
  <div class="row">
  <div class="col-25">
      <label for="goaltype">Goal Type</label>
  </div>
  <div class="col-75">
  <input type="text" style="width: 250px;" name="goaltype" list="goaltype" required/>
      <datalist id="goaltype">
        <option value="Emergency Fund">Emergency Fund</option>
        <option value="Paying Off Debt">Paying Off Debt</option>
        <option value="Buying A home">Buying A home</option>
        <option value="Saving for Retirement">Saving for Retirement</option>
        <option value="College Or School Fees">College Or School Fees</option>
        <option value="New Car">New Car</option>
        <option value="Vacation">Vacation</option>
        <option value="Large Purchases">Large Purchases</option>
        <option value="Charity">Charity</option>
        <option value="Business">Business</option>
      </datalist>
    </div>
  </div>
  <div style="width: 30px; margin: 0 auto;">
    <table>
      <tr>
        <td>
            <button  class="button btnFade btnBlueGreen" type="submit" name="delete">Delete</button>
        </td>
        <td>
            <button  class="button btnFade btnBlueGreen" type="reset" name="reset">Reset</button>
        </td>
      </tr>
    </table>
  </div>
  </form>
</div>
