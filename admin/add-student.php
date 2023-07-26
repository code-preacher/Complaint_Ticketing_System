<?php
error_reporting(true);
include_once "../library/lib.php";
include_once "../classes/crud.php";

$crud=new Crud;
$department=$crud->displayAll('department');
$course=$crud->displayAll('course');
$state=$crud->displayAll('state');

$lib=new Lib;

$lib->check_login();

if (isset($_POST['submit'])) {
 $crud->insertStudent($_POST);
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>STUDENT COMPLAINT TICKETING MANAGEMENT SYSTEM DASHBOARD</title>
    
    <!-- Basic SEO -->
     <meta name="description" content="STUDENT COMPLAINT TICKETING MANAGEMENT SYSTEM ">
    <meta name="keywords" content="STUDENT COMPLAINT TICKETING MANAGEMENT SYSTEM ">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/">
 
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->


    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
   <?php
include "inc/header.php";
   ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
   <?php
include "inc/sidebar.php";
   ?>     
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add Student</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>ADD STUDENT</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="add-student.php" method="POST">
                                          
                                         
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Student Matric Number :</p>
                                                <input type="text" class="form-control input-rounded" name="matric_no" placeholder="Please enter matno" required="required">
                                            </div>


                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Student Name :</p>
                                                <input type="text" class="form-control input-rounded" name="name" placeholder="Please enter name" required="required">
                                            </div>


                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Email :</p>
                                                <input type="text" class="form-control input-rounded" name="email" placeholder="Please enter email" required="required">
                                            </div>

                                            
                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Password :</p>
                                                <input type="text" class="form-control input-rounded" name="password" placeholder="Please enter password" required="required">
                                            </div>

                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Phone :</p>
                                                <input type="text" class="form-control input-rounded" name="phone" placeholder="Please enter phone number" required="required">
                                            </div>

                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Address :</p>
                                                <input type="text" class="form-control input-rounded" name="address" placeholder="Please enter address" required="required">
                                            </div>


                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Select Gender :</p>
                                                <select class="form-control input-rounded" name="gender"  required="required">
                                                     <option value="MALE">MALE</option>
                                                     <option value="FEMALE">FEMALE</option>
                                             </select>
                                         </div>

                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Select State :</p>
                                                <select class="form-control input-rounded" name="state_id"  required="required">
                                                    <?php foreach ($state as $s) { ?>
                                                     <option value="<?=$s['id']?>"><?php echo strtoupper($s['name']);?></option>
                                                 <?php  } ?>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Select Department :</p>
                                                <select class="form-control input-rounded" name="department_id"  required="required">
                                                    <?php foreach ($department as $s) { ?>
                                                     <option value="<?=$s['id']?>"><?php echo strtoupper($s['name']);?></option>
                                                 <?php  } ?>
                                             </select>
                                         </div>


                                          <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Select Course :</p>
                                                <select class="form-control input-rounded" name="course_id"  required="required">
                                                    <?php foreach ($course as $s) { ?>
                                                     <option value="<?=$s['id']?>"><?php echo strtoupper($s['name']);?></option>
                                                 <?php  } ?>
                                             </select>
                                         </div>


                                     </div>

                                            

                                            <div class="form-actions">
                                                <button type="submit" name="submit" class="btn btn-success col-md-3"> <i class="fa fa-plus"></i> Add</button>
                                                <button type="reset" class="btn btn-inverse col-md-3"><i class="fa fa-refresh"></i> Clear</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

<!-- FOOTER REGION -->
<?php
include "inc/footer.php";
?>

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>