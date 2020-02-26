<?php
  session_start();
  $name = $uname = $email = $pwd1 = $pwd2 = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if (empty($_POST["name"]))
    {
      $_SESSION["nameErr"] = "* Username is required";
    }
    else
    {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["username"]))
    {
      $_SESSION["unameErr"] = "* Username is required";
    }
    else
    {
      $uname = test_input($_POST["username"]);
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"]))
    {
      $_SESSION["emailErr"] = "* Email is required";
    }
    else
    {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["pwd1"]))
    {
        $_SESSION['pwdErr'] = "* Password is required";
    }
    else
    {
        $pwd1 = test_input($_POST["pwd1"]);
    }

    if (empty($_POST["pwd2"]))
    {
        $_SESSION['pwdErr'] = "* Password is required";
    }
    else
    {
        $pwd2 = test_input($_POST["pwd2"]);
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
      die("Connection failed: " . $conn->connect_error);
  }
  $hash = md5($pwd1);
  $sql = "INSERT INTO users(name, username, email, password, role_id) VALUES ('$name', '$uname', '$email', '$hash', 2)";
  if($conn->query($sql) === TRUE){
    header("Location: loginPage.php");
    $_SESSION['successMsg'] = "Registered successfully!";
  }
  else{
    header("Location: registerPage.php");
    $_SESSION['usernameErr'] = "Username not available! Please choose another username";
  }
?>
