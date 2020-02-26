<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ip-project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_SESSION['currentUser'];
    $sql = "select id from users where username='$username'";
    $result = $conn->query($sql);
    $r = $result->fetch_array();
    $user_id = $r['id'];

    $sql = "INSERT INTO trendings(user_id, title, t_description) VALUES ('$user_id', '$title', '$description')";
    if($conn->query($sql) === TRUE){
      header("Location: adminDashboard.php");
    }
    else{
      echo $conn->error;
    }
  }
