<?php session_start(); ?>
<?php echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; ?>
<?php
if (isset($_POST['name'])&&isset($_POST['email'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobno=$_POST['mobno'];
  $subject=$_POST['subject'];
  $body=$_POST['body'];

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
  // $username = $_SESSION['currentUser'];
  // $sql = "select id from users where username='$username'";
  // $result = $conn->query($sql);
  // $r = $result->fetch_array();
  // $user_id = $r['id'];

  $sql = "INSERT INTO contactus(name,email,mobno,subject,body) VALUES('$name','$email','$mobno','$subject','$body')";

  if ($conn->query($sql) === TRUE) {
      $_SESSION['successMsg3'] = "We will contact you soon".$name."have a nice day!!";

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
 ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
    if (isset($_POST['name'])&&isset($_POST['email'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $subject=$_POST['subject'];
      $body=$_POST['body'];
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
      $mail->Username = "com";
      $mail->Password="";
      $mail->Port=587;
      $mail->SMTPSecure ="tls";
      $mail->Host = 'tls://smtp.gmail.com:587';
      $mail->isHTML(true);
      $mail->setFrom($email,$name);
      $mail->addAddress("");
      $mail->Subject=$subject;
      $mail->Body = $body;

      if($mail->send()){
        $response = "Email is send";
        $_SESSION['successMsg'] = "Response sent successfully";
        header("Location: contactus.php");
        // header("Location: contactus.php");
      }
      else {
        $response = "something is wrong <br><br>".$mail->ErrorInfo;
      }
      exit(json_encode(array("response"=>$response)));
    }
?>
