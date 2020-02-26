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
  // $username = $_SESSION['currentUser'];
  // $sql = "select id from users where username='$username'";
  // $result = $conn->query($sql);
  // $r = $result->fetch_array();
  // $user_id = $r['id'];

  $sql2 = "SELECT * FROM contactus";
  $result2 = $conn->query($sql2);
  $conn->close();
?>

<div class="card shadow1" id="abcd">
  <table class="table">
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Title</th>
      <th>Description</th>
    </tr>
      <?php foreach ($result2 as $res) { ?>
        <tr>
        <td>
          <?php echo $res['name']; ?>
        </td>
        <td>
          <?php echo $res['email']; ?>
        </td>
        <td>
          <?php echo $res['subject']; ?>
        </td>
        <td>
          <?php echo $res['body']; ?>
        </td>
      </tr>
      <?php } ?>
    </table>
</div>
