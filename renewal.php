<?php

require_once('connection.php');
$name = $_COOKIE['Name'];
$phone = $_COOKIE['Phone'];
$sql = "SELECT * FROM users WHERE Name = '$name' AND Phone = '$phone'";
$res = mysqli_query($conn , $sql);
if(mysqli_num_rows($res)  > 0){
	while($row = mysqli_fetch_array($res)){
		$type = $row['Type'];
		$exp = $row['Expiry'];
	}
}

if(($type == 'college_one_way') or ($type == 'college_two_way')){
	$str_month =  substr($exp, 3 , 2);
	$int_month = (int)$str_month;
	$month =  sprintf("%02d", $int_month+1);
	$year = date('Y');
    $expiry_reg = '11-'.$month.'-'.$year;
    $sql = "UPDATE users SET Expiry = '$expiry_reg' , Due_Paid = 'Paid' , Due_crossed = 0 WHERE Name = '$name' AND Phone = '$phone'";
    $res = mysqli_query($conn , $sql);
    header("Location:payment.php");


}
else{
	$tempexp = strtotime($exp);
	

}

?>