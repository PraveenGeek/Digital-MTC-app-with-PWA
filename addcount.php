<?php
require_once ('connection.php');
session_start();
date_default_timezone_set("Asia/Calcutta");

$usname = $_COOKIE['Name'];
$usphone = (String)$_COOKIE['Phone'];
$sql = "SELECT * FROM users WHERE Phone='$usphone' and Name = '$usname'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0)
{
    while ($row = mysqli_fetch_assoc($res))
    {
        $count = $row['Count'];
        $usrid = $row['mtcid'];
        $type = $row['Type'];

    }

}

if ($type == 'college_one_way')
{

    if ($count >= 2)
    {
        echo "<script type='text/javascript'>alert('Quota Exccessed');</script>";
        echo "<script>document.location = 'dashboard.php';</script>";

    }
    else
    {
        $count++;

        $sql1 = "UPDATE users SET Count = '$count' WHERE Phone='$usphone' and Name = '$usname'";
        mysqli_query($conn, $sql1);
        /*---------Date nd time -------------*/

        $time = date("h:i A");
        $date = date("jS - m - Y");

        $sql2 = "INSERT INTO $usrid(Date1 , Time1) VALUES('$date' , '$time')";
        mysqli_query($conn, $sql2);

        header("location:dashboard.php");
    }

}
else if ($type == 'college_two_way')
{
    if ($count >= 4)
    {
        echo "<script type='text/javascript'>alert('Quota Exccessed');</script>";
        echo "<script>document.location = 'dashboard.php';</script>";

    }
    else
    {
        $count++;

        $sql1 = "UPDATE users SET Count = '$count' WHERE Phone='$usphone' and Name = '$usname'";
        mysqli_query($conn, $sql1);
        /*---------Date nd time -------------*/

        $time = date("h:i A");
        $date = date("jS - m - Y");

        $sql2 = "INSERT INTO $usrid(Date1 , Time1) VALUES('$date' , '$time')";
        mysqli_query($conn, $sql2);

        header("location:dashboard.php");
    }

}
else if ($type == 'day')
{
    if ($count >= 50)
    {
        echo "<script type='text/javascript'>alert('Quota Exccessed');</script>";
        echo "<script>document.location = 'dashboard.php';</script>";

    }
    else
    {
        $count++;

        $sql1 = "UPDATE users SET Count = '$count' WHERE Phone='$usphone' and Name = '$usname'";
        mysqli_query($conn, $sql1);
        /*---------Date nd time -------------*/

        $time = date("h:i A");
        $date = date("jS - m - Y");

        $sql2 = "INSERT INTO $usrid(Date1 , Time1) VALUES('$date' , '$time')";
        mysqli_query($conn, $sql2);

        header("location:dashboard.php");
    }

}

else if ($type == 'month')
{
    if ($count >= 50)
    {
        echo "<script type='text/javascript'>alert('Quota Exccessed');</script>";
        echo "<script>document.location = 'dashboard.php';</script>";

    }
    else
    {
        $count++;

        $sql1 = "UPDATE users SET Count = '$count' WHERE Phone='$usphone' and Name = '$usname'";
        mysqli_query($conn, $sql1);
        /*---------Date nd time -------------*/

        $time = date("h:i A");
        $date = date("jS - m - Y");

        $sql2 = "INSERT INTO $usrid(Date1 , Time1) VALUES('$date' , '$time')";
        mysqli_query($conn, $sql2);

        header("location:dashboard.php");
    }

}
?>
