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

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<div class="card shadow1" id="abcd">
  <h2>Current active users are :</h2>
  <table class="table">
    <tr>
      <th>User Id</th>
      <th>Username</th>
    </tr>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td>
            <?php echo $row['id']; ?>
          </td>
          <td>
            <?php echo $row['username']; ?>
          </td>
        </tr>
      <?php } ?>
    </table>
<!-- </div>
<div id="form"> -->
  <form class="form-group" action="deleteUser.php" method="post">
    <div class="row">
      <div class="col-25">
          <label for="username">Enter username :</label>
      </div>
      <div class="col-75">
        <input type="text" name="username" value="">
      </div>
    </div>
    <div class="row">
      <button type="submit" name="button" class="button btnFade btnBlueGreen">Delete</button>
    </div>
  </form>
</div>
