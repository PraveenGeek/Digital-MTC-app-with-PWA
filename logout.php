<?php
if (isset($_COOKIE['Phone'])) {
    unset($_COOKIE['Name']); 
    unset($_COOKIE['Phone']);
    setcookie("Name", "", time()-3600);
    setcookie("Phone", "", time()-3600);

 


// destroy the session
echo "<script>window.location.href = 'index.php';</script>";

    
} 




?>