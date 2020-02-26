<?php
  session_start();
  $uname = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["username"]))
    {
      $_SESSION["unameErr"] = "* username is required";
    }
    else
    {
      $uname = test_input($_POST["username"]);
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

  $username = $uname;
  $sql = "select id from users where username='$username'";
  $result = $conn->query($sql);
  $r = $result->fetch_array();
  $user_id = $r['id'];

  $sql = "DELETE FROM users where id='$user_id'";

  if($conn->query($sql) === True){
    // echo "succes";
    header("Location: adminDashboard.php");
  }
  else {
    echo "Error :".$conn->error;
  }
?>
