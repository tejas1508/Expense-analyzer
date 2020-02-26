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

  $sql2 = "SELECT * FROM alerts WHERE user_id='$user_id'";
  $result2 = $conn->query($sql2);

  $sql3 ="SELECT alertdate FROM alerts WHERE reminder='House Rent' and user_id=$user_id";
  $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='Water Bill' and user_id=$user_id";
  // $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='Mahanagar Gas Bill' and user_id=$user_id";
  // $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='Classes Fee Payment' and user_id=$user_id";
  // $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='Mobile Recharge Bill' and user_id=$user_id";
  // $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='Internet Connection' and user_id=$user_id";
  // $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='TV Channel Subscriptions' and user_id=$user_id";
  // $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='Netflix Subscriptions' and user_id=$user_id";
  // $result3 = $conn->query($sql3);
  // $sql3 ="SELECT alertdate FROM alerts WHERE reminder='Amazon Prime Membership' and user_id=$user_id";
  // $result3 = $conn->query($sql3)

  $sql4="SELECT mailsent FROM alerts WHERE reminder='House Rent' and user_id=$user_id";
  $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='Water Bill' and user_id=$user_id";
  // $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='Mahanagar Gas Bill' and user_id=$user_id";
  // $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='Classes Fee Payment' and user_id=$user_id";
  // $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='Mobile Recharge Bill' and user_id=$user_id";
  // $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='Internet Connection' and user_id=$user_id";
  // $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='TV Channel Subscriptions' and user_id=$user_id";
  // $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='Netflix Subscriptions' and user_id=$user_id";
  // $result4=$conn->query($sql4);
  // $sql4="SELECT mailsent FROM alerts WHERE reminder='Amazon Prime Membership' and user_id=$user_id";
  // $result4=$conn->query($sql4);



  $date1 = date("Y-m-d");
  $alertamount = 0;
  foreach ($result2 as $res) {
    $alertamount += $res['alertamount'] ;
  }
  $conn->close();
?>

<div class="card shadow1" id="abcd">
  <h2>Your Total Monthly Reminder Amount Is</h2>
  <p><?php echo "<h3>$alertamount ₹</h3>"; ?></p>
  <table class="table">
    <tr>
      <th>Reminder</th>
      <th>Recurrence</th>
      <th>Alert Date</th>
      <th>Amount(in ₹)</th>
    </tr>
      <?php foreach ($result2 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['reminder']; ?>
        </td>
        <td>
          <?php echo $res['recurrence']; ?>
        </td>
        <td>
          <?php echo $res['alertdate']; ?>
        </td>
        <td>
          <?php echo $res['alertamount']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
<?php
  foreach ($result3 as $res1) {
    $result6=$res1['alertdate'];

  }
  foreach ($result4 as $res2) {
    $result7=$res2['mailsent'];
  }
  if(!empty($result6)){
  $result8=strcmp($date1,$result6);
  // echo "datecmp:".$result8."<br>";
  // echo "mailsent:".$result7;
    if (!$result8) {
      if(!$result7){
        echo $result6;
        echo "mailsent:".$result7;
        header('location: http://localhost/ip-project-19-20/userFunctionalityPages/sentreminder.php');
        die;
      }
      else{
        // echo $result6;
        // echo "mailsent:".$result7;
        // header('location: http://localhost/ip-project-19-20/userFunctionalityPages/sentreminder.php');
        // die;
      }
    }
  }
  ?>
</div>
<div id="defg">
  <form class="form form-group-side" style="height: auto;" action="<?php echo htmlspecialchars('userFunctionalityPages/addremindertoDB.php'); ?>" method="post">
  <h3>Set New Reminder</h3>
  <div class="row">
  <div class="col-25">
      <label for="reminder">reminder</label>
  </div>
  <div class="col-75">
  <input type="text" name="reminder" list="reminder" required/>
      <datalist id="reminder">
        <option value="Electricity Bills">Electricity Bills</option>
        <option value="Water Bill">Water Bill</option>
        <option value="Mahanagar Gas Bill">Mahanagar Gas Bill</option>
        <option value="House Rent">House Rent</option>
        <option value="Home Maintenance Bill">Home Maintenance Bill</option>
        <option value="Classes Fee Payment">Classes Fee Payment</option>
        <option value="Mobile Recharge Bill">Mobile Recharge Bill</option>
        <option value="Internet Connection">Internet Connection</option>
        <option value="TV Channel Subscriptions">TV Channel Subscriptions</option>
        <option value="Netflix Subscriptions">Netflix Subscriptions</option>
        <option value="Amazon Prime Membership">Amazon Prime Membership</option>
      </datalist>
    </div>
  </div>
  <div class="row">
  <div class="col-25">
      Recurrence (in months):
      <!-- <label for="recurrence" class="side-label">Recurrence(months):</label> -->
      <!-- <small>Enter 0 for one-time income</small> -->
  </div>
  <div class="col-75">
      <input type="number" name="recurrence" placeholder="in months" class="input-side" required>
  </div>
  </div>
  <div class="row">
  <div class="col-25">
      <label for="alertdate" class="side-label">Alert Date:</label>
      <!-- <small>Enter 0 for one-time income</small> -->
  </div>
  <div class="col-75">
      <input type="date" min="2018-01-01" name="alertdate" placeholder="dd/mm/yy" class="input-side" required>
  </div>
  </div>
  <div class="row">
  <div class="col-25">
      <label for="alertamount" class="side-label">Amount:</label>
  </div>
  <div class="col-75">
      <input type="text" name="alertamount" class="input-side" required>
  </div>
  </div>
  <div style="width: 30px; margin: 0 auto;">
    <table>
      <tr>
        <td>
            <button  class="button btnFade btnBlueGreen" type="submit" name="delete">Submit</button>
        </td>
        <td>
            <button  class="button btnFade btnBlueGreen" type="reset" name="reset">Reset</button>
        </td>
    </table>
  </tr>
  </div>

  </form>
  <!-- delete a previous goals -->
  <form class="form form-group-side" action="<?php echo htmlspecialchars('userFunctionalityPages/deletereminder.php'); ?>" method="post" style="clear: right; height: auto;">
  <h3>Delete Reminder</h3>
  <div class="row">
  <div class="col-25">
      <label for="reminder">reminder title:</label>
  </div>
  <div class="col-75">
  <input type="text" name="reminder" list="reminder" required/>
      <datalist id="reminder">
        <option value="Electricity Bills">Electricity Bills</option>
        <option value="Water Bill">Water Bill</option>
        <option value="Mahanagar Gas Bill">Mahanagar Gas Bill</option>
        <option value="House Rent">House Rent</option>
        <option value="Home Maintenance Bill">Home Maintenance Bill</option>
        <option value="Classes Fee Payment">Classes Fee Payment</option>
        <option value="Mobile Recharge Bill">Mobile Recharge Bill</option>
        <option value="Internet Connection">Internet Connection</option>
        <option value="TV Channel Subscriptions">TV Channel Subscriptions</option>
        <option value="Netflix Subscriptions">Netflix Subscriptions</option>
        <option value="Amazon Prime Membership">Amazon Prime Membership</option>
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
