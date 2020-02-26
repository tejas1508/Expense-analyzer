<?php session_start(); ?>
<?php echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; ?>
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
    $username = $_SESSION['currentUser'];
    $sql = "select id from users where username='$username'";
    $result = $conn->query($sql);
    $r = $result->fetch_array();
    $user_id = $r['id'];

    $sql2 = "SELECT email FROM users WHERE username='$username'";
    $result2 = $conn->query($sql2);
      foreach ($result2 as $res3) {
      $email=$res3['email'];
      }
    $sql3= "UPDATE alerts SET mailsent=1 WHERE user_id=$user_id and reminder='House Rent'";
    $result3 = $conn->query($sql3);
    $conn->close();


    use PHPMailer\PHPMailer\PHPMailer;
      $body="Your House Rent is due";
      $subject="reminder mail success";
      require_once "PHPMailer/PHPMailer.php";
      require_once "PHPMailer/SMTP.php";
      require_once "PHPMailer/Exception.php";
      require_once "PHPMailer/OAuth.php";
      require_once "PHPMailer/POP3.php";

      $mail = new PHPMailer();

      //SMTP iis_set_app_settings

      $mail->isSMTP();
      $mail->HOST = "smtp.gmail.com";
      $mail->SMTPAuth = true;
      $mail->Username = "";
      $mail->Password="";
      $mail->Port=587;
      $mail->SMTPSecure ="tls";
      $mail->Host = 'tls://smtp.gmail.com:587';
      $mail->isHTML(true);
      $mail->setFrom($email,$username);
      $mail->addAddress($email);
      $mail->Body = $body;
      $mail->Subject=$subject;
      // $mail->Body = $body;

      if($mail->send()){
        $response = "Email is send";
        $_SESSION['successMsg1'] = "Reminder Sent Successfully";
        header("Location: http://localhost/ip-project-19-20/userDashboard.php#");
        // $_SESSION['load'] = 'abcd';
        // header("Location: ../userDashboard.php");
        // header("Location: contactus.php");
      }
      else {
        $response = "something is wrong <br><br>".$mail->ErrorInfo;
      }

?>
