<?php

require_once('connection.php');
$sql1 = "UPDATE users SET Count = '0'";
mysqli_query($conn, $sql1);

?>