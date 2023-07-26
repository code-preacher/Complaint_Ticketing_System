<?php
error_reporting(true);
include_once "../library/lib.php";
include_once "../classes/crud.php";

$crud=new Crud;

$lib=new Lib;

$lib->check_login();

if (isset($_POST['submit'])) {
 $crud->insertComplain($_POST['course']);
}

$student=$crud->displayOneByEmail('student',$_SESSION['id']);
$lecturer=$crud->displayAllSpecificWithOrder('lecturer','department_id',$student['department_id'],'id','desc');
$course=$crud->displayAll('course');
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add Complain</a></li>
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
                                <h4>ADD COMPLAIN</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="add-complain.php" method="POST">

                                        <input type="hidden" class="form-control input-rounded" name="tid" value="<?=$lib->gen_receipt()?>">

                                        <input type="hidden" class="form-control input-rounded" name="matric_no" value="<?=$student['matric_no']?>">

                                          <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Select Lecturer:</p>
                                                <select class="form-control input-rounded" name="lecturer_id"  required="required">
                                                    <?php foreach ($lecturer as $s) { ?>
                                                     <option value="<?=$s['id']?>"><?php echo strtoupper($s['name']);?></option>
                                                 <?php  } ?>

                                             </select>
                                         </div>
                                       
                                          <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Course of Complain :</p>
                                                <select class="form-control input-rounded" name="course_id"  required="required">
                                                    <?php foreach ($course as $s) { ?>
                                                     <option value="<?=$s['id']?>"><?php echo strtoupper($s['name']);?></option>
                                                 <?php  } ?>
                                             </select>
                                         </div>

                                          <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Complain :</p>
                                                <textarea  name="msg1" style="width: 100%;height: 200px;" required="required"></textarea>
                                         </div>
                                            

                                            <div class="form-actions">
                                                <button type="submit" name="submit" class="btn btn-success col-md-3"> <i class="fa fa-plus"></i> Send Complain</button>
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