<?php
date_default_timezone_set("Asia/Calcutta"); 
require_once('connection.php');
$usname=$_COOKIE['Name'];
$usphone=(String)$_COOKIE['Phone'];
$sql="SELECT * FROM users WHERE (Phone='$usphone' and Name = '$usname')";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res) > 0) {
      while($row = mysqli_fetch_assoc($res))
    {
        $usrid = $row['mtcid'];
        $name = $row['Name'];
        $phone = $row['Phone'];
        $expiry = $row['Expiry'];
        $from = $row['From1'];
        $to = $row['To1'];
        $from2 = $row['From2'];
        $to2 = $row['To2'];
        $type = $row['Type'];   
        $img = $row['img'];
        $aad = $row['aadhaar'];
        $pro = $row['proof'];

   
       } 
    
}
else {
    echo "invlaid";
    }

   $propic = 'propic/'.(String)$img;
   $aadhar = 'aadhaar/'.(String)$aad;
   $proof = 'proof/'.(String)$pro;
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
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
                    <li class="nav-item"><a class="nav-link " href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
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
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="rounded-circle mb-3 mt-4" src="<?php echo $propic; ?>" width="160" height="160">
                                   
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-8">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Details</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Name</strong></label><br>
                                                            <?php echo "$name"; ?></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Phone</strong></label><br>
                                                            <?php echo "$phone"; ?></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>Expiry</strong></label><bR><?php echo "$expiry"; ?></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Type</strong></label><br>
                                                            <?php
                                                            if($type == 'college_one_way'){
                                                                echo "College 1 Way";
                                                            }
                                                            else if($type == 'college_two_way'){
                                                                echo "College 2 Way";
                                                            }
                                                            else if($type == 'day_pass'){
                                                                echo "Day Pass - ₹50";

                                                            } 
                                                            else{
                                                                echo "Month Pass - ₹1000";

                                                            }?>

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Route Data</p>
                                        </div>
                                        <div class="card-body">
                                                <?php if ($type == "college_two_way") { ?>
                                                    
                                            
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="city"><strong>Route 1</strong></label><br>
                                                            <?php echo $from.' - '.$to; ?></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="country"><strong>Route 2</strong></label><br>
                                                            <?php echo $from2.' - '.$to2; ?></div>
                                                    </div>
                                                </div>
                                                   <?php }  else { ?>
                                                    <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="city"><strong>Route 1</strong></label><br>
                                                            <?php echo $from.' - '.$to; ?></div>
                                                    </div>
                                                    
                                                </div>

                                                  <?php } ?>
                                                <div class="form-group"><a class="btn btn-primary btn-sm" href="table.php"> See Travel Details</a></div>
                                                
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                  
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Aadhar and Proof</p>
                                        </div>
                                        <div class="card-body">
                                                
                                                    
                                            
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="city"><strong>Aadhaar</strong></label><br>
                                                           <a class="btn btn-primary" href = "<?php echo $aadhar; ?>">View</a> </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="country"><strong>Proof</strong></label><br>
                                                           <a class="btn btn-primary" href = "<?php echo $proof; ?>">View</a> </div>
                                                    </div>
                                                </div>
                                                   

                                                
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="row">
                    <div class="col">
                        <h4 class="text-center">Time</h4>
                    </div>
                </div>
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © E Bus Pass 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>