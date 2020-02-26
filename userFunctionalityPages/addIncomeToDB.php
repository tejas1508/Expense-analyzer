<?php
  session_start();
  $name = $recurrence = $amount = $user_id = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"]))
    {
      $_SESSION["nameErr"] = "* name is required";
    }
    else
    {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["recurrence"]))
    {
      $_SESSION["recurErr"] = "* recurrence is required";
    }
    else
    {
      $recurrence = test_input($_POST["recurrence"]);
    }

    if (empty($_POST["amount"]))
    {
      $_SESSION["amtErr"] = "* amount is required";
    }
    else
    {
      $amount = test_input($_POST["amount"]);
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

  $sql = "INSERT INTO income_srcs(name, recurrence, amount, user_id) VALUES('$name', '$recurrence', '$amount', '$user_id')";
  if ($conn->query($sql) === TRUE) {
      $_SESSION['successMsg1'] = "New Income Source: ".$name." added successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  $_SESSION['load'] = 'abcd';
  header("Location: ../userDashboard.php");

?>
