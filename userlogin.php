<?php
require_once('connection.php');
if(isset($_COOKIE['Phone'])) {
  $usname = $_COOKIE['Name'];
  $usphone = $_COOKIE['Phone'];

}
else{
$usname=$_POST['name'];
$usphone=$_POST['number'];
}
$sql="SELECT * FROM users WHERE Phone='$usphone' and Name = '$usname'";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res) > 0) {
      while($row = mysqli_fetch_assoc($res))
    {
        
     
	setcookie('Phone', $usphone, time() + (86400 * 3000));
	setcookie('Name', $usname, time() + (86400 * 3000));

 
    
	header("Location:dashboard.php");
       } 
	
}
else {
	echo "invlaid";
	}