	<?php include('header.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Medical Register
           <!-- <small>Control panel</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href=""> <img src="images/menu.png" width="20" height="20">&nbsp;&nbsp;&nbsp;Data Capture</a></li>
            <li class="active">Medical Register</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                <!--///////////////////////////////////////////////////
                  <h3 class="box-title">Monthly Recap Report</h3>-->
                  
                 
                <!--/////////////////////////////////////////////////////-->  
                <?php include('medical_registry_details.php'); ?>
                  
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015 <a href="">Infodata Computer System</a>.</strong>
      </footer>
    </div><!-- ./wrapper -->

    
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
   
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
       
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
     
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
     
    <script src="js/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
  
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
       
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
 
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
       
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
       
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
       
    <script src='plugins/fastclick/fastclick.min.js'></script>
    
    <script src="dist/js/app.min.js" type="text/javascript"></script>

   
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

 
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>