<?php
   require_once('connection.php');
   session_start();
   
   $usname=$_COOKIE['Name'];
   $usphone=(String)$_COOKIE['Phone'];
   $sql="SELECT * FROM users WHERE Phone='$usphone' and Name = '$usname'";
   $res=mysqli_query($conn,$sql);
   if (mysqli_num_rows($res) > 0) {
         while($row = mysqli_fetch_assoc($res))
       {
           
           $usrid = $row['mtcid'];
           $type = $row['Type'];
           $from1 = $row['From1'];
           $from2 = $row['From2'];
           $to1 = $row['To1'];
           $to2 = $row['To2'];
                $img = $row['img'];

       
          } 
       
   }
   /* ---- Records -----*/
   $datearr = array();
   $timearr = array();
   $sql="SELECT * FROM $usrid";
   $res=mysqli_query($conn,$sql);
   
         while($row = mysqli_fetch_assoc($res))
       {
           array_push($datearr,$row['Date1']);
           array_push($timearr, $row['Time1']);
           
            }
            $len = sizeof($datearr);    
   
   $propic = 'propic/'.(String)$img; ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Table - Brand</title>
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
            <div class="container-fluid d-flex flex-column p-0">
               <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                  <div class="sidebar-brand-icon"><i class="fas fa-bus-alt"></i></div>
                  <div class="sidebar-brand-text mx-3"><span>MTC Pass</span></div>
               </a>
               <hr class="sidebar-divider my-0">
               <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link  active" href="table.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="buypass.html"><i class="fa fa-rupee"></i><span>Buy Pass</span></a></li>

                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
                </ul>
               <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
         </nav>
         <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                  <div class="container-fluid">
                     <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                     <p class="text-dark" style="text-align: center;font-weight: 800;font-size: 20px;font-family: Nunito, sans-serif;font-style: normal;margin-top: 12px;margin-right: 19px;">MTC Pass</p>
                    <img class="rounded-circle mb-3 mt-4" src="<?php echo $propic; ?>" width="40" height="40">
                  </div>
               </nav>
               <div class="container-fluid">
                  <h3 class="text-dark mb-4">Records</h3>
                  <div class="card shadow">
                     <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Travel Info</p>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                           <table class="table my-0" id="dataTable">
                              <?php 
                                 if($type == "college_two_way"){ 
                                     ?>
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Travel</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    for ($i = 0; $i <= $len-1; $i++) {
                                    if($i % 4 == 0){   ?>
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo "$from1 -"." $to1"; ?></td>
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                 <?php
                                    } 
                                    else if($i % 4 == 1){?>
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo "$from2 -"." $to2"; ?></td>
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                 <?php }
                                    else if($i % 4 == 2){?>
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo "$to2 -"." $from2"; ?></td>
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                 <?php  }else if($i % 4 == 3){  ?>
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo "$to1 -"." $from1"; ?></td>
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                 <?php  }
                                    } ?>
                              </tbody>
                                <?php } 

                                 else if($type == "college_one_way")
                                     { ?>
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Travel</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    for ($i = 0; $i <= $len-1; $i++) {
                                    if($i % 2 == 0){   ?>
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo "$from1 -"." $to1"; ?></td>
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                 <?php
                                    } 
                                    else if($i % 2 == 1){?>
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo "$to1 -"." $from1"; ?></td>
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                 <?php }
                                    }?>
                              </tbody>
                              <?php }else if($type == "day")
                                     { ?>
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    for ($i = 0; $i <= $len-1; $i++) {?>
                                    
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                   
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                
                                 
                                 <?php } ?>
                              </tbody>
                              <?php
                                   }else {?>
                                      <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    for ($i = 0; $i <= $len-1; $i++) {?>
                                    
                                 <tr>
                                    <td><?php echo $i+1; ?></td>
                                   
                                    <td><?php echo "$datearr[$i]"; ?></td>
                                    <td><?php echo "$timearr[$i]"; ?></td>
                                 </tr>
                                
                                 
                                 <?php } ?>
                              </tbody>
                              <?php
                                   }?>

                           </table>
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
         </div>
         <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
      <script src="assets/js/theme.js"></script>
   </body>
</html>