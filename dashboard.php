<?php
date_default_timezone_set("Asia/Calcutta");
require_once ('connection.php');
session_start();
/*
$from1_sess = $_SESSION['from1_sess'];
$from2_sess = $_SESSION['from2_sess'];
$to1_sess = $_SESSION['to1_sess'];
$to2_sess = $_SESSION['to2_sess'];
*/

$date = date('d');
$usname = $_COOKIE['Name'];
$usphone = (String)$_COOKIE['Phone'];
$sql = "SELECT * FROM users WHERE (Phone='$usphone' and Name = '$usname')";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0)
{
    while ($row = mysqli_fetch_assoc($res))
    {
        $usrid = $row['mtcid'];
        $count = $row['Count'];
        $from = $row['From1'];
        $to = $row['To1'];
        $from2 = $row['From2'];
        $to2 = $row['To2'];
        $type = $row['Type'];
        $img = $row['img'];
        $due = $row['Due_Paid'];
        $due_cross = $row['Due_crossed'];
    }
}
else
{
    echo "invlaid";
}
$propic = 'propic/' . (String)$img;

/*
$no_check_arr =array('<div class="text-center text-dark font-weight-bold h5 mb-0"><i class="far fa-circle"></i></div>', '<div class="text-center text-dark font-weight-bold h5 mb-0"><i class="far fa-circle"></i></div>', '<div class="text-center text-dark font-weight-bold h5 mb-0"><i class="far fa-circle"></i></div>', '<div class="text-center text-dark font-weight-bold h5 mb-0"><i class="far fa-circle"></i></div>');

$check_arr = array('<div class="text-center text-dark font-weight-bold h5 mb-0"><a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a></div>', '<div class="text-center text-dark font-weight-bold h5 mb-0"><a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a></div>', '<div class="text-center text-dark font-weight-bold h5 mb-0"><a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a></div>', '<div class="text-center text-dark font-weight-bold h5 mb-0"><a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a></div>'); */

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/icon-512x512.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><i class="fas fa-bus-alt"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>MTC Pass</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="buypass.html"><i class="fa fa-rupee"></i><span>Buy Pass</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <p class="text-dark" style="text-align: center;font-weight: 800;font-size: 20px;font-family: Nunito, sans-serif;font-style: normal;margin-top: 12px;margin-right: 19px;">MTC Pass</p><img class="rounded-circle mb-3 mt-4" src="<?php echo $propic; ?>" width="40" height="40"></a>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center text-dark mb-0">ID: <?php echo "$usrid"; ?></h3>
                        </div>
                        <?php  
                        if ($date <= 30 && $due != 'Paid' && $due_cross == 0) { ?>
                        	 
                      
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><a class="btn btn-light btn-lg d-flex justify-content-center btn-icon-split" href="scan.html" role="button"><span class="text-black-50 icon"><i class="fas fa-qrcode"></i></span><span class="text-dark text">Scan MTC Code</span></a></div>
                                    </div>
                                    <bR>
                                    <p class="text-center text-dark" style="color: rgb(90, 92, 105);font-weight: bold;font-style: normal;">OR</p>
                                    <div class="row">
                                        <div class="col d-sm-flex justify-content-sm-center"><a class="btn btn-primary btn-sm d-flex justify-content-center btn-icon-split" href="renewal.php" role="button"><span class="text-white text">&nbsp;Renew&nbsp;</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    <?php }else if ($due == 'Due' && $due_cross == 1) {?> 
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <center>
                                    <small>To Scan further Pls Renew</small>
                                    </center>
                                    <div class="row">
                                        <div class="col d-sm-flex justify-content-sm-center"><a class="btn btn-primary btn-sm d-flex justify-content-center btn-icon-split" href="renewal.php" role="button"><span class="text-white text">&nbsp;Renew&nbsp;</span></a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div><?php } else  {?>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><a class="btn btn-light btn-lg d-flex justify-content-center btn-icon-split" href="scan.html" role="button"><span class="text-black-50 icon"><i class="fas fa-qrcode"></i></span><span class="text-dark text">Scan MTC Code</span></a></div>
                                    </div>
                                    <bR>
                                    
                                </div>
                            </div>
                        </div>  





                        <?php } ?>    






                         <?php 
                        if($type == "college_one_way" ){
                            ?>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2"><span class="text-center text-success"><?php echo "$from"; ?>  <i class="fa fa-retweet"></i>  <?php echo "$to"; ?></span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                       
                        
                       <?Php if($count == 0){
                           echo '<div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0"><i class="far fa-circle"></i></div></div><div class="col"><div class="text-center text-dark font-weight-bold h5 mb-0"><i class="far fa-circle"></i></div></div>';
                        }
                        else if($count == 1){
                            echo '<div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0">
                            <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a></div></div><div class="col"><div class="text-center text-dark font-weight-bold h5 mb-0"><i class="far fa-circle"></i></div></div>';

                        } else if($count == 2){
                            echo '<div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0"><a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a></div></div><div class="col"><div class="text-center text-dark font-weight-bold h5 mb-0"><a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a></div></div>';

                        }?>
                   
                                    </div>
                                </div>
                            </div>
                        </div>
    <!-------------------------->
                   <?php } 
                        else if($type == "college_two_way"){
                            ?>
                     
                       <?php /*
                       for ($i=0  ; $i < $count  ; $i++) { 
                        if ($from == $from1_sess ) {
                             echo $check_arr[$i];
                           
                        }
                        else  if ($from2_sess == $from2)  {
                     
                             echo '2'.$check_arr[$i];
                        }
                       
                       }
                       for ($j=3 ; $j >= $count  ; $j--) { 
                        if ($from == $from1_sess ) {
                             echo $check_arr[$j];
                            # code...
                        }
                        else  if ($from2_sess == $from2){
                             echo '2'.$check_arr[$j];
                        }
                       }

                    */    ?>     	
                                   
                                    
                               
                       <?Php if($count == 0){
                           echo '<div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from.' 
                            <i class="fa fa-retweet"></i>  '.$to.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from2.'
                            <i class="fa fa-retweet"></i>'.$to2.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>';
                        }
                       else if($count == 1){
                           echo '<div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from.' 
                            <i class="fa fa-retweet"></i>  '.$to.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from2.'
                            <i class="fa fa-retweet"></i>'.$to2.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>';
                        }
                       else if($count == 2){
                           echo '<div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from.' 
                            <i class="fa fa-retweet"></i>  '.$to.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from2.'
                            <i class="fa fa-retweet"></i>'.$to2.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>';
                        }
                       else if($count == 3){
                           echo '<div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from.' 
                            <i class="fa fa-retweet"></i>  '.$to.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <i class="far fa-circle"></i>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from2.'
                            <i class="fa fa-retweet"></i>'.$to2.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>';
                        }
                        else if($count == 4){
                           echo '<div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from.' 
                            <i class="fa fa-retweet"></i>  '.$to.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                            <span class="text-center text-success">'.$from2.'
                            <i class="fa fa-retweet"></i>'.$to2.'
                            </span>
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <div class="col mr-2"><div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="text-center text-dark font-weight-bold h5 mb-0">
                                    <a class="btn btn-success btn-circle ml-1" role="button"><i class="fas fa-check text-white"></i></a>
                                    </div>
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>';
                        }
                       
                       
                                    
                       
                       
                           
                   }
                  
                   ?>

                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="row">
                    <div class="col">
                        <h4 class="text-center"><?php echo  date("h:i A"); ?></h4>
                    </div>
                </div>
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © E Bus Pass 2021</span></div>
                </div>
            </footer>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>