
<style type="text/css">
#display_selected a {
	color:#000;
}

#display_notSelected a{
	color:#fff;
}
</style>
<script src="js/user.js"></script>
<?php
require_once("config.inc.php");
	require_once("DBConnector.php");
	$db = new DBConnector();
?>
<div id="menus_wrapper">
				
				
				
				
				
				<div id="main_menu">
					<ul>
						<li><a href="home.php"><span><span>Home</span></span></a></li>
                        <?php
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Master Files' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"masterfiles.php\" class=\"selected\"><span><span>Master Files</span></span></a></li>";
						}
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Data Capture' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
                        	echo "<li><a href=\"datacapture.php\"><span><span>Data Capture</span></span></a></li>";
						}	
						
						
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and (grp='Reports-Sales' or grp='Reports-Customer' or grp='Reports-Other' or grp='Reports-Stock') and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){	
                        	echo "<li><a href=\"reports.php\"><span><span>Reports</span></span></a></li>";
						}
						
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Administration' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){				
                         	echo "<li><a href=\"administration.php\"><span><span>Administration</span></span></a></li>";
						}
						
						
						?>	
                        <li class="last" onclick="logout();"><a href="#"><span><span>Logout</span></span></a></li>
					</ul>
				</div>
				
				
				
				<div id="sec_menu">
					<ul>
                    	<?php
                    	$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Lab Test Master File' and grp='Master Files' and doc_view=1";
						
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"lab_test_mast.php\" target=\"_blank\" class=\"sm1\" >Lab Test Master File</a></li>";
						}	
						
						$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Doctor Master File' and grp='Master Files' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"doctor_mast.php\" target=\"_blank\" class=\"sm2\" >Doctor Master File</a></li>";
						}
						
						
						
						$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Customer Master File' and grp='Master Files' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"customer_mast.php\" target=\"_blank\" class=\"sm2\" >Customer Master File</a></li>";
						}
						
						$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Medical Master File' and grp='Master Files' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"medical_mast.php\" target=\"_blank\" class=\"sm2\" >Medical Master File</a></li>";
						}	
						
						$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Country Master File' and grp='Master Files' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"country_mast.php\" target=\"_blank\" class=\"sm2\" >Country Master File</a></li>";
						}
                       ?>
                       
					</ul>
				</div>
			</div>