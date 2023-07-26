<?php
error_reporting(true);
include_once "../library/lib.php";
include_once "../classes/crud.php";

$crud=new Crud;

$lib=new Lib;

$lib->check_login();

if (isset($_POST['sub'])) {
 $crud->StudentComplainG($_POST);
}

$student=$crud->displayOneByEmail('student',$_SESSION['id']);
$reply=$crud->displayAllSpecificWithOrder3('complain_g','sender',$student['matric_no'],'reciever',$student['matric_no'],'id','desc');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title> STUDENT COMPLAINT TICKETING MANAGEMENT SYSTEM</title>
    
    <!-- Basic SEO -->
    <meta name="description" content=" STUDENT COMPLAINT TICKETING MANAGEMENT SYSTEM">
    <meta name="keywords" content=" STUDENT COMPLAINT TICKETING MANAGEMENT SYSTEM">

    <!-- Favicon -->
    <link rel="icon" type="img/jpg" href="img/bsu2.jpg">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Make Complain</a></li>
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
                                    <h4>MAKE COMPLAIN</h4>

                                    <p><?php $lib->msg(); ?></p>

                                </div>
                                <div class="card-body">
                                    <div class="card-content">
                                        <!-- Left sidebar -->
                                        
                                        <div class="mt-2">

                                            <form action="#" role="form" method="POST">
                                                
                                                <div class="form-group">
                                                    <textarea name="complain" rows="8" cols="80" class="form-control" style="height:100px">
                                                    </textarea>

                                                    <input type="hidden" name="matric_no" value="<?=$student['matric_no']?>">
                                                </div>

                                                <div class="form-group m-b-0">
                                                    <div class="text-right">
                                                        
                                                        <button type="reset" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>
                                                        <button type="submit" name="sub" class="btn btn-purple waves-effect waves-light"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                                    </div>
                                                </div>

                                            </form>


                                        </div>

                                        <div class="clearfix"></div>

                                    </div>

                                </div>


                            </div>


 <?php
                            if ($reply) {
                            
                            foreach ($reply as $row3) {
                               $sender=$row3['sender'];  
                               $rs= $crud->displayByMatno($row3['sender']) ;
                               $dept=$crud->displayNameById('department',$rs['department_id']);
                               $message=$row3['message'];
                               $date=$row3['date_created'];
                               $replied=empty($row3['reply'])?"admin is yet to attend to complain":$row3['reply'];
                               ?>

                               <div class="col-lg-10 offset-lg-1">
                                <div class="card">
                                    <div style="padding: 2px;">
                                     Complain :  <?php echo $message."<br/>"."<hr/>";?>
                                     Reply :  <?php echo $replied."<br/>"."<hr/>
                                     <div class='offset-lg-3'>".'('.strtoupper($rs['name']).' : '.strtoupper($sender).') '.$dept.' DEPARTMENT'."&nbsp;&nbsp;&nbsp;@&nbsp;&nbsp;".strtoupper($date)."</div>"; ?>

                                 </div>
                             </div><br/>
                         </div>
                         
                         
                         <?php          
                     }     # code...
                            } else {?>
                                 <div class="col-lg-12">
                                <div class="card">
                                    <div style="padding: 2px;">
                                   <b>NO PENDING COMPLAIN AT THE MOMENT</b>
                                 </div>
                             </div><br/>
                         </div>
                          <?php  }  ?>
                     
                     




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