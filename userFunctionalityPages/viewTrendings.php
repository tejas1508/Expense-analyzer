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

  $sql = "SELECT * FROM trendings";
  if($conn->query($sql)){
    $result = $conn->query($sql);
  }
  else {
    echo "string".$conn->error;
  }
  $conn->close();
?>

<div class="card shadow1" id="abcd">
  <table class="table">
    <tr>
      <th>Title</th>
      <th>Details</th>
    </tr>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
        <td>
          <?php echo $row['title']; ?>
        </td>
        <td>
          <?php echo $row['t_description']; ?>
        </td>
      </tr>
      <?php } ?>
    </table>
</div>
