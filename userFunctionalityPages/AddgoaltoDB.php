<?php
  session_start();
  $goaltype = $startdate = $enddate = $goalamount = $ginvestpmonth=$user_id = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["goaltype"]))
    {
      $_SESSION["goaltypeErr"] = "* Goal type is required";
    }
    else
    {
      $goaltype = test_input($_POST["goaltype"]);
    }

    if (empty($_POST["startdate"]))
    {
      $_SESSION["startdateErr"] = "* Start date is required";
    }
    else
    {
      $startdate = test_input($_POST["startdate"]);
    }
    if (empty($_POST["enddate"]))
    {
      $_SESSION["enddateErr"] = "* End date is required";
    }
    else
    {
      $enddate = test_input($_POST["enddate"]);
    }

    if (empty($_POST["goalamount"]))
    {
      $_SESSION["goalamtErr"] = "* Goal amount is required";
    }
    else
    {
      $goalamount = test_input($_POST["goalamount"]);
    }
    if (empty($_POST["ginvestpmonth"]))
    {
      $_SESSION["ginvestamtErr"] = "* Goal Invest is required";
    }
    else
    {
      $ginvestpmonth = test_input($_POST["ginvestpmonth"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

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

  $sql = "INSERT INTO goals1 (user_id, goaltype, startdate, enddate, goalamount,ginvestpmonth) VALUES('$user_id', '$goaltype','$startdate','$enddate','$goalamount','$ginvestpmonth')";

  if ($conn->query($sql) === TRUE) {
      $_SESSION['successMsg1'] = "New Goal ".$goaltype." created successfully";

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  // $sql1 = "INSERT INTO transactions(user_id, name, amount, paid_to, date_time, type) VALUES('$user_id', '$goaltype', '$ginvestpmonth', 'self', '$startdate', 'savings')";
  // if ($conn->query($sql1) === TRUE) {
  //     $_SESSION['successMsg'] = "New record 1 created successfully";
  //     $successmessage="New record 1created successfully";
  // }
  $conn->close();
  $_SESSION['load'] = 'abcd';
  header("Location: ../userDashboard.php");

?>
