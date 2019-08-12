<?php //session_start();      ?>

<?php
include_once 'connection.php';

date_default_timezone_set('Asia/Colombo');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MediSYS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Ionicons 2.0.0 -->
        <link href="bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo"><b>Medi</b>SYS</a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle1" data-toggle="offcanvas" role="button">
                        <img src="images/menu.png" height="48" width="48">
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="images/exit.png" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs">Logout</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="" class="img-circle" alt="User Image" />
                                        <p>

                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />     -->       </div>
                        <div class="pull-left info">
                            <?php
                            $_SESSION['UserName'] = "gayal";

                            echo "SHAN";
                            ?>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>            </div>
                    </div>
                    <!-- search form -->
                    <!--  <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                          <input type="text" name="q" class="form-control" placeholder="Search..."/>
                          <span class="input-group-btn">
                            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                          </span>            </div>
                      </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"><strong>MAIN NAVIGATION</strong></li>
                        <?php
                        $sql = "select * from userpermission where username='" . $_SESSION['UserName'] . "' and grp='Data Capture' and doc_view=1";
                        $result = mysql_query($sql, $dbinv);
                        if ($row = mysql_fetch_array($result)) {
                            ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span><img src="images/icn_categories.png" width="17" height="17">&nbsp;&nbsp;Data Capture</span><small class="label pull-right bg-yellow">4</small> <i class="fa fa-angle-left pull-right"></i>              </a>
                                <ul class="treeview-menu">

                                    <?php
//                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Patient Registration' and grp='Data Capture' and doc_view=1";
//                                    $result = mysql_query($sql, $dbinv);
//                                    if ($row = mysql_fetch_array($result)) {
//
//                                        if ($_GET["pagename"] == "Patient Registration") {
//                                            
                                    ?>
                                                                <!--<li class="active"><a href="pateint_reg.php?pagename=Patient Registration"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Patient Registration</a></li>-->
                                    //<?php
//                                        } else {
//                                            
                                    ?>
                                    <!--<li><a href="pateint_reg.php?pagename=Patient Registration"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Patient Registration</a></li>-->
                                    //<?php
//                                        }
//                                    }
                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='OPD Medical' and grp='Data Capture' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "OPD Medical") {
                                            ?>    
                                            <li class="active"><a href="opd_medical.php?pagename=OPD Medical"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;OPD Medical</a></li>
                                            <?php
                                        } else {
                                            ?>      
                                            <li><a href="opd_medical.php?pagename=OPD Medical"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;OPD Medical</a></li>
                                            <?php
                                        }
                                    }
//                                    
//                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Channeling Entry' and grp='Data Capture' and doc_view=1";
//                                    $result = mysql_query($sql, $dbinv);
//                                    if ($row = mysql_fetch_array($result)) {
//                                        if ($_GET["pagename"] == "Channeling Entry") {
//                                            
                                    ?>   
                    <!--<li class="active"><a href="channeling_entry.php?pagename=Channeling Entry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Channeling Entry</a></li>-->
                                    <?php
//                                        } else {
//                                            
                                    ?>
                    <!--<li><a href="channeling_entry.php?pagename=Channeling Entry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Channeling Entry</a></li>-->
                                    <?php
//                                        }
//                                    }
                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Test Results Entry' and grp='Data Capture' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Test Results Entry") {
                                            ?>   
                                            <li class="active"><a href="test_result_entry.php?pagename=Test Results Entry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Test Results Entry</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="test_result_entry.php?pagename=Test Results Entry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Test Results Entry</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Medical Register' and grp='Data Capture' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Medical Register") {
                                            ?>   
                                            <li class="active"><a href="medical_registry.php?pagename=Medical Register"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Register</a></li>
                                            <?php
                                        } else {
                                            ?> 
                                            <li><a href="medical_registry.php?pagename=Medical Register"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Register</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Medical Entry' and grp='Data Capture' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Medical Entry") {
                                            ?>   
                                            <li class="active"><a href="medical_entry.php?pagename=Medical Entry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Entry</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="medical_entry.php?pagename=Medical Entry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Entry</a></li>
                                            <?php
                                        }
                                    }

//                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Puchase' and grp='Data Capture' and doc_view=1";
//                                    $result = mysql_query($sql, $dbinv);
//                                    if ($row = mysql_fetch_array($result)) {
//                                        if ($_GET["pagename"] == "Puchase") {
//                                            
                                    ?>  
    <!--<li class="active"><a href="purch.php?pagename=Puchase"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Puchase</a></li>-->
                                    //<?php
//                                        } else {
//                                            
                                    ?>  
                                    <!--<li><a href="purch.php?pagename=Puchase"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Puchase</a></li>-->
                                    //<?php
//                                        }
//                                    }
//                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Invoice' and grp='Data Capture' and doc_view=1";
//                                    $result = mysql_query($sql, $dbinv);
//                                    if ($row = mysql_fetch_array($result)) {
//                                        if ($_GET["pagename"] == "Invoice") {
//                                            
                                    ?>  
                                    <!--<li class="active"><a href="sales_inv.php?pagename=Invoice"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Invoice</a></li>-->
                                    //<?php
