<?php 	session_start();
	include('connection.php');
	$_SESSION['UserName']="gayal";
?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>MediSys</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	
	
    <script src="js/user.js"></script>
    
    
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="js/hideshow.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.txtdate { width:30%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}

.txtop { width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.style2 {font-weight: bold}
.txtop1 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtdate1 {width:30%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop2 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop11 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}

-->
</style>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">MediSys</a></h1>
			<h2 class="section_title">ABC Company (Pvt) Ltd.</h2><div class="btn_view_site"><a href="http://www.medialoot.com">Logout</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>User 2 <a href="#"></a></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html"><?php echo $_SESSION["page_name1"]; ?></a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $_SESSION["page_name2"]; ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
	<?php
    
	$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Data Capture' and doc_view=1";
	$result=mysql_query($sql, $dbinv);
	if ($row = mysql_fetch_array($result)){
		
		echo "<h3>Data Capture</h3>";
		//$_SESSION["page_name1"]="Data Capture";
			
			echo "<ul class=\"toggle\">";
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Patient Registration' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_add_user\"><a href=\"pateint_reg_details.php\">Patient Registration</a></li>";
				//$_SESSION["page_name2"]="OPD Medical";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='OPD Medical' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_add_user\"><a href=\"opd_medical_details.php\">OPD Medical</a></li>";
				//$_SESSION["page_name2"]="OPD Medical";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Channeling Entry' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_add_user\"><a href=\"channeling_entry_details.php\">Channeling Entry</a></li>";
				//$_SESSION["page_name2"]="OPD Medical";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Test Results Entry' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_view_users\"><a href=\"test_result_entry_details.php\">Test Results Entry</a></li>";
				//$_SESSION["page_name2"]="Test Results Entry";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Medical Register' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_view_users\"><a href=\"medical_registry_details.php\">Medical Register</a></li>";
				//$_SESSION["page_name2"]="Test Results Entry";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Medical Entry' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_view_users\"><a href=\"medical_entry_details.php\">Medical Entry</a></li>";
				//$_SESSION["page_name2"]="Test Results Entry";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Puchase' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_view_users\"><a href=\"purch_details.php\">Puchase</a></li>";
				//$_SESSION["page_name2"]="Test Results Entry";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Invoice' and grp='Data Capture' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_view_users\"><a href=\"sales_inv_details.php\">Invoice</a></li>";
				//$_SESSION["page_name2"]="Test Results Entry";
			}
					
			echo "</ul>";
	}	
	
	
	
	
	$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Inquiry' and doc_view=1";
	$result=mysql_query($sql, $dbinv);
	if ($row = mysql_fetch_array($result)){	
		echo "<h3>Inquiry</h3>";
	  	
		//$_SESSION["page_name1"]="Master Files";
			
		
		echo "<ul class=\"toggle\">";
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Label Print' and grp='Inquiry' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"inq_screen_deails.php\">Label Print</a></li>";
			//$_SESSION["page_name2"]="Lab Test Master File";
		}
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Patient History' and grp='Inquiry' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"pa_histry_details.php\">Patient History</a></li>";
			//$_SESSION["page_name2"]="Lab Test Master File";
		}
		
		
					
		echo "</ul>";
	}
	
	$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Report' and doc_view=1";
	$result=mysql_query($sql, $dbinv);
	if ($row = mysql_fetch_array($result)){	
		echo "<h3>Report</h3>";
	  	
		//$_SESSION["page_name1"]="Master Files";
			
		
		echo "<ul class=\"toggle\">";
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='OPD Summery' and grp='Report' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"rep_sales_summery_details.php\">OPD Summery</a></li>";
			//$_SESSION["page_name2"]="Lab Test Master File";
		}
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Channeling Summery' and grp='Report' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"rep_channel_summery_details.php\">Channeling Summery</a></li>";
			//$_SESSION["page_name2"]="Lab Test Master File";
		}
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Lab Report' and grp='Report' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"rep_lab_pending_details.php\">Lab Report</a></li>";
			//$_SESSION["page_name2"]="Lab Test Master File";
		}
					
		echo "</ul>";
	}
	
	
	$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Master Files' and doc_view=1";
	$result=mysql_query($sql, $dbinv);
	if ($row = mysql_fetch_array($result)){	
		echo "<h3>Master Files</h3>";
	  	
		//$_SESSION["page_name1"]="Master Files";
			
		
		echo "<ul class=\"toggle\">";
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Lab Test Master File' and grp='Master Files' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"lab_test_mast_details.php\">Lab Test Master File</a></li>";
			//$_SESSION["page_name2"]="Lab Test Master File";
		}
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Doctor Master File' and grp='Master Files' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_edit_article\"><a href=\"doctor_mast_details.php\">Doctor Master File</a></li>";
			//$_SESSION["page_name2"]="Doctor Master File";
		}
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Customer Master File' and grp='Master Files' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_tags\"><a href=\"customer_mast_details.php\">Customer Master File</a></li>";
			//$_SESSION["page_name2"]="Customer Master File";
		}
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Medical Master File' and grp='Master Files' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"medical_mast_details.php\">Medical Master File</a></li>";
			//$_SESSION["page_name2"]="Medical Master File";
		}
		
		$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Medical Master File' and grp='Master Files' and doc_view=1";
		$result=mysql_query($sql, $dbinv);
		if ($row = mysql_fetch_array($result)){
			echo "<li class=\"icn_new_article\"><a href=\"country_mast_details.php\">Country Master File</a></li>";
			//$_SESSION["page_name2"]="Medical Master File";
		}
					
		echo "</ul>";
	}
	
	?>
		
		
      <?php
	  $sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Administration' and doc_view=1";
	  $result=mysql_query($sql, $dbinv);
	  if ($row = mysql_fetch_array($result)){
      		echo "<h3>Administrator</h3>";
			//$_SESSION["page_name1"]="Administrator";
			
			echo "<ul class=\"toggle\">";
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Create User' and grp='Administration' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_settings\"><a href=\"create_user.php\">Create User</a></li>";
				//$_SESSION["page_name2"]="Create User";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Change Password' and grp='Administration' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_security\"><a href=\"change_pass.php\">Change Password</a></li>";
				//$_SESSION["page_name2"]="Change Password";
			}
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Manage Permission' and grp='Administration' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_jump_back\"><a href=\"assign_privilages.php\">Manage Permission</a></li>";
				//$_SESSION["page_name2"]="Manage Permission";
			}	
			
			$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Discount Approval' and grp='Administration' and doc_view=1";
			$result=mysql_query($sql, $dbinv);
			if ($row = mysql_fetch_array($result)){
				echo "<li class=\"icn_jump_back\"><a href=\"pa_disapp_details.php\">Discount Approval</a></li>";
				//$_SESSION["page_name2"]="Manage Permission";
			}	
				
		echo "</ul>";
	   }
       ?> 
		
  <footer>
			<hr />
			<p><strong>Copyright &copy; 2015 Infodata</strong></p>
			<!--<p>Theme by <a href="http://www.infodatalk.com">Infodata</a></p>-->
		</footer>
	</aside><!-- end of sidebar -->
</body>

</html>