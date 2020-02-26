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

  $sql1 = "select * from transactions INNER JOIN bills ON transactions.id = bills.t_id WHERE user_id='$user_id'
  ";
  $result1 = $conn->query($sql1);

  $sql2 = "select * from transactions INNER JOIN policies ON transactions.id = policies.t_id WHERE user_id='$user_id'
  ";
  $result2 = $conn->query($sql2);

  $sql3 = "select * from transactions INNER JOIN loans ON transactions.id = loans.t_id WHERE user_id='$user_id'
  ";
  $result3 = $conn->query($sql3);

  $sql4 = "select * from transactions INNER JOIN others ON transactions.id = others.t_id WHERE user_id='$user_id'
  ";
  $result4 = $conn->query($sql4);

  $sql5 = "SELECT * from transactions WHERE user_id='$user_id' and type IN ('food', 'health', 'travel')";
  $result5 = $conn->query($sql5);

  $conn->close();
?>

<div class="card shadow1" id="abcd">
  <h2>Bills</h2>
  <table class="table">
    <tr>
      <th>Transaction ID</th>
      <th>Name</th>
      <th>Recurrence</th>
      <th>Amount</th>
      <th>Paid To</th>
      <th>Date time</th>
    </tr>
      <?php foreach ($result1 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['t_id']; ?>
        </td>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['recurrence']; ?>
        </td>
        <td>
          <?php echo $res['amount']; ?>
        </td>
        <td>
          <?php echo $res['paid_to']; ?>
        </td>
        <td>
          <?php echo $res['date_time']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
  <h2>Policies</h2>
  <table class="table">
    <tr>
      <th>Transaction ID</th>
      <th>Name</th>
      <th>Recurrence</th>
      <th>Amount</th>
      <th>Paid To</th>
      <th>Date time</th>
      <th>End Date</th>
      <th>Final Amount</th>
    </tr>
      <?php foreach ($result2 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['t_id']; ?>
        </td>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['recurrence']; ?>
        </td>
        <td>
          <?php echo $res['amount']; ?>
        </td>
        <td>
          <?php echo $res['paid_to']; ?>
        </td>
        <td>
          <?php echo $res['date_time']; ?>
        </td>
        <td>
          <?php echo $res['enddate']; ?>
        </td>
        <td>
          <?php echo $res['final_amount']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
  <h2>Loans</h2>
  <table class="table">
    <tr>
      <th>Transaction ID</th>
      <th>Name</th>
      <th>Recurrence</th>
      <th>Amount</th>
      <th>Paid To</th>
      <th>Date time</th>
      <th>Total Amount</th>
      <th>Start Date</th>
      <th>End Date</th>
    </tr>
      <?php foreach ($result3 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['t_id']; ?>
        </td>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['recurrence']; ?>
        </td>
        <td>
          <?php echo $res['amount']; ?>
        </td>
        <td>
          <?php echo $res['paid_to']; ?>
        </td>
        <td>
          <?php echo $res['date_time']; ?>
        </td>
        <td>
          <?php echo $res['total_amount']; ?>
        </td>
        <td>
          <?php echo $res['startdate']; ?>
        </td>
        <td>
          <?php echo $res['enddate']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
  <h2>Others</h2>
  <table class="table">
    <tr>
      <th>Transaction ID</th>
      <th>Name</th>
      <th>Amount</th>
      <th>Paid To</th>
      <th>Date time</th>
      <th>Details</th>
    </tr>
      <?php foreach ($result4 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['t_id']; ?>
        </td>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['amount']; ?>
        </td>
        <td>
          <?php echo $res['paid_to']; ?>
        </td>
        <td>
          <?php echo $res['date_time']; ?>
        </td>
        <td>
          <?php echo $res['t_description']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
  <h2>Miscellaneous</h2>
  <table class="table">
    <tr>
      <th>Transaction ID</th>
      <th>Name</th>
      <th>Amount</th>
      <th>Paid To</th>
      <th>Date time</th>
      <th>Type</th>
    </tr>
      <?php foreach ($result5 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['id']; ?>
        </td>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['amount']; ?>
        </td>
        <td>
          <?php echo $res['paid_to']; ?>
        </td>
        <td>
          <?php echo $res['date_time']; ?>
        </td>
        <td>
          <?php echo $res['type']; ?>
        </td>
      </tr>
      <?php } ?>
  </table>
</div>