//                                        } else {
//                                            
                                    ?> 
                                    <!--<li><a href="sales_inv.php?pagename=Invoice"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Invoice</a></li>-->
                                    //<?php
//                                        }
//                                    }
                                    ?>   
                                </ul>
                            </li>
                        <?php } ?> 

                        <?php
                        $sql = "select * from userpermission where username='" . $_SESSION['UserName'] . "' and grp='Inquiry' and doc_view=1";
                        $result = mysql_query($sql, $dbinv);
                        if ($row = mysql_fetch_array($result)) {
                            ?> 
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span><img src="images/icn_categories.png" width="17" height="17">&nbsp;&nbsp;Inquiry</span>
                                    <span class="label label-primary pull-right">1</span>              </a>
                                <ul class="treeview-menu">

                                    <?php
                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Medical Inquiry' and grp='Inquiry' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Medical Inquiry") {
                                            ?>
                                            <li class="active"><a href="inq_medical.php?pagename=Medical Inquiry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Inquiry</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="inq_medical.php?pagename=Medical Inquiry"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Inquiry</a></li>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php
//                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Label Print' and grp='Inquiry' and doc_view=1";
//                                    $result = mysql_query($sql, $dbinv);
//                                    if ($row = mysql_fetch_array($result)) {
//                                        if ($_GET["pagename"] == "Label Print") {
//                                            
                                    ?>
                                                                <!--<li class="active"><a href="inq_screen.php?pagename=Label Print"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Label Print</a></li>-->
                                    //<?php
//                                        } else {
//                                            
                                    ?>   
                                    <!--<li><a href="inq_screen.php?pagename=Label Print"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Label Print</a></li>-->
                                    //<?php
//                                        }
//                                    }
//                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Patient History' and grp='Inquiry' and doc_view=1";
//                                    $result = mysql_query($sql, $dbinv);
//                                    if ($row = mysql_fetch_array($result)) {
//                                        if ($_GET["pagename"] == "Patient History") {
//                                            
                                    ?>   
                                    <!--<li class="active"><a href="pa_histry.php?pagename=Patient History"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Patient History</a></li>-->
                                    //<?php
//                                        } else {
//                                            
                                    ?>   
                                    <!--<li><a href="pa_histry.php?pagename=Patient History"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Patient History</a></li>-->
                                    //<?php
//                                        }
//                                    }
                                    ?>    
                                </ul>
                            </li>
                            <?php
                        }
                        ?>  

                        <?php
                        $sql = "select * from userpermission where username='" . $_SESSION['UserName'] . "' and grp='Report' and doc_view=1";
                        $result = mysql_query($sql, $dbinv);
                        if ($row = mysql_fetch_array($result)) {
                            ?>    
                            <li>
                                <a href="#">
                                    <i class="fa fa-th"></i> <span><img src="images/icn_categories.png" width="17" height="17">&nbsp;&nbsp;Report</span> <small class="label pull-right bg-red">3</small>              </a>            

                                <ul class="treeview-menu">
                                    <?php
                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='OPD Summery' and grp='Report' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "OPD Summery") {
                                            ?>
                                            <li class="active"><a href="rep_sales_summery.php?pagename=OPD Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;OPD Summery</a></li>
                                            <?php
                                        } else {
                                            ?> 
                                            <li><a href="rep_sales_summery.php?pagename=OPD Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;OPD Summery</a></li>   
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Channeling Summery' and grp='Report' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Daily Summery") {
                                            ?>    
                                            <li class="active"><a href="rep_channel_summery.php?pagename=Daily Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Daily Summery</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="rep_channel_summery.php?pagename=Daily Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Daily Summery</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Channeling Summery' and grp='Report' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Issued Summery") {
                                            ?>    
                                            <li class="active"><a href="rep_issued_summery.php?pagename=Issued Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Issued Summery</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="rep_issued_summery.php?pagename=Issued Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Issued Summery</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Channeling Summery' and grp='Report' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "FIT -UNFIT Summery") {
                                            ?>    
                                            <li class="active"><a href="rep_fitunfit_summery.php?pagename=FIT -UNFIT Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;FIT -UNFIT Summery</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="rep_fitunfit_summery.php?pagename=FIT -UNFIT Summery"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;FIT -UNFIT Summery</a></li>
                                            <?php
                                        }
                                    }



                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Lab Report' and grp='Report' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Lab Report") {
                                            ?>   
                                            <li class="active"><a href="rep_lab_pending.php?pagename=Lab Report"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Lab Report</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="rep_lab_pending.php?pagename=Lab Report"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Lab Report</a></li>
                                            <?php
                                        }
                                    }
                                    ?>   

                                </ul>

                            </li>
