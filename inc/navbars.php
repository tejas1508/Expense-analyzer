<?php
  if(isset($_SESSION['currentUser'])){
    $dest = 'userDashboard.php';
  }
  else {
    $dest = 'landingPage.php';
  }
?>

<?php
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
  if(isset($_SESSION['currentUser'])){
  $username = $_SESSION['currentUser'];
  }
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
  $date = date("Y-m-d");
  $sql3 = "SELECT * FROM transactions WHERE date_time='$date' and user_id='$user_id'";
  $result3 = $conn->query($sql3);
  $conn->close();
?>
<script type="text/javascript">
  function loadForm(key){
    if(key == '1'){
      $("#content1").load("userFunctionalityPages/addIncomeSrcs.php #abcd");
      $("#here").load("userFunctionalityPages/addIncomeSrcs.php #defg");
    }
    else if (key == '2'){
      $("#content1").load("userFunctionalityPages/addTransactions.php #abcd");
      $("#here").empty();
    }
    else if (key == '3'){
      $("#content1").load("userFunctionalityPages/setGoals.php #abcd");
      $("#here").load("userFunctionalityPages/setGoals.php #defg");
    }
    else if (key == '4'){
      $("#content1").load("userFunctionalityPages/setAlerts.php #abcd");
      $("#here").load("userFunctionalityPages/setAlerts.php #defg");
    }
  }
  function loadTHistory(){
    $("#content1").load("userFunctionalityPages/transactionHistory.php #abcd");
    $("#here").empty();
  }

  function loadPieChart(){
    $("#content1").load("userFunctionalityPages/analyzeExpenseForm.php #form");
    $("#here").empty();
  }
  function loadRealPie(){
    $("#content1").load("piechart.php");
    $("#here").empty();
  }

  function loadTrendings(){
    $("#content1").load("userFunctionalityPages/viewTrendings.php #abcd");
    $("#here").empty();
  }
</script>

<div class="topnavbar">
  <nav>
    <ul>
      <li><a href="<?php echo $dest ?>"><img src="logo-3.png" alt="ExpenseAnalyzer" width="50" height="50"></a></li>
      <div style="float:right;padding-right:20px;padding-top:20px;">
        <li><a href="#" id="link4" onclick="loadTHistory()">Transaction History</a></li>
        <li><a href="#" id="link4" onclick="loadPieChart()">Analyze Your Expenses</a></li>
        <!-- <li><a href="#" id="link4">Graphs and Charts</a></li> -->
        <li><a href="#" id="link4" onclick="loadTrendings()">Trending Investments</a></li>
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
          <li><a href="#" id="link1" onclick="loadForm('1')">Add income sources</a></li>
          <li><a href="#" id="link2" onclick="loadForm('2')">Add transactions</a></li>
          <li><a href="#" id="link3" onclick="loadForm('3')">Set Goals</a></li>
          <li><a href="#" id="link4" onclick="loadForm('4')">Set alerts</a></li>
        </ul>
      </nav>
    </div>
    <input type="hidden" name="mysession" id="mysession">
  </span>
  <span>
      <div style="text-align: center;">
        <div class="content-1" id="content1" style="display: block;">
            <div class="card shadow1">
                <h2>Current monthly income</h2>
                <h4><strong><?php echo $monthly_inc ?></strong></h4>
              <!-- </div>
              <div class="shadow1 card"> -->
                <h2>Today's Transactions</h2>
                <table class="table">
                  <tr>
                    <th>Name</th>
                    <th>Paid to</th>
                    <th>Amount</th>
                    <th>Type</th>
                  </tr>
                    <?php foreach ($result3 as $res) { ?>
                      <tr>
                      <td>
                        <?php echo $res['name']; ?>
                      </td>
                      <td>
                        <?php echo $res['paid_to']; ?>
                      </td>
                      <td>
                        <?php echo $res['amount']; ?>
                      </td>
                      <td>
                        <?php echo $res['type']; ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                  <?php
                  if(isset($_SESSION['pieErr'])){
                    echo "<h2 style='color: yellow;'>Data not found for analysis!</h2>";
                  }
                  ?>
            </div>
        </div>
      </div>
  </span>
  <span>
    <aside>
      <div id="here">

      </div>
    </aside>
  </span>
</div>

<?php
  if(isset($_SESSION['load'])){

    echo "<script type='text/javascript'>",
          "loadForm(1);",
          "</script>";
    unset($_SESSION['load']);
  }
?>

<script type="text/javascript">
      document.getElementById("logout").onclick = function () {
      location.href = "logout.php";
  };
</script>
