<?php
require_once ('connection.php');
date_default_timezone_set("Asia/Calcutta");

$urname = $_POST['name'];
$urphone = $_POST['phone'];
$urtype = $_POST['type'];

$usrid = "tn" . date("Y") . "mtc_";
$sql1 = "select * from users where id=(SELECT max(id) from users) ";
$result = mysqli_query($conn, $sql1);

if ($result != false)
{
    $flag = 1;
    while ($row = mysqli_fetch_array($result))
    {
        $tempid = $row["id"];
        $usrid .= (string)($row["id"] + 1);
    }
}

$sql1 = "select * from users";
$result = mysqli_query($conn, $sql1);

if ($result != false)
{

    while ($row = mysqli_fetch_array($result))
    {
        $tmpph = $row["Phone"];

        if ($tmpph == $urphone)
        {
            $flag = 0;
        }
    }
}
if ($flag)
{
    if ($urtype == "day")
    {
        $date2 = (String)date('d-m-Y');

        $expiry = date('d-m-Y', strtotime($date . ' + 1 days'));
        $sql = "INSERT INTO users(mtcid,Name,Expiry,Phone,Type) VALUES('$usrid','$urname','$expiry','$urphone','$urtype')";
        $res = mysqli_query($conn, $sql);
    }

    elseif ($urtype == "month")
    {
        $date2 = (String)date('d-m-Y');

        $expiry = date('d-m-Y', strtotime($date . ' + 30 days'));
        $sql = "INSERT INTO users(mtcid,Name,Expiry,Phone,Type) VALUES('$usrid','$urname','$expiry','$urphone','$urtype')";
        $res = mysqli_query($conn, $sql);
    }
    $ntable = "CREATE TABLE `$usrid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  
  `Date1` varchar(100) NOT NULL,
  `Time1` varchar(500) NOT NULL,
  PRIMARY KEY (id)
)";
    if (!mysqli_query($conn, $ntable))
    {
        die('Sorry for inconvineince' . mysqli_error($conn));
    }
    else
    {
        echo '<script> alert("Success"); </script>';
        header("Location:index.php");
        exit();
    }

}
else
{
    echo "USER EXITS";
}

?>
