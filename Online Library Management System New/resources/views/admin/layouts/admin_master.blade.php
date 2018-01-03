<?php
//session_start();
//error_reporting(0);
//include('includes/config.php');
//if(strlen($_SESSION['login'])==0)
//  { 
//header('location:index.php');
//}
//else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{asset('public/frontEnd/')}}/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="{{asset('public/frontEnd/')}}/assets/css/font-awesome.css" rel="stylesheet" />
    
        <link href="{{asset('public/frontEnd/')}}/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{asset('public/frontEnd/')}}/assets/css/style.css" rel="stylesheet" />
    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php //include('includes/header.php');?>
              <!------MENU SECTION START-->

        @include('admin.layouts.header')
        <!-- MENU SECTION END-->
        @yield('content')
        <!-- CONTENT-WRAPPER SECTION END-->


        @include('admin.layouts.footer')

     <!-- CONTENT-WRAPPER SECTION END-->
<?php //include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="{{asset('public/frontEnd/')}}/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{asset('public/frontEnd/')}}/assets/js/bootstrap.js"></script>
    
        <script src="{{asset('public/frontEnd/')}}/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="{{asset('public/frontEnd/')}}/assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="{{asset('public/frontEnd/')}}/assets/js/custom.js"></script>
</body>
</html>
<?php //} ?>