<?php } ?>    
<?php
$sql = "select * from userpermission where username='" . $_SESSION['UserName'] . "' and grp='Master Files' and doc_view=1";
$result = mysql_query($sql, $dbinv);
if ($row = mysql_fetch_array($result)) {
    ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-th"></i> <span><img src="images/icn_categories.png" width="17" height="17">&nbsp;&nbsp;Master Files</span> <small class="label pull-right bg-yellow">5</small>              </a>            

                                <ul class="treeview-menu">

    <?php
    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Lab Test Master File' and grp='Master Files' and doc_view=1";
    $result = mysql_query($sql, $dbinv);
    if ($row = mysql_fetch_array($result)) {
        if ($_GET["pagename"] == "Lab Test Master File") {
            ?>
                                            <li class="active"><a href="lab_test_mast.php?pagename=Lab Test Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Lab Test Master File</a></li>
                                            <?php
                                        } else {
                                            ?>      
                                            <li><a href="lab_test_mast.php?pagename=Lab Test Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Lab Test Master File</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Doctor Master File' and grp='Master Files' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Doctor Master File") {
                                            ?>       
                                            <li class="active"><a href="doctor_mast.php?pagename=Doctor Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Doctor Master File</a></li>
                                            <?php
                                        } else {
                                            ?>      
                                            <li><a href="doctor_mast.php?pagename=Doctor Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Doctor Master File</a></li>     
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Customer Master File' and grp='Master Files' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Customer Master File") {
                                            ?>      
                                            <li class="active"><a href="customer_mast.php?pagename=Customer Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Agent Master File</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="customer_mast.php?pagename=Customer Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Agent Master File</a></li>
                                            <?php
                                        }
                                    }


                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Medical Master File' and grp='Master Files' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Medical Master File") {
                                            ?>

                                            <li class="active"><a href="medical_mast.php?pagename=Medical Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Master File</a></li>
                                            <?php
                                        } else {
                                            ?>     
                                            <li><a href="medical_mast.php?pagename=Medical Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Medical Master File</a></li>
                                            <?php
                                        }
                                    }





                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Country Master File' and grp='Master Files' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Country Master File") {
                                            ?>      
                                            <li class="active"><a href="country_mast.php?pagename=Country Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Country Master File</a></li>
                                            <?php
                                        } else {
                                            ?>   
                                            <li><a href="country_mast.php?pagename=Country Master File"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Country Master File</a></li>
                                            <?php
                                        }
                                    }
                                    ?>       
                                </ul>

                            </li>
<?php }
?> 
                        <?php
                        $sql = "select * from userpermission where username='" . $_SESSION['UserName'] . "' and grp='Administration' and doc_view=1";
                        $result = mysql_query($sql, $dbinv);
                        if ($row = mysql_fetch_array($result)) {
                            ?>

                            <li>
                                <a href="pages/widgets.html">
                                    <i class="fa fa-th"></i> <span><img src="images/icn_categories.png" width="17" height="17">&nbsp;&nbsp;Administrator</span> <span class="label label-primary pull-right">4</span>              </a>            

                                <ul class="treeview-menu">
    <?php
    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Create User' and grp='Administration' and doc_view=1";
    $result = mysql_query($sql, $dbinv);
    if ($row = mysql_fetch_array($result)) {
        if ($_GET["pagename"] == "Country Master File") {
            ?>
                                            <li class="active"><a href="create_user.php?pagename=Create User"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Create User</a></li>
                                            <?php
                                        } else {
                                            ?>    
                                            <li><a href="create_user.php?pagename=Create User"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Create User</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Change Password' and grp='Administration' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Change Password") {
                                            ?>        
                                            <li class="active"><a href="change_pass.php?pagename=Change Password"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Change Password</a></li>
                                            <?php
                                        } else {
                                            ?>    
                                            <li><a href="change_pass.php?pagename=Change Password"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Change Password</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Manage Permission' and grp='Administration' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Manage Permission") {
                                            ?>    

                                            <li  class="active"><a href="assign_privilages.php?pagename=Manage Permission"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Manage Permission</a></li>
                                            <?php
                                        } else {
                                            ?>    
                                            <li><a href="assign_privilages.php?pagename=Manage Permission"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Manage Permission</a></li>
                                            <?php
                                        }
                                    }

                                    $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Discount Approval' and grp='Administration' and doc_view=1";
                                    $result = mysql_query($sql, $dbinv);
                                    if ($row = mysql_fetch_array($result)) {
                                        if ($_GET["pagename"] == "Discount Approval") {
                                            ?>    

                                                                    <!--<li class="active"><a href="pa_disapp.php?pagename=Discount Approval"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Discount Approval</a></li>-->
                                                    <?php
                                                } else {
                                                    ?>   
                                                                    <!--<li><a href="pa_disapp.php?pagename=Discount Approval"><i class="fa fa-circle-o"></i> <img src="images/icn_edit_article.png" width="17" height="17">&nbsp;&nbsp;Discount Approval</a></li>-->
                                            <?php
                                        }
                                    }
                                    ?>                      
                                </ul>

                            </li>

<?php } ?>   

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>