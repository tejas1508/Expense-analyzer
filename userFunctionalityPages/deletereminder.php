<?php
if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "ip-project";

    // get id to delete
    $reminder = $_POST['reminder'];

    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    // mysql delete query
    $query = "DELETE FROM `alerts` WHERE reminder = '$reminder'";

    $result = mysqli_query($connect, $query);

    if($result)
    {
        echo 'Data Deleted';
    }else{
        echo 'Data Not Deleted';
    }
    $connect->close();
    $_SESSION['load'] = 'abcd';
    header("Location: ../userDashboard.php");

}

?>
