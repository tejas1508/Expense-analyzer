<?php
  session_start();
  $name = $amount = $paid_to = $date = $type = $recurrence = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $name = $_POST['name'];
      $amount = $_POST['amount'];
      $paid_to = $_POST['paid_to'];
      $date = $_POST['date'];
      $type = $_POST['type'];

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

      $sql = "INSERT INTO transactions(user_id, name, amount, paid_to, date_time, type) VALUES('$user_id', '$name', '$amount', '$paid_to', '$date', '$type')";
      if ($conn->query($sql) === TRUE) {
          $_SESSION['successMsg1'] = "New Transaction: ".$name." added successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $sql0 = "select id from transactions where user_id='$user_id' and name='$name'";
      $result1 = $conn->query($sql0);
      $r1 = $result1->fetch_array();
      $tid = $r1['id'];

      echo $user_id;
      echo $tid;

      if($type == 'bill'){
        $recurrence = $_POST['recurrence'];
        $sql1 = "INSERT INTO bills(t_id, recurrence) VALUES('$tid', '$recurrence')";
        $conn->query($sql1);
      }
      elseif ($type == 'policy'){
        $recurrence = $_POST['recurrence'];
        $enddate = $_POST['enddate'];
        $finalamount = $_POST['famount'];
        $sql2 = "INSERT INTO policies(t_id, recurrence, enddate, final_amount) VALUES('$tid', '$recurrence', '$enddate', '$finalamount')";
        $conn->query($sql2);
      }
      elseif ($type == 'loan'){
        $recurrence = $_POST['recurrence'];
        $totalamount = $_POST['tamount'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];

        $sql3 = "INSERT INTO loans(t_id, recurrence, total_amount, startdate, enddate) VALUES('$tid', '$recurrence', '$totalamount', '$startdate', '$enddate')";
        $conn->query($sql3);
      }
      elseif ($type == 'other'){
        $description = $_POST['t_description'];

        $sql4 = "INSERT INTO others(t_id, t_description) VALUES('$tid', '$description')";
        $conn->query($sql4);
      }
      header("Location: ../userDashboard.php");
      $conn->close();
  }
?>
