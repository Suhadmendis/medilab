
<style type="text/css">
#display_selected a {
	color:#000;
}

#display_notSelected a{
	color:#fff;
}




</style>
<?php
require_once("config.inc.php");
	require_once("DBConnector.php");
	$db = new DBConnector();
?>
<script src="js/user.js"></script>
<div id="menus_wrapper">
				
				
				
				
				
				<div id="main_menu">
					<ul>
										<li><a href="home.php"><span><span>Home</span></span></a></li>
                        <?php
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Master Files' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"masterfiles.php\" ><span><span>Master Files</span></span></a></li>";
						}
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Data Capture' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
                        	echo "<li><a href=\"datacapture.php\" class=\"selected\"><span><span>Data Capture</span></span></a></li>";
						}	
						
						
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and (grp='Reports-Sales' or grp='Reports-Customer' or grp='Reports-Other' or grp='Reports-Stock') and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){	
                        	echo "<li><a href=\"reports.php\"><span><span>Reports</span></span></a></li>";
						}
						
						
						$sql="select * from userpermission where username='".$_SESSION['UserName']."' and grp='Administration' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){				
                         	echo "<li><a href=\"administration.php\" ><span><span>Administration</span></span></a></li>";
						}
						?>	
                        <li class="last" onclick="logout();"><a href="#"><span><span>Logout</span></span></a></li>
					</ul>
				</div>
				
				
				
				<div id="sec_menu">
					<ul>
                    	<?php
						$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='OPD Medical' and grp='Data Capture' and doc_view=1";
						
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){
							echo "<li><a href=\"opd_medical.php\" target=\"_blank\" class=\"sm1\" >OPD Medical</a></li>";
						}
						
						$sql="select * from view_userpermission where username='".$_SESSION['UserName']."' and docname='Test Results Entry' and grp='Data Capture' and doc_view=1";
						$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
						if ($row = mysql_fetch_array($result)){	
							echo "<li><a href=\"test_result_entry.php\" target=\"_blank\" class=\"sm2\" >Test Results Entry</a></li>";
						}	
                        
						
						
						
						
						
                       ?>
						
					</ul>
				</div>
			</div>