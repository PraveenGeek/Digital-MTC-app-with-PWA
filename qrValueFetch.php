<?php 
require_once('connection.php');
$busno =  $_GET['qrValue'];
session_start();
$usname=$_COOKIE['Name'];
$usphone=(String)$_COOKIE['Phone'];
$sql="SELECT * FROM users WHERE (Phone='$usphone' and Name = '$usname')";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res) > 0) {
      while($row = mysqli_fetch_assoc($res))
    {
        $usrid = $row['mtcid'];
        $count = $row['Count'];
        $from = $row['From1'];
        $to = $row['To1'];
        $from2 = $row['From2'];
        $to2 = $row['To2'];
        $type = $row['Type'];   
         $img = $row['img'];
   
       } 
    
}
else {
    echo "invlaid";
    }

function clean($string)
{
    $string = str_replace(' ', '', $string);

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}

$sql2 = "SELECT * FROM routes WHERE bus_no = '$busno'";

    $res = mysqli_query($conn, $sql2);
    $name = "";
    if (mysqli_num_rows($res) > 0)
    {
        while ($row = mysqli_fetch_assoc($res))
        {
            $name = $row["bus_route"];
            $array = explode(",", $name);
            if ((in_array(clean($from), $array)) && (in_array(clean($to), $array)))
            {
            	$_SESSION['from1_sess'] = $from;
            	$_SESSION['to1_sess'] = $to;
               header("Location:addcount.php");

            }
            else if(  (in_array(clean($from2), $array)) && (in_array(clean($to2), $array)) ){
            	$_SESSION['from2_sess'] = $from2;
            	$_SESSION['to2_sess'] = $to2;
            	header("Location:addcount.php");

            }

        }

    }
?>