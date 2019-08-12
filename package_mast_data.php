<?php session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
	require_once("config.inc.php");
	require_once("DBConnector.php");
	$db = new DBConnector();
	
	////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
	header('Content-Type: text/xml'); 
	 date_default_timezone_set('Asia/Colombo'); 
		
	
	/////////////////////////////////////// GetValue //////////////////////////////////////////////////////////////////////////
	
		
				
	///////////////////////////////////// Registration /////////////////////////////////////////////////////////////////////////
		
		
		
		if($_GET["Command"]=="setitem")
		{
			
			$sql_invpara="SELECT * from invpara";
			$result_invpara =$db->RunQuery($sql_invpara);
			$row_invpara = mysql_fetch_array($result_invpara);
			
			$vatrate=$row_invpara["vatrate"]/100;
			
			$ResponseXML .= "";
			$ResponseXML .= "<salesdetails>";
			
			$sqlt="SELECT * from s_mas where  STK_NO='".$_GET["itemd_hidden"]."'";
			$resultt =$db->RunQuery($sqlt);
			if ($row = mysql_fetch_array($resultt)){
				$ResponseXML .= "<STK_NO><![CDATA[".$row['STK_NO']."]]></STK_NO>";
				$ResponseXML .= "<DESCRIPT><![CDATA[".$row['DESCRIPT']."]]></DESCRIPT>";
								
				if ($_GET["vatmethod"]=="non"){
					$SELLING=$row['SELLING'];
				} else {
					$SELLING=$row['SELLING']/($vatrate+1);
				}
				
				$ResponseXML .= "<SELLING><![CDATA[".number_format($SELLING, 2, ".", ",")."]]></SELLING>";
				
				$sql_qty = "select QTYINHAND from s_submas where STK_NO='".$_GET['itemd_hidden']."' AND STO_CODE='".$_GET["department"]."'";
				$result_qty =$db->RunQuery($sql_qty);
				if ($row_qty = mysql_fetch_array($result_qty)){
						if (is_null($row_qty["QTYINHAND"])==false){
							$ResponseXML .= "<qtyinhand><![CDATA[".$row_qty["QTYINHAND"]."]]></qtyinhand>";
						} else {
							$ResponseXML .= "<qtyinhand><![CDATA[]]></qtyinhand>";
						}
					} else {
						$ResponseXML .= "<qtyinhand><![CDATA[]]></qtyinhand>";
					}
					
			}
			
			$ResponseXML .= " </salesdetails>";
			echo $ResponseXML;
		}
		
		if($_GET["Command"]=="add_address")
		{
			//echo "Regt=".$Regt."RegimentNo=".RegimentNo."Command=".$Command;
			
			
	/*		$sql="Select * from tmp_army_no where edu= '".$_GET['edu']."'";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			if($row = mysql_fetch_array($result)){
				$ResponseXML .= "exist";
				
				
				
			}	else {*/
			
		//	$ResponseXML .= "";
			//$ResponseXML .= "<ArmyDetails>";
			
		/*	$sql1="Select * from mas_educational_qualifications where str_Educational_Qualification= '".$_GET['edu']."'";
			$result1 =mysqli_query($GLOBALS['dbinv'],$sql1) ; 
			$row1 = mysql_fetch_array($result1);
			$ResponseXML .=  $row1["int_Educational_Qulifications"];*/
			
			$sqlt="Select * from customer_mast where id ='".$_GET['customerid']."'";
			
			$resultt =$db->RunQuery($sqlt);
			if ($rowt = mysql_fetch_array($resultt)){
				echo $rowt["str_address"];
			}
			
			
				
			
	}
	
	
	
 if ($_GET["Command"]=="chk_number"){
 	$sql="select * from vendor where CODE = '".trim($_GET["txt_cuscode"])."'";
	$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
	if($row = mysql_fetch_array($result)){
		echo "included";
	} else { 
		echo "no";
	}
 }
 
 		
		if($_GET["Command"]=="new_inv")
		{
		   
		   include('connection.php');
			
        	
			
		  
			header('Content-Type: text/xml'); 
			echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
			
			$ResponseXML = "";
			$ResponseXML .= "<salesdetails>";
			
			$ResponseXML .= "<treatment><![CDATA[";
			$sql_rst = "select * from tremas order by TDESCRIPT";
			$result_rst=mysql_query($sql_rst, $dbinv);
			while($row_rst = mysql_fetch_array($result_rst)){	
        		$ResponseXML .= "<input type=\"checkbox\" name=\"".$row_rst["TCODE"]."\" id=\"".$row_rst["TCODE"]."\" onclick=\"treat_tmp_save('".$row_rst["TCODE"]."');\" />&nbsp;&nbsp;&nbsp;".$row_rst["TDESCRIPT"]."</br>";
			}
			$ResponseXML .= "]]></treatment>";
			
			
			$ResponseXML .= "</salesdetails>";
			echo $ResponseXML;	
		  
		}
	
	
	if($_GET["Command"]=="cancel_inv")
	{
		include('connection.php');
		
		$sql="select last_update from invpara";
		$result=mysql_query($sql, $dbinv);
		$row = mysql_fetch_array($result);
		
		$sqlinv="select * from s_salma where REF_NO='".$_GET["invno"]."' ";
		$resultinv=mysql_query($sqlinv, $dbinv);
		if ($rowinv = mysql_fetch_array($resultinv)){
			if (($rowinv["TOTPAY"]==0) and ($rowinv["SDATE"]>$row["last_update"])){
				
			 //try {
			 	
				$sql_status=0;
				
				mysql_query("SET AUTOCOMMIT=0", $dbinv);
				mysql_query("START TRANSACTION", $dbinv);	 
				
				$sql2="update s_salma set CANCELL='1' where REF_NO='".$_GET["invno"]."'";
				$result2=mysql_query($sql2, $dbinv);
				if ($result2!=1){ $sql_status=1; }
				
				$sql2="update vendor set CUR_BAL=CUR_BAL-".$rowinv["GRAND_TOT"]." where CODE='".$_GET["customer_code"]."'";
				$result2=mysql_query($sql2, $dbinv);
				if ($result2!=1){ $sql_status=1; }
								
				$sql2="update br_trn set credit=credit-".$rowinv["GRAND_TOT"]." where cus_code='".$_GET["customer_code"]."' and Rep='".$_GET["salesrep"]."'";
				$result2=mysql_query($sql2, $dbinv);
				
				if ($result2!=1){ $sql_status=1; }
								
				$sqltmp="select * from s_invo where REF_NO='".$_GET['invno']."' ";
				$resulttmp=mysql_query($sqltmp, $dbinv);
				while ($rowtmp = mysql_fetch_array($resulttmp)){
					$sql2="update s_invo set CANCELL='1' where REF_NO='".$_GET['invno']."'";
					$resul2=mysql_query($sql2, $dbinv);
					if ($result2!=1){ $sql_status=1; }
										
					$sql2="update s_mas set QTYINHAND=QTYINHAND+".$rowtmp["QTY"]." where STK_NO='".$rowtmp['STK_NO']."'";
					$resul2=mysql_query($sql2, $dbinv);
					if ($result2!=1){ $sql_status=1; }
					
					$sql2="update s_submas set QTYINHAND=QTYINHAND+".$rowtmp["QTY"]." where STO_CODE='".$rowinv["DEPARTMENT"]."' and STK_NO='".$rowtmp['STK_NO']."'";
					$resul2=mysql_query($sql2, $dbinv);
					if ($result2!=1){ $sql_status=1; }
										
					$sql2="delete from s_trn where REFNO='".$_GET['invno']."'";
					$resul2=mysql_query($sql2, $dbinv);
					if ($result2!=1){ $sql_status=1; }
					
					$sql2="delete from s_trn_all where REFNO='".$_GET['invno']."'";
					$resul2=mysql_query($sql2, $dbinv);
					if ($result2!=1){ $sql_status=1; }
					//echo $sql2;
					$sql2="delete from s_led where REF_NO='".$_GET['invno']."'";
					$resul2=mysql_query($sql2, $dbinv);
					if ($result2!=1){ $sql_status=1; }
				}
				
				
				$sql2="insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('".$_GET['invno']."', '".$_SESSION["CURRENT_USER"]."', 'Invoice', 'Cancel', '".date("Y-m-d H:i:s")."', '".date("Y-m-d")."')";
				$result2=mysql_query($sql2, $dbinv);
				if ($result2!=1){ $sql_status=1; }
				
				
				if ($sql_status==0){
					
					mysql_query("COMMIT", $dbinv);
					echo "Canceled";
			  	} else {	
					
					mysql_query("ROLLBACK", $dbinv);
					echo "Error has occured. Not Canceled";
			  	}	
			} else {
				echo "Can't Cancel";
			}
		}
	}
	
	
	if($_GET["Command"]=="chk_ad")
		{
			if ($_GET["chk"]=="false"){
				$chk=0;
			} else {
				$chk=1;
			}
			$sql="update tmp_inv_data set ad='".$chk."' where id=".$_GET["id"]." and str_code='".$_GET['itemcode']."' and tmp_no= '".$_SESSION["tmp_no_salinv"]."'";
			//echo $sql;
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
		}
		
		
	if($_GET["Command"]=="add_tmp")
		{
		
		if ($_SESSION["tmp_no_salinv"]!=""){
			$department=$_GET["department"];
			
			$ResponseXML .= "";
			$ResponseXML .= "<salesdetails>";
			
			//echo $_SESSION["tmp_no_salinv"];
			
			//$sql="delete from tmp_inv_data where str_code='".$_GET['itemcode']."' and tmp_no='".$_SESSION["tmp_no_salinv"]."' ";
			//$ResponseXML .= $sql;
			//$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			//echo $_GET['rate'];
			//echo $_GET['qty'];
			$rate=str_replace(",", "", $_GET["rate"]);
			$actual_selling=str_replace(",", "", $_GET["actual_selling"]);
			
			$qty=str_replace(",", "", $_GET["qty"]);
			$discount=str_replace(",", "", $_GET["discount"]);
			$subtotal=str_replace(",", "", $_GET["subtotal"]);
			
			if ($_GET['ad']=="true"){
				$ad="1";
			} else {
				$ad="0";
			}
			$sql="Insert into tmp_inv_data (str_invno, str_code, str_description, cur_rate, cur_qty, dis_per, cur_discount, cur_subtot, actual_selling, brand, tmp_no)values 
			('".$_GET['invno']."', '".$_GET['itemcode']."', '".$_GET['item']."', ".$rate.", ".$qty.", ".$_GET["discountper"].", ".$discount.", ".$subtotal.", ".$actual_selling.", '".$_GET['brand']."', '".$_SESSION["tmp_no_salinv"]."') ";
			
			//$ResponseXML .= $sql;
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
			
			
				$ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                              <td width=\"0\"  background=\"\" ><font color=\"#FFFFFF\"></font></td>
							  <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Code</font></td>
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Rate</font></td>
							  <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\"></font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Qty</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Sub Total</font></td>
							   <td  background=\"\"><font color=\"#FFFFFF\">AD</font></td>
							  
                            </tr>";
							
			$i=1;
			$sql="Select * from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
			while($row = mysql_fetch_array($result)){	
				
				$id="id".$i;
				$code="code".$i;
				$itemd="itemd".$i;
				$rate="rate".$i;
				$actual_selling="actual_selling".$i;
				$qty="qty".$i;			
				$discountper="discountper".$i;			
				$subtotal="subtotal".$i;	
				$discount="discount".$i;	
				$ad="ad".$i;	
						
             	$ResponseXML .= "<tr>                              
                             <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$id."'>".$row['id']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$code."'>".$row['str_code']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$itemd."'>".$row['str_description']."</div></td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$rate."\" id=\"".$rate."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"  onkeypress=\"keyset('credper',event);\" /></td>
							  <td align=right ><input type=\"text\"  class=\"text_purchase3\" name=\"".$actual_selling."\" id=\"".$actual_selling."\" size=\"15\"  value=\"".number_format($row['actual_selling'], 2, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"   /></td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$qty."\" id=\"".$qty."\" size=\"15\"  value=\"".number_format($row['cur_qty'], 0, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"  onkeypress=\"keyset('credper',event);\" />    </td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$discountper."'>".$_GET["discountper"]."</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"".$discount."\" id=\"".$discount."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\"    /></td>
							 
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$subtotal."'>".number_format($row['cur_subtot'], 2, ".", ",")."</div></td>
							
							 <td ><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=".$row['str_code']."  name=".$row['str_code']." onClick=\"del_item('".$row['id']."');\"></td>";
							 
							 include_once("connection.php");
							
							 $sqlqty = mysql_query("select QTYINHAND from s_submas where STK_NO='".$row['str_code']."' AND STO_CODE='".$_GET["department"]."'") or die(mysql_error());
					if($rowqty = mysql_fetch_array($sqlqty)){
						$qty=number_format($rowqty['QTYINHAND'], 0, ".", ",");
					} else {
						$qty=0;
					}	
					
					if ($row['ad']=="1"){
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."' checked></td>";
					} else {
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."'></td>";
					}
							
						
							$ResponseXML .= "<td  >".$qty."</td>
						
							
							 
                            </tr>";
					$i=$i+1;		
				}			
							
                $ResponseXML .= "   </table>]]></sales_table>";
				
				$ResponseXML .= "<item_count><![CDATA[".$i."]]></item_count>";
				
				$sql="Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
				$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
				$row = mysql_fetch_array($result);	
				$ResponseXML .= "<subtot><![CDATA[".number_format($row['tot_sub'], 2, ".", ",")."]]></subtot>";
				$ResponseXML .= "<tot_dis><![CDATA[".number_format($row['tot_dis'], 2, ".", ",")."]]></tot_dis>";
				
				$sql_invpara="SELECT * from invpara";
				$result_invpara =$db->RunQuery($sql_invpara);
				$row_invpara = mysql_fetch_array($result_invpara);
				
				$vatrate=$row_invpara["vatrate"]/100;
				
				if ($_GET["vatmethod"]=="vat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (VAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="svat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (SVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="evat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (EVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="non"){
					//$tax=number_format($row['tot_sub']*$vatrate, 2, ".", ",");
					$ResponseXML .= "<tax><![CDATA[0.00]]></tax>";
					$ResponseXML .= "<taxname><![CDATA[Tax]]></taxname>";
					
					$invtot=number_format($row['tot_sub'], 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
				}
				$ResponseXML .= "<chq_validity><![CDATA[yes]]></chq_validity>";
				$ResponseXML .= " </salesdetails>";
				
		//	}	
				
				
				echo $ResponseXML;
		} else {
			
			$ResponseXML = " <salesdetails>";
			
			$ResponseXML .= "<chq_validity><![CDATA[no]]></chq_validity>";
								
				$ResponseXML .= " </salesdetails>";
				
		
				echo $ResponseXML;
		}		
			
	}
	
	
	if($_GET["Command"]=="add_tmp_edit_rate")
		{
		
		
		
		if ($_SESSION["dev"]==""){
			$ResponseXML = "";
			$ResponseXML .= "<salesdetails>";
			$ResponseXML .= "<chq_validity><![CDATA[no]]></chq_validity>";
			$ResponseXML .= "</salesdetails>";
			
			exit($ResponseXML);
		}
		header('Content-Type: text/xml'); 
			echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		
			$department=$_GET["department"];
			
			$ResponseXML = "";
			$ResponseXML .= "<salesdetails>";
			
			
			//$sql="delete from tmp_inv_data where id='".$_GET['id']."' and str_code='".$_GET['itemcode']."' and tmp_no='".$_SESSION["tmp_no_salinv"]."' ";
			
			//$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			//echo $_GET['rate'];
			//echo $_GET['qty'];
			$rate=str_replace(",", "", $_GET["rate"]);
			$actual_selling=str_replace(",", "", $_GET["actual_selling"]);
			$qty=str_replace(",", "", $_GET["qty"]);
			$discount=str_replace(",", "", $_GET["discount"]);
			$subtotal=str_replace(",", "", $_GET["subtotal"]);
			
			$ResponseXML .= "<chq_validity><![CDATA[yes]]></chq_validity>";
			//$sql="Insert into tmp_inv_data (str_invno, str_code, str_description, cur_rate, cur_qty, dis_per, cur_discount, cur_subtot, brand, tmp_no, actual_selling)values 
			//('".$_GET['invno']."', '".$_GET['itemcode']."', '".$_GET['item']."', ".$rate.", ".$qty.", ".$_GET["discountper"].", ".$discount.", ".$subtotal.", '".$_GET['brand']."', '".$_SESSION["tmp_no_salinv"]."', ".$actual_selling.") ";
			
			$sql="update tmp_inv_data set cur_rate=".$rate.", cur_qty=".$qty.", dis_per=".$_GET["discountper"].", cur_discount=".$discount.", cur_subtot=".$subtotal.", actual_selling=".$actual_selling." where id='".$_GET['id']."'";
			//('".$_GET['invno']."', '".$_GET['itemcode']."', '".$_GET['item']."', , , , , , , '".$_SESSION["tmp_no_salinv"]."', ) ";
			//echo $sql;
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
			
			
				$ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                              <td width=\"50\"  background=\"\" ><font color=\"#FFFFFF\">ID</font></td>
							  <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Code</font></td>
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Rate</font></td>
							  <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Rate With VAT</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Qty</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Sub Total</font></td>
							  <td></td>
							  <td width=\"50\"  background=\"\"><font color=\"#FFFFFF\">AD</font></td>
							  <td width=\"70\">Qty In Hand</td>
                            </tr>";
							
			$i=1;
			$sql="Select * from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."' order by id";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
			while($row = mysql_fetch_array($result)){	
				
				$id="id".$i;
				$code="code".$i;
				$itemd="itemd".$i;
				$rate="rate".$i;
				$actual_selling="actual_selling".$i;
				$qty="qty".$i;			
				$discountper="discountper".$i;			
				$subtotal="subtotal".$i;	
				$discount="discount".$i;	
				$ad="ad".$i;	
						
             	$ResponseXML .= "<tr>                              
                             <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$id."'>".$row['id']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$code."'>".$row['str_code']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$itemd."'>".$row['str_description']."</div></td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$rate."\" id=\"".$rate."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\" disabled onblur=\"calc1_table('".$i."');\"  onkeypress=\"keyset('credper',event);\" /></td>
							 <td align=right ><input type=\"text\"  class=\"text_purchase3\" name=\"".$actual_selling."\" id=\"".$actual_selling."\" size=\"15\"  value=\"".number_format($row['actual_selling'], 2, ".", ",")."\" onblur=\"calc1_table('".$i."');\" /></td>
							  <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$qty."\" id=\"".$qty."\" size=\"15\"  value=\"".number_format($row['cur_qty'], 0, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"  onkeypress=\"keyset('credper',event);\" />    </td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$discountper."'>".number_format($_GET["discountper"], 6, ".", ",")."</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"".$discount."\" id=\"".$discount."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\"    /></td>
							 
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$subtotal."'>".number_format($row['cur_subtot'], 2, ".", ",")."</div></td>";
							// <td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."'></td>
							$ResponseXML .= " <td ><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=".$row['str_code']."  name=".$row['str_code']." onClick=\"del_item('".$row['id']."');\"></td>";
							 
							include_once("connection.php");
							
							 $sqlqty = mysql_query("select QTYINHAND from s_submas where STK_NO='".$row['str_code']."' AND STO_CODE='".$_GET["department"]."'") or die(mysql_error());
					if($rowqty = mysql_fetch_array($sqlqty)){
						$qty=number_format($rowqty['QTYINHAND'], 0, ".", ",");
					} else {
						$qty=0;
					}	
					
					if ($row['ad']=="1"){
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."' checked></td>";
					} else {
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."'></td>";
					}
							
						
							$ResponseXML .= "<td  >".$qty."</td>
						
							
							 
                            </tr>";
					$i=$i+1;		
				}			
							
                $ResponseXML .= "   </table>]]></sales_table>";
				
				$ResponseXML .= "<item_count><![CDATA[".$i."]]></item_count>";
				
				$sql="Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
				$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
				$row = mysql_fetch_array($result);	
				$ResponseXML .= "<subtot><![CDATA[".number_format($row['tot_sub'], 2, ".", ",")."]]></subtot>";
				$ResponseXML .= "<tot_dis><![CDATA[".number_format($row['tot_dis'], 2, ".", ",")."]]></tot_dis>";
				
				$sql_invpara="SELECT * from invpara";
				$result_invpara =$db->RunQuery($sql_invpara);
				$row_invpara = mysql_fetch_array($result_invpara);
				
				$vatrate=$row_invpara["vatrate"]/100;
				
				if ($_GET["vatmethod"]=="vat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (VAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="svat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (SVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="evat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (EVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="non"){
					//$tax=number_format($row['tot_sub']*$vatrate, 2, ".", ",");
					$ResponseXML .= "<tax><![CDATA[0.00]]></tax>";
					$ResponseXML .= "<taxname><![CDATA[Tax]]></taxname>";
					
					$invtot=number_format($row['tot_sub'], 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
				}
				
				$ResponseXML .= " </salesdetails>";
				
		//	}	
				
				
				echo $ResponseXML;
				
			
	}
	
	
	
	if($_GET["Command"]=="add_tmp_edit_discount")
		{
		
		if ($_SESSION["dev"]==""){
			$ResponseXML = "<salesdetails>";
			$ResponseXML .= "<chq_validity><![CDATA[no]]></chq_validity>";
			$ResponseXML .= "</salesdetails>";
			exit($ResponseXML);
		}
			$department=$_GET["department"];
			
			$ResponseXML = "";
			$ResponseXML .= "<salesdetails>";
			$ResponseXML .= "<chq_validity><![CDATA[yes]]></chq_validity>";
			
			//$sql="delete from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."' ";
			//$ResponseXML .= $sql;
			//$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			//echo $_GET['rate'];
			//echo $_GET['qty'];
		//echo "count :".$_GET["item_count"];
		$i=1;
		while ($_GET["item_count"]>$i){	
		
			
			$id="id".$i;
			$code="code".$i;
			$itemd="itemd".$i;	
			$discountper="discountper".$i;
			$srate="rate".$i;
			$rate=str_replace(",", "", $_GET[$srate]);
			
			$sactual_selling="actual_selling".$i;
			$actual_selling=str_replace(",", "", $_GET[$sactual_selling]);
			
			$sqty="qty".$i;
			$qty=str_replace(",", "", $_GET[$sqty]);
			$sdiscount="discount".$i;
			$discount=str_replace(",", "", $_GET[$sdiscount]);
			$ssubtotal="subtotal".$i;
			$subtotal=str_replace(",", "", $_GET[$ssubtotal]);
			$ad="ad".$i;
			
			if ($_GET[$ad]=="true"){
				$ad_val="1";
			} else {
				$ad_val="0";
			}
			
			//$sql="Insert into tmp_inv_data (str_invno, str_code, str_description, cur_rate, cur_qty, dis_per, cur_discount, cur_subtot, brand, actual_selling, tmp_no, ad)values 
			//('".$_GET['invno']."', '".$_GET[$code]."', '".$_GET[$itemd]."', ".$rate.", ".$qty.", ".$_GET[$discountper].", ".$discount.", ".$subtotal.", '".$_GET['brand']."', '".$actual_selling."', '".$_SESSION["tmp_no_salinv"]."', '".$ad_val."') ";
			
			$sql="update tmp_inv_data set cur_rate=".$rate.", cur_qty=".$qty.", dis_per=".$_GET[$discountper].", cur_discount=".$discount.", cur_subtot=".$subtotal.", actual_selling='".$actual_selling."', ad='".$ad_val."' where id=".$_GET[$id];
			//echo $sql;
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
			 $i=$i+1;
			}
				$ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                              <td width=\"50\"  background=\"\" ><font color=\"#FFFFFF\">ID</font></td>
							  <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Code</font></td>
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Rate</font></td>
							  <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Rate With VAT</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Qty</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Sub Total</font></td>
							  <td></td>
							  <td width=\"50\"  background=\"\"><font color=\"#FFFFFF\">AD</font></td>
							  <td width=\"70\">Qty In Hand</td>
							  
                            </tr>";
							
			$i=1;
			$sql="Select * from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."' order by id";
			
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
			while($row = mysql_fetch_array($result)){	
				
				$id="id".$i;
				$code="code".$i;
				$itemd="itemd".$i;
				$rate="rate".$i;
				$actual_selling="actual_selling".$i;
				$qty="qty".$i;			
				$discountper="discountper".$i;			
				$subtotal="subtotal".$i;	
				$discount="discount".$i;	
				$ad="ad".$i;
						
             	$ResponseXML .= "<tr>                              
                             <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$id."'>".$row['id']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$code."'>".$row['str_code']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$itemd."'>".$row['str_description']."</div></td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$rate."\" id=\"".$rate."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\"  disabled onkeypress=\"keyset('credper',event);\" /></td>
							 <td align=right ><input type=\"text\"  class=\"text_purchase3\" name=\"".$actual_selling."\" id=\"".$actual_selling."\" size=\"15\"  value=\"".number_format($row['actual_selling'], 2, ".", ",")."\" onblur=\"calc1_table('".$i."');\"  /></td>
							  <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$qty."\" id=\"".$qty."\" size=\"15\"  value=\"".number_format($row['cur_qty'], 0, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"  onkeypress=\"keyset('credper',event);\" />    </td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$discountper."'>".number_format($row["dis_per"], 6, ".", ",")."</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"".$discount."\" id=\"".$discount."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\"    /></td>
							 
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$subtotal."'>".number_format($row['cur_subtot'], 2, ".", ",")."</div></td>";
							// <td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."'></td>
							$ResponseXML .= " <td ><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=".$row['str_code']."  name=".$row['str_code']." onClick=\"del_item('".$row['id']."');\"></td>";
							 
							
						include_once("connection.php");
							
							 $sqlqty = mysql_query("select QTYINHAND from s_submas where STK_NO='".$row['str_code']."' AND STO_CODE='".$_GET["department"]."'") or die(mysql_error());
					if($rowqty = mysql_fetch_array($sqlqty)){
						$qty=number_format($rowqty['QTYINHAND'], 0, ".", ",");
					} else {
						$qty=0;
					}	
					
					if ($row['ad']=="1"){
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."' checked></td>";
					} else {
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."'></td>";
					}
							
						
							$ResponseXML .= "<td  >".$qty."</td>
							
							 
                            </tr>";
					$i=$i+1;		
				}			
							
                $ResponseXML .= "   </table>]]></sales_table>";
				
				$ResponseXML .= "<item_count><![CDATA[".$i."]]></item_count>";
				
				$sql="Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
				
				$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
				$row = mysql_fetch_array($result);	
				$ResponseXML .= "<subtot><![CDATA[".number_format($row['tot_sub'], 2, ".", ",")."]]></subtot>";
				$ResponseXML .= "<tot_dis><![CDATA[".number_format($row['tot_dis'], 2, ".", ",")."]]></tot_dis>";
				
				$sql_invpara="SELECT * from invpara";
				$result_invpara =$db->RunQuery($sql_invpara);
				$row_invpara = mysql_fetch_array($result_invpara);
				
				$vatrate=$row_invpara["vatrate"]/100;
				
				if ($_GET["vatmethod"]=="vat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (VAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="svat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (SVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="evat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (EVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="non"){
					//$tax=number_format($row['tot_sub']*$vatrate, 2, ".", ",");
					$ResponseXML .= "<tax><![CDATA[0.00]]></tax>";
					$ResponseXML .= "<taxname><![CDATA[Tax]]></taxname>";
					
					$invtot=number_format($row['tot_sub'], 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
				}
				
				$ResponseXML .= " </salesdetails>";
				
		//	}	
				
				
				echo $ResponseXML;
				
			
	}
	
	if($_GET["Command"]=="disp_qty")
	{
		 include_once("connection.php");
						
					$sqlqty = mysql_query("select QTYINHAND from s_submas where STK_NO='".$_GET["it_code"]."' AND STO_CODE='".$_GET["department"]."'") or die(mysql_error());
					if($rowqty = mysql_fetch_array($sqlqty)){
						$qty=$rowqty['QTYINHAND'];
					} else {
						$qty=0;
					}	
			echo $qty;		
	}
	
	if($_GET["Command"]=="setord")
	{
		
		
		 if ($_SESSION['company']=="THT"){	
			$sql="Select SPINV from tmpinvpara";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			$row = mysql_fetch_array($result);
			//$_SESSION["tmp_no_salinv"]="CRI/".$row["SPINV"];
			//echo $_SESSION["tmp_no_salinv"];
			//$sql="delete from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			//$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			//$sql="update tmpinvpara set SPINV=SPINV+1";
			//$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			
			
			
			
			$sql="Select SPINV, CRE_INV_NO, CAS_INV_NO from invpara";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			$row = mysql_fetch_array($result);
			if ($_SESSION['dev']=="1"){
				 				
				$tmpinvno="000000".($row["SPINV"]+1);
				$lenth=strlen($tmpinvno);
			
				$invno=trim("CRI/ ").substr($tmpinvno, $lenth-6)."/5";
				$_SESSION["invno"]=$invno;
				$txtdono=$row["CAS_INV_NO"]+1;
			} else {
				
				$tmpinvno="000000".($row["SPINV"]+1);
				$lenth=strlen($tmpinvno);
			
				$invno=trim("CRI/ ").substr($tmpinvno, $lenth-6)."/".$_GET["salesrep"];
				$_SESSION["invno"]=$invno;
				$txtdono=$row["CRE_INV_NO"]+1;
			
			}
			
		} else 	 if ($_SESSION['company']=="BEN") {
			$sql="Select SPINV from tmpinvpara";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			$row = mysql_fetch_array($result);
			//$_SESSION["tmp_no_salinv"]="CRI/".$row["SPINV"];
			//echo $_SESSION["tmp_no_salinv"];
			//$sql="delete from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			//$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			//$sql="update tmpinvpara set SPINV=SPINV+1";
			//$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			
			$sql="Select SPINV, SPINV1, CAS_INV_NO_m, CAS_INV_NO from invpara";
			//echo $sql;
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			$row = mysql_fetch_array($result);
			
			if ($_SESSION['dev']=="1"){
				$tmpinvno="000000".($row["SPINV1"]+1);
				$lenth=strlen($tmpinvno);
			
				$invno=trim("BEN/CR/ ").substr($tmpinvno, $lenth-6)."/2";
				$_SESSION["invno"]=$invno;
				$txtdono=$row["CAS_INV_NO_m"]+1;
   	
			} else {
				$tmpinvno="000000".($row["SPINV"]+1);
				$lenth=strlen($tmpinvno);
			
				$invno=trim("BEN/CR/ ").substr($tmpinvno, $lenth-6)."/".$_GET["salesrep"];
				$_SESSION["invno"]=$invno;
				$txtdono=$row["CAS_INV_NO"]+1;
  
			}
		}
		
		include_once("connection.php");
		
		
		/*
		$len=strlen($_GET["salesord1"]);
		$need=substr($_GET["salesord1"],$len-7, $len);
		$salesord1=trim("ORD/ ").$_GET["salesrep"].trim(" / ").$need;
		
			$sql = mysql_query("Select SPINV, CRE_INV_NO, CAS_INV_NO from invpara") or die(mysql_error());
			$row = mysql_fetch_array($sql);
			if ($_SESSION['dev']=="1"){
				 				
				$tmpinvno="000000".($row["SPINV"]+1);
				$lenth=strlen($tmpinvno);
			
				$invno=trim("CRI/ ").substr($tmpinvno, $lenth-7)."/5";
				$_SESSION["invno"]=$invno;
				$txtdono=$row["CAS_INV_NO"]+1;
			} else {
				
				$tmpinvno="000000".($row["SPINV"]+1);
				$lenth=strlen($tmpinvno);
			
				$invno=trim("CRI/ ").substr($tmpinvno, $lenth-7)."/".$_GET["salesrep"];
				$_SESSION["invno"]=$invno;
				$txtdono=$row["CRE_INV_NO"]+1;
			
			}
			
			*/
		$_SESSION["custno"]=$_GET['custno'];
		$_SESSION["brand"]=$_GET["brand"];
		$_SESSION["department"]=$_GET["department"];
		
		
	
	header('Content-Type: text/xml'); 
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
			
			$ResponseXML = "";
			$ResponseXML .= "<salesdetails>";
			
			$ResponseXML .= "<invno><![CDATA[".$invno."]]></invno>";
			$ResponseXML .= "<txtdono><![CDATA[".$txtdono."]]></txtdono>";
			
				$cuscode=$_GET["custno"];	
				$salesrep=$_GET["salesrep"];
				$brand=$_GET["brand"];
					
			//		$ResponseXML .= "<salesord><![CDATA[".$salesord1."]]></salesord>";
				
					
	    //Call SETLIMIT ====================================================================
		
		
		
	/*	$sql = mysql_query("DROP VIEW view_s_salma") or die(mysql_error());
					$sql = mysql_query("CREATE VIEW view_s_salma
AS
SELECT     s_salma.*, brand_mas.class AS class
FROM         brand_mas RIGHT OUTER JOIN
                      s_salma ON brand_mas.barnd_name = s_salma.brand") or die(mysql_error());*/

	$OutpDAMT = 0;
	$OutREtAmt = 0;
	$OutInvAmt = 0;
	$InvClass="";
	
	$sqlclass = mysql_query("select class from brand_mas where barnd_name='".trim($brand)."'") or die(mysql_error());
	if ($rowclass = mysql_fetch_array($sqlclass)){
		if (is_null($rowclass["class"])==false){
			$InvClass=$rowclass["class"];
		}
	}
	
	$sqloutinv = mysql_query("select sum(GRAND_TOT-TOTPAY) as totout from view_s_salma where GRAND_TOT>TOTPAY and CANCELL='0' and C_CODE='".trim($cuscode)."' and SAL_EX='".trim($salesrep)."' and class='".$InvClass."'") or die(mysql_error());
	if ($rowoutinv = mysql_fetch_array($sqloutinv)){
		if (is_null($rowoutinv["totout"])==false){
			$OutInvAmt=$rowoutinv["totout"];
		}
	}

$sqlinvcheq = mysql_query("SELECT * FROM s_invcheq WHERE che_date>'".$_GET["invdate"]."' AND cus_code='".trim($cuscode)."' and trn_type='REC' and sal_ex='".trim($salesrep)."'") or die(mysql_error());
//echo "SELECT * FROM s_invcheq WHERE che_date>'".$_GET["invdate"]."' AND cus_code='".trim($cuscode)."' and trn_type='REC' and sal_ex='".trim($salesrep)."'";
	while($rowinvcheq = mysql_fetch_array($sqlinvcheq)){
		
		$sqlsttr = mysql_query("select * from s_sttr where ST_REFNO='".trim($rowinvcheq["refno"])."' and ST_CHNO ='".trim($rowinvcheq["cheque_no"]) ."'") or die(mysql_error());
		//echo "select * from s_sttr where ST_REFNO='".trim($rowinvcheq["refno"])."' and ST_CHNO ='".trim($rowinvcheq["cheque_no"]) ."'";
		while($rowsttr = mysql_fetch_array($sqlsttr)){
			$sqlview_s_salma = mysql_query("select class from view_s_salma where REF_NO='".trim($rowsttr["ST_INVONO"])."'") or die(mysql_error());
			if($rowview_s_salma = mysql_fetch_array($sqlview_s_salma)){
				
				if (trim($rowview_s_salma["class"]) == $InvClass){
                    $OutpDAMT = $OutpDAMT + $rowsttr["ST_PAID"];
                }
			}
		}
	}


        
        $pend_ret_set = 0;
		
		$sqlinvcheq = mysql_query("SELECT sum(che_amount) as  che_amount FROM s_invcheq WHERE che_date >'".$_GET["invdate"]."' AND cus_code='".trim($cuscode)."' and trn_type='RET'") or die(mysql_error());
		if($rowinvcheq = mysql_fetch_array($sqlinvcheq)){
			if (is_null($rowinvcheq["che_amount"])==false){
				$pend_ret_set=$rowinvcheq["che_amount"];
			}
		}
		
		
		$sqlcheq = mysql_query("Select sum(CR_CHEVAL-PAID) as tot from s_cheq where CR_C_CODE='".trim($cuscode)."'  and CR_CHEVAL-PAID>0 and CR_FLAG='0' and S_REF='".trim($salesrep)."'") or die(mysql_error());
		if($rowcheq = mysql_fetch_array($sqlcheq)){
			if (is_null($rowcheq["tot"])==false){
				$OutREtAmt=$rowcheq["tot"];
			} else {
				$OutREtAmt=0;
			}
		}
		
            
 $d=date("Y-m-d");
		
			$date = date('Y-m-d',strtotime($d.' -60 days'));
		
		$sql_rssal = mysql_query("Select sum(GRAND_TOT - TOTPAY) as out1 from s_salma where C_CODE = '" . trim($cuscode) . "' and (SDATE < '" . $date . "') and GRAND_TOT - TOTPAY > 1 and CANCELL = '0'") or die(mysql_error());
		
    	if ($row_rssal = mysql_fetch_array($sql_rssal)){

			if (is_null($row_rssal["out1"])==false) { 
				$rtxover60 = number_format($row_rssal["out1"], 2, ".", ",");
			}
		}

						 
   $ResponseXML .= "<sales_table_acc><![CDATA[ <table  border=0  cellspacing=0>
						<tr><td><input type=\"text\"  class=\"label_purchase\" value=\"Outstanding Invoice Amount\" disabled=\"disabled\"/></td><td><input type=\"text\"  class=\"label_purchase\" value=\"".number_format($OutInvAmt, 2, ".", ",")."\" disabled=\"disabled\"/></td></tr>
						 <td><input type=\"text\"  class=\"label_purchase\" value=\"Return Cheque Amount\" disabled=\"disabled\"/></td><td><input type=\"text\"  class=\"label_purchase\" value=\"".number_format($OutREtAmt, 2, ".", ",")."\" disabled=\"disabled\"/></td></tr>
						 <td><input type=\"text\"  class=\"label_purchase\" value=\"Pending Cheque Amount\" disabled=\"disabled\"/></td><td><input type=\"text\"  class=\"label_purchase\" value=\"".number_format($OutpDAMT, 2, ".", ",")."\" disabled=\"disabled\"/></td></tr>
						 <td><input type=\"text\"  class=\"label_purchase\" value=\"PSD Cheque Settlments\" disabled=\"disabled\"/></td><td><input type=\"text\"  class=\"label_purchase\" value=\"".number_format($pend_ret_set, 2, ".", ",")."\" disabled=\"disabled\"/></td></tr>
						 <td><input type=\"text\"  class=\"label_purchase\" value=\"Over 60 Outstandings\" disabled=\"disabled\"/></td><td><input type=\"text\"  class=\"label_purchase\" value=\"".$rtxover60."\" disabled=\"disabled\"/></td></tr>
						 <td><input type=\"text\"  class=\"label_purchase\" value=\"Total\" disabled=\"disabled\"/></td><td><input type=\"text\"  class=\"label_purchase\" value=\"".number_format($OutInvAmt+$OutREtAmt+$OutpDAMT+$pend_ret_set, 2, ".", ",")."\" disabled=\"disabled\"/></td></tr>
						 </table></table>]]></sales_table_acc>";
						 
						  
				//echo "select * from br_trn where Rep='".trim($salesrep)."' and brand='".trim($InvClass)."' and cus_code='" .trim($cuscode)."'";			      

      $sqlbr_trn = mysql_query("select * from br_trn where Rep='".trim($salesrep)."' and brand='".trim($InvClass)."' and cus_code='" .trim($cuscode)."'") or die(mysql_error());  
	if($rowbr_trn = mysql_fetch_array($sqlbr_trn)){
	
		if(is_null($rowbr_trn["credit_lim"]) == false){
			$crLmt=$rowbr_trn["credit_lim"];
		} else {	
			$crLmt=0;		
		}
	
		
		if(is_null($rowbr_trn["tmpLmt"]) == false){
			$tmpLmt=$rowbr_trn["tmpLmt"];
		} else {	
			$tmpLmt=0;		
		}
		
		if(is_null($rowbr_trn["tmpLmt"]) == false){
        	if ($rowbr_trn["Day"] == date("Y-m-d")) {
            	$tmpLmt=$rowbr_trn["tmpLmt"];
            } else {
                
				$sql_invcls = mysql_query("select * from brand_mas where barnd_name='" . trim($_GET["brand"]) . "'") or die(mysql_error());     			if($row_invcls  = mysql_fetch_array($sql_invcls)){
					$sql_upbr = mysql_query("update br_trn set tmpLmt= '0'   where cus_code='" . trim($cuscode) . "' and brand='" .trim($row_invcls["class"])."' and Rep='".trim($salesrep)."'") or die(mysql_error());                    
                }   
                $tmpLmt = 0;
                    
            }
        } else {
		    $tmpLmt = 0;
		}	
        
		//echo "cat ".$rowbr_trn["CAT"];
		if (is_null($rowbr_trn["CAT"])==false) {
			$cuscat = trim($rowbr_trn["CAT"]);
            if ($cuscat == "A"){ $m = 2.5; }
            if ($cuscat == "B"){ $m = 2.5; }
            if ($cuscat == "C"){ $m = 1; }
			if ($cuscat == "D"){ $m = 0; }
			
            $txt_crelimi = 0;
            $txt_crebal = 0;
            $txt_crelimi = number_format($crLmt, 2, ".", ",");
			//$crebal=$crLmt * $m + $tmpLmt - $OutInvAmt - $OutREtAmt - $OutpDAMT - $pend_ret_set;
			
			
			//$txt_crebal = $crLmt * $m  - $OutInvAmt - $OutREtAmt - $OutpDAMT - $pend_ret_set;
            
			
			
            //$txt_crebal = number_format($crebal, "2", ".", ",");
          } else {
            $txt_crelimi = 0;
            $txt_crebal = 0;
          }
		  
		  $crebal = $crLmt * $m + $tmpLmt - $OutInvAmt - $OutREtAmt - $OutpDAMT - $pend_ret_set;
		/*  echo "crLmt:".$crLmt;
		  echo "m:".$m;
		  echo "tmpLmt:".$tmpLmt;
		  echo "OutInvAmt:".$OutInvAmt;
		  echo "OutREtAmt:".$OutREtAmt;
		  echo "OutpDAMT:".$OutpDAMT;
		  echo "pend_ret_set:".$pend_ret_set;*/
		  
		  $txt_crebal = $crLmt * $m  - $OutInvAmt - $OutREtAmt - $OutpDAMT - $pend_ret_set;
         $creditbalance = $OutInvAmt + $OutREtAmt + $OutpDAMT;

	   			
			
			 
    }    
			$ResponseXML .= "<txt_crelimi><![CDATA[".$txt_crelimi."]]></txt_crelimi>";
			$ResponseXML .= "<txt_crebal><![CDATA[".number_format($txt_crebal, "2", ".", ",")."]]></txt_crebal>";
          
         	 $ResponseXML .= "<creditbalance><![CDATA[".number_format($txt_crebal, "2", ".", ",")."]]></creditbalance>";
			 $ResponseXML .= "<crebal><![CDATA[".number_format($crebal, "2", ".", ",")."]]></crebal>";

		

		$ResponseXML .= "</salesdetails>";	
		echo $ResponseXML;
				
				
	
	
	}

		
	if($_GET["Command"]=="del_item")
		{
		
			
			$ResponseXML .= "";
			$ResponseXML .= "<salesdetails>";
			
	
			$sql="delete from tmp_inv_data where id='".$_GET['code']."' and tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			$ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                              <td width=\"50\"  background=\"\" ><font color=\"#FFFFFF\">ID</font></td>
							  <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Code</font></td>
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Rate</font></td>
							  <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Rate With VAT</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Qty</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Sub Total</font></td>
							  <td></td>
							  <td width=\"50\"  background=\"\"><font color=\"#FFFFFF\">AD</font></td>
							  <td width=\"70\">Qty In Hand</td>
                            </tr>";
							
			$i=1;
			$sql="Select * from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 	
			while($row = mysql_fetch_array($result)){	
			
				$id="id".$i;
				$code="code".$i;
				$itemd="itemd".$i;
				$rate="rate".$i;
				$actual_selling="actual_selling".$i;
				$qty="qty".$i;			
				$discountper="discountper".$i;			
				$subtotal="subtotal".$i;	
				$discount="discount".$i;	
				$ad="ad".$i;
							
             	$ResponseXML .= "<tr>
                             
							 
							  <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$id."'>".$row['id']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$code."'>".$row['str_code']."</div></td>
							 <td onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$itemd."'>".$row['str_description']."</div></td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$rate."\" id=\"".$rate."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"  onkeypress=\"keyset('credper',event);\" /></td>
							  <td align=right ><input type=\"text\"  class=\"text_purchase3\" name=\"".$actual_selling."\" id=\"".$actual_selling."\" size=\"15\"  value=\"".number_format($row['actual_selling'], 2, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"   /></td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><input type=\"text\"  class=\"text_purchase3\" name=\"".$qty."\" id=\"".$qty."\" size=\"15\"  value=\"".number_format($row['cur_qty'], 0, ".", ",")."\"  onblur=\"calc1_table('".$i."');\"  onkeypress=\"keyset('credper',event);\" />    </td>
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$discountper."'>".$row["dis_per"]."</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"".$discount."\" id=\"".$discount."\" size=\"15\"  value=\"".number_format($row['cur_rate'], 2, ".", ",")."\"    /></td>
							 
							 <td align=right onClick=\"disp_qty('".$row['str_code']."');\"><div id='".$subtotal."'>".number_format($row['cur_subtot'], 2, ".", ",")."</div></td>
							
							 <td ><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=".$row['str_code']."  name=".$row['str_code']." onClick=\"del_item('".$row['id']."');\"></td>";
							 
							 include_once("connection.php");
							
							 $sqlqty = mysql_query("select QTYINHAND from s_submas where STK_NO='".$row['str_code']."' AND STO_CODE='".$_GET["department"]."'") or die(mysql_error());
					if($rowqty = mysql_fetch_array($sqlqty)){
						$qty=number_format($rowqty['QTYINHAND'], 0, ".", ",");
					} else {
						$qty=0;
					}	
					
					if ($row['ad']=="1"){
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."' checked></td>";
					} else {
						$ResponseXML .= "<td><input type=\"checkbox\" onClick=\"chk_ad('".$i."');\" name='".$ad."' id='".$ad."'></td>";
					}
							
						
							$ResponseXML .= "<td  >".$qty."</td>
							 
						
                    </tr>";
					
					$i=$i+1;
				}			
				
				$ResponseXML .= "   </table>]]></sales_table>";
				 
				$sql="Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
				$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
				$row = mysql_fetch_array($result);	
				$ResponseXML .= "<subtot><![CDATA[".number_format($row['tot_sub'], 2, ".", ",")."]]></subtot>";
				$ResponseXML .= "<tot_dis><![CDATA[".number_format($row['tot_dis'], 2, ".", ",")."]]></tot_dis>";
				
				$sql_invpara="SELECT * from invpara";
				$result_invpara =$db->RunQuery($sql_invpara);
				$row_invpara = mysql_fetch_array($result_invpara);
				
				$vatrate=$row_invpara["vatrate"]/100;
				
				if ($_GET["vatmethod"]=="vat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (VAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="svat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (SVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="evat"){
					$tax=$row['tot_sub']*$vatrate;
					$taxf=number_format($tax, 2, ".", ",");
					
					$ResponseXML .= "<tax><![CDATA[".$taxf."]]></tax>";
					$strvatrate="Tax (EVAT ".$row_invpara["vatrate"]."%)";
					$ResponseXML .= "<taxname><![CDATA[".$strvatrate."]]></taxname>";
					
					$invtot=number_format($row['tot_sub']+$tax, 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
					
				} else if ($_GET["vatmethod"]=="non"){
					//$tax=number_format($row['tot_sub']*$vatrate, 2, ".", ",");
					$ResponseXML .= "<tax><![CDATA[0.00]]></tax>";
					$ResponseXML .= "<taxname><![CDATA[Tax]]></taxname>";
					
					$invtot=number_format($row['tot_sub'], 2, ".", ",");
					$ResponseXML .= "<invtot><![CDATA[".$invtot."]]></invtot>";
				}
							
                $ResponseXML .= " </salesdetails>";
				
				
		//	}	
				
				
				echo $ResponseXML;
				
			
	}

if($_GET["Command"]=="set_treatment")
{
	include('connection.php');
	
	$ResponseXML .= "";
	$ResponseXML .= "<salesdetails>";
			
	$list = "";
	$TAMOUNT = 0;
		
	$sql_per = " delete  from  tmp_treatment where user_id='".$_SESSION["CURRENT_USER"]."'";
	$result_per=mysql_query($sql_per, $dbinv);
	
	$sql_treat = " select * from  tremas order by TDESCRIPT";
	//echo $sql_treat;
	$result_treat=mysql_query($sql_treat, $dbinv);
	while($row_treat = mysql_fetch_array($result_treat)){
	
		$sql_pkg = " select * from  package_mas where package_no='" . $_GET["cmbpackage"] . "' and code='".$row_treat["TCODE"]."'";
		$result_pkg=mysql_query($sql_pkg, $dbinv);
		if ($row_pkg = mysql_fetch_array($result_pkg)){
						
			$list .= "<input type=\"checkbox\" name=\"".$row_treat["TCODE"]."\" id=\"".$row_treat["TCODE"]."\" checked=\"checked\" onclick=\"treat_tmp_save('".$row_treat["TCODE"]."');\" />&nbsp;&nbsp;&nbsp;".$row_treat["TDESCRIPT"]."</br>";
			
			$sql_per = " insert into tmp_treatment(code, name, amount, user_id) values ('".$row_treat["TCODE"]."', '".$row_treat["TDESCRIPT"]."', ".$row_treat["TAMOUNT"].", '".$_SESSION["CURRENT_USER"]."')";
			$result_per=mysql_query($sql_per, $dbinv);
			$TAMOUNT=$TAMOUNT+$row_treat["TAMOUNT"];
		} else {
			$list .= "<input type=\"checkbox\" name=\"".$row_treat["TCODE"]."\" id=\"".$row_treat["TCODE"]."\" onclick=\"treat_tmp_save('".$row_treat["TCODE"]."');\" />&nbsp;&nbsp;&nbsp;".$row_treat["TDESCRIPT"]."</br>";
		}	
	}
	
	$ResponseXML .= "<list><![CDATA[".$list."]]></list>";
	$ResponseXML .= "<TAMOUNT><![CDATA[".$TAMOUNT."]]></TAMOUNT>";
	
	 $ResponseXML .= " </salesdetails>";
	echo $ResponseXML;
	
}

	
if($_GET["Command"]=="treat_tmp_save")
{
	
	include('connection.php');
	
	$sql_per = " delete  from  tmp_treatment where code='" . $_GET["TCODE"] . "' and user_id='".$_SESSION["CURRENT_USER"]."'";
	$result_per=mysql_query($sql_per, $dbinv);
	if ($_GET["chk_val"]=="1"){
		$sql_treat = " select * from  tremas where TCODE='" . $_GET["TCODE"] . "'";
		$result_treat=mysql_query($sql_treat, $dbinv);
		if($row_treat = mysql_fetch_array($result_treat)){
			$sql_per = " insert into tmp_treatment(code, name, amount, user_id) values ('".$row_treat["TCODE"]."', '".$row_treat["TDESCRIPT"]."', ".$row_treat["TAMOUNT"].", '".$_SESSION["CURRENT_USER"]."')";
			$result_per=mysql_query($sql_per, $dbinv);
		}	
	}
	
	$sql_treat = " select sum(amount) as amou from  tmp_treatment where user_id='" . $_SESSION["CURRENT_USER"] . "'";
	$result_treat=mysql_query($sql_treat, $dbinv);
	$row_treat = mysql_fetch_array($result_treat);
	
	echo $row_treat["amou"];
}		
	
if($_GET["Command"]=="save_medical")
{
	include('connection.php');
	
	$ResponseXML .= "";
	$ResponseXML .= "<salesdetails>";
						
						
	/*$sql_per = "select * from  userpermission where username='" . $_SESSION["CURRENT_USER"] . "' and docid = '3'";
	$result_per=mysql_query($sql_per, $dbinv);
	if($row_per = mysql_fetch_array($result_per)){
		
		if ($row_per["doc_feed"]=="0"){
			exit("Permission Denied");
		}
	} else {
		exit("Empty Items List. Cannot Save!!!");
	}*/

	if ($_SESSION["mstat"] != "old") {
		
		//////////////////////////call com_count_Click//////////////////////
		//Load fCOUNT
		$sql_rscountry = "SELECT * FROM COUNTRY WHERE CODE='" . trim($_GET["txt_count"]) . "'";
		$result_rscountry=mysql_query($sql_rscountry, $dbinv);
		if($row_rscountry = mysql_fetch_array($result_rscountry)){
   			$TXTREFNO = trim($row_rscountry["REF_NO_C"]) + trim($row_rscountry["REF_NO"]);
		} else {
   			$sql_rscountry = "SELECT * FROM COUNTRY";
			$result_rscountry=mysql_query($sql_rscountry, $dbinv);
			$row_rscountry = mysql_fetch_array($result_rscountry);
  			$TXTREFNO = trim($_GET["txt_countna"]) . trim($row_rscountry["REF_NO"]);
		}
		
		$ResponseXML .= "<TXTREFNO><![CDATA[".$TXTREFNO."]]></TXTREFNO>";
		
		$sql_rs = "Select * from rege where SDATE ='" . $_GET["DTPicker1"] . "' order by SERI_NO desc";
		$result_rs=mysql_query($sql_rs, $dbinv);
		if($row_rs = mysql_fetch_array($result_rs)){	
			$txt_serino = $row_rs["SERI_NO"] + 1;
   			$TXTLAB_NO = $row_rs["SERI_NO"] + 1;
		} else {
   			$TXTLAB_NO = 1;
		}

 		$ResponseXML .= "<txt_serino><![CDATA[".$txt_serino."]]></txt_serino>";
		$ResponseXML .= "<TXTLAB_NO><![CDATA[".$TXTLAB_NO."]]></TXTLAB_NO>";


		if (trim($_GET["txt_countna"]) != "OTHER") {
			
			$tmpinvno="00".$txt_serino;
			$lenth=strlen($tmpinvno);
			
			$txt_xrayno = substr(trim($_GET["txt_countna"]), 0, 1) . substr($tmpinvno, $lenth-3);
			$txt_cmbno = substr(trim($_GET["txt_countna"]), 0, 1) . substr($tmpinvno, $lenth-3);
		} else {
			$tmpinvno="00".$txt_serino;
			$lenth=strlen($tmpinvno);
			$txt_xrayno =substr($tmpinvno, $lenth-3);
			$txt_cmbno = "";
		}
		
		$ResponseXML .= "<txt_xrayno><![CDATA[".$txt_xrayno."]]></txt_xrayno>";
		$ResponseXML .= "<txt_cmbno><![CDATA[".$txt_cmbno."]]></txt_cmbno>";
		
		
		
		////////////////////Call seri_cou
		$txt_serino = "";

		$sql_rsrege = "select count(SDATE) as no from rege where SDATE = '" . $_GET["DTPicker1"] . "' ";
		$result_rsrege=mysql_query($sql_rsrege, $dbinv);
		if($row_rsrege = mysql_fetch_array($result_rsrege)){	
			$txt_serino = $row_rsrege["no"] + 1;
		} else {
   			$txt_serino = 1;
		}
		
		$txt_serino = "";
		$sql_rsrege = "select *  from rege where SDATE = '" . $_GET["DTPicker1"] . "' order by SERI_NO desc ";
		$result_rsrege=mysql_query($sql_rsrege, $dbinv);
		if($row_rsrege = mysql_fetch_array($result_rsrege)){	
			$txt_serino = $row_rsrege["SERI_NO"];
		}
		$txt_serino = $txt_serino + 1;

	}

	/*

rs.Open "select * from rege  where drefno='" & Trim(TXTREFNO) & "'", DN.CON
If Not rs.EOF Then
a = MsgBox("Are You Sure You Want To Edit?", vbYesNo)

If a = 7 Then Exit Sub
*/

	if ($_GET["txtamu"]==""){
		$txtamu=0;
	} else {
		$txtamu=str_replace(",", "", $_GET["txtamu"]);
	}
	
	if ($_GET["txt_cas"]==""){
		$txt_cas=0;
	} else {
		$txt_cas=str_replace(",", "", $_GET["txt_cas"]);
	}	
	
	if ($_GET["txt_cheamo"]==""){
		$txt_cheamo=0;
	} else {
		$txt_cheamo=str_replace(",", "", $_GET["txt_cheamo"]);
	}
	
	if ($_GET["txt_paid"]==""){
		$txt_paid=0;
	} else {
		$txt_paid=str_replace(",", "", $_GET["txt_paid"]);
	}	
	
	$sql_status=0;
	
	mysql_query("SET AUTOCOMMIT=0", $dbinv);
	mysql_query("START TRANSACTION", $dbinv);

   	$sql_rst = "select * from rege where DREFNO='" . trim($_GET["TXTREFNO"]) . "'";
	$result_rst=mysql_query($sql_rst, $dbinv);
	if($row_rst = mysql_fetch_array($result_rst)){	
	
		//=======================delete OLD===================================
    	$sql_log = "insert into entry_log(refno, serino, username, docid, docname, trnType, stime, sdate, c_code, ppno, amount, paid) values ('" . trim($row_rst["DREFNO"]) . "', '" . trim($row_rst["SERI_NO"]) . "','" . trim($row_rst["RE_CHECHK"]) . "-" . $_SESSION["CURRENT_USER"] . "', '3', 'REGE', 'EDIT', '" . $_GET["DTPicker1"] . "', '" . date("Y-m-d H:i:s") . "', '" . trim($row_rst["CODE"]) . "', '" . trim($row_rst["PA_NO"]) . "', '" . $row_rst["AMOUNT"] . "', '" . $row_rst["AMOUNT1"] . "')";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=1; }
		
		$sql_log = "delete from rege where DREFNO='" . trim($_GET["TXTREFNO"]) . "'";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=2; }
		
		$sql_log = "delete from regtran where drefno='" . trim($_GET["TXTREFNO"]) . "'";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=3; }
		
		$sql_log = "delete from s_salma where REF_NO='" . trim($_GET["TXTREFNO"]) . "'";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=4; }
		
		$sql_log = "delete from s_invcheq where refno='" . trim($_GET["TXTREFNO"]) . "'";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=5; }
		
		$sql_log = "delete from ledge where REFNO='" . trim($_GET["TXTREFNO"]) . "'";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=6; }
		
	} else {
	
		$sql_log = "update country set REF_NO=REF_NO+1 where CODE='" . trim($_GET["txt_count"]) . "'";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=7; }
		
		$sql_log = "update para set D_REFNO=D_REFNO+1";
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=8; }
		
		$sql_log = "insert into entry_log(refno, serino, username, docid, docname, trnType, stime, sdate) values ('" . trim($_GET["TXTREFNO"]) . "', '" . trim($txt_serino) . "', '" . $_SESSION["CURRENT_USER"] . "', '3', 'REGE', 'SAVE', '" . $_GET["DTPicker1"] . "', '" . date("Y-m-d H:i:s") . "')";
		echo $sql_log;
		$result_log=mysql_query($sql_log, $dbinv);
		if ($result_log==false){ $sql_status=9; }
		
	}

	//-------------------------Save Rege Details-------------------------------'

	$sql_reg = "insert into rege(DREFNO, CODE, AGNAME, SDATE, G_NO, NAME, AMOUNT, AMOUNT1, TYPE, DEL_DATE, COUNTRY, cou_NAME, CUS_REMARK, AGE_Y, AGE_M, DEST, PA_NO, CMB_NO, SERI_NO, XRAYNO, picture, mfile, sex, Status, NATIONL, PLA_OF_IS, POS_APP, No_child, last_ch_age, GCC_NO, cusadd, isLRMP, Lastname, userrefno, initial, stime, chkdt, chkamt, bank, CHKNO, cash, religon, RE_CHECHK, tel) values ('" . trim($_GET["TXTREFNO"]) . "', '" . trim($_GET["txtCcode"]) . "', '" . trim($_GET["txt_agname"]) . "', '".$_GET["DTPicker1"]."', '".trim($_GET["txt_gccno"])."', '".trim($_GET["txt_frname"])."', " . $txtamu . ", " . $txt_paid . ", '".trim($_GET["cmbpaytype"])."', '', '".trim($_GET["txt_count"])."', '".trim($_GET["txt_countna"])."', '".trim($_GET["txt_rema"])."', '".trim($_GET["txt_ag_ye"])."', '', '".trim($_GET["cmbdi"])."', '".trim($_GET["txt_passno"])."', '".trim($_GET["txt_cmbno"])."', '".trim($_GET["txt_serino"])."', '".trim($_GET["txt_xrayno"])."', 'Path', 'mfile', '".trim($_GET["cmbsex"])."', '".trim($_GET["cmbstatus"])."', '".trim($_GET["cmbnat"])."', '".trim($_GET["txtPLA_OF_IS"])."', '".trim($_GET["txtPOS_APP"])."', '', '', '".trim($_GET["txt_gccno"])."', '".trim($_GET["txtadd"])."', '', '".trim($_GET["txt_lastname"])."', '".trim($_GET["TXTLAB_NO"])."', '".trim($_GET["cmbmr"])."', '".date("Y-m-d H:i:s")."', '".trim($_GET["txt_chdate"])."', '".trim($txt_cheamo)."', '".trim($_GET["txtbank"])."', '".trim($_GET["txt_cheno"])."', '".trim($txt_cas)."', '".trim($_GET["cmdbreligon"])."', '".$_SESSION["CURRENT_USER"]."', '".trim($_GET["txttel"])."')";
	
	$result_reg=mysql_query($sql_reg, $dbinv);
	if ($result_reg==false){ $sql_status=10; }
	
/*
If Path <> "" Then
reg!Picture = Path
Set rsp = New ADODB.Recordset
rsp.Open "select * from phtooo where drefno = '" & Trim(reg!Drefno) & "'", DN.CON1, adOpenKeyset, adLockOptimistic
If rsp.EOF Then
rsp.addnew
End If


Set mstream = New ADODB.Stream
mstream.Type = adTypeBinary
mstream.Open
mstream.LoadFromFile (Path)
rsp.Fields("pic").Value = mstream.Read
rsp!Drefno = Trim(reg!Drefno)
rsp.Update
End If*/

	$sql_log = "delete from regtran where drefno = '" . trim($_GET["TXTREFNO"]) . "'";
	$result_log=mysql_query($sql_log, $dbinv);
	if ($result_log==false){ $sql_status=11; }
		
	$sql_rst = "select * from tmp_treatment where user_id='" . trim($_SESSION["CURRENT_USER"]) . "'";
	$result_rst=mysql_query($sql_rst, $dbinv);
	while($row_rst = mysql_fetch_array($result_rst)){
		
		$sql_regtran = "insert into regtran (drefno, tcode, tdes) values ('" . trim($_GET["TXTREFNO"]) . "', '" . trim($row_rst["code"]) . "', '" . trim($row_rst["name"]) . "')";
		$result_regtran=mysql_query($sql_regtran, $dbinv);
		if ($result_regtran==false){ $sql_status=12; }
		
	}
 

//-------------------------Settlments-------------------------------'
	
	$sql_s_salma = "insert into s_salma (REF_NO , SDATE, C_CODE, CUS_NAME, GRAND_TOT, CASH, TOTPAY, DEV, ORD_NO, Accname) values ('" . trim($_GET["TXTREFNO"]) . "', '" . $_GET["DTPicker1"] . "', '" . trim($_GET["txtCcode"]) . "', '" . trim($_GET["txt_agname"]) . "', " . $txtamu . ", " . $txt_cas . ", " . ($txt_cas + $txt_cheamo) . ", '" . trim($_SESSION['dev']) . "', '" . trim($_GET["TXTLAB_NO"]) . "' , '" . trim($_GET["txt_passno"]) . "')";
	$result_s_salma=mysql_query($sql_s_salma, $dbinv);
	if ($result_s_salma==false){ $sql_status=13; }
		
	$sql_ledge = "insert into ledge (REFNO, SERI_NO, CODE, sDATE, NAME, AMOUNT, AMOUNT1, TYPE, CHNO) values ('" . trim($_GET["TXTREFNO"]) . "', '" . $_GET["txt_serino"] . "', '" . trim($_GET["txtCcode"]) . "', '" . $_GET["DTPicker1"] . "', '" . trim($_GET["txt_agname"]) . "', " . $txtamu . ", " . ($txt_cas + $txt_cheamo) . ", 'REP', '" . trim($_GET["txt_cheno"]) . "')";
	
	$result_ledge=mysql_query($sql_ledge, $dbinv);
	if ($result_ledge==false){ $sql_status=14; }


   
	//------------------------- Cheque Details--------------------------'
	
	if ((trim($_GET["cmbpaytype"]) == "CHEQUE") or (trim($_GET["cmbpaytype"]) == "CASH/CHEQUE")) {
		
		$sql_ledge = "insert into s_invcheq(refno, Sdate, cus_code, CUS_NAME, cheque_no, che_date, bank, che_amount, dev) values ('" . trim($_GET["TXTREFNO"]) . "', '" . $_GET["DTPicker1"] . "', '" . trim($_GET["txtCcode"]) . "', '" . trim($_GET["txt_agname"]) . "', '" . trim($_GET["txt_cheno"]) . "', '" . $_GET["txt_chdate"] . "', '" . trim($_GET["txtbank"]) . "', " . $txt_cheamo . ", '" . trim($_SESSION['dev']) . "')";
		$result_ledge=mysql_query($sql_ledge, $dbinv);
		if ($result_ledge==false){ $sql_status=15; }
   
	}
	
	if ($sql_status==0){
		mysql_query("COMMIT", $dbinv);
		echo "Successfully Saved";	
	}	else {
		mysql_query("ROLLBACK", $dbinv);
		echo "Error has occured";
	}
	//echo $sql_status;
}


	
if($_GET["Command"]=="med_reg")
{
	include('connection.php');
	
	$ResponseXML .= "";
	$ResponseXML .= "<salesdetails>";
					
	$sql_rst = "select * from rege where SERI_NO='" . trim($_GET["serino"]) . "'";
	$result_rst=mysql_query($sql_rst, $dbinv);
	if($row_rst = mysql_fetch_array($result_rst)){
		$ResponseXML .= "<TXTREFNO><![CDATA[".$row_rst["DREFNO"]."]]></TXTREFNO>";
		$ResponseXML .= "<txtCcode><![CDATA[".$row_rst["CODE"]."]]></txtCcode>";
		$ResponseXML .= "<txt_agname><![CDATA[".$row_rst["AGNAME"]."]]></txt_agname>";
		$ResponseXML .= "<DTPicker1><![CDATA[".$row_rst["SDATE"]."]]></DTPicker1>";
		$ResponseXML .= "<txt_gccno><![CDATA[".$row_rst["G_NO"]."]]></txt_gccno>";
		$ResponseXML .= "<txt_frname><![CDATA[".$row_rst["NAME"]."]]></txt_frname>";
		$ResponseXML .= "<txtamu><![CDATA[".$row_rst["AMOUNT"]."]]></txtamu>";
		$ResponseXML .= "<txt_paid><![CDATA[".$row_rst["AMOUNT1"]."]]></txt_paid>";
		$ResponseXML .= "<cmbpaytype><![CDATA[".$row_rst["TYPE"]."]]></cmbpaytype>";
	//	$ResponseXML .= "<dtdel_date><![CDATA[".$row_rst["DEL_DATE"]."]]></dtdel_date>";
		$ResponseXML .= "<txt_count><![CDATA[".$row_rst["COUNTRY"]."]]></txt_count>";
		$ResponseXML .= "<txt_countna><![CDATA[".$row_rst["cou_NAME"]."]]></txt_countna>";
		$ResponseXML .= "<txt_rema><![CDATA[".$row_rst["CUS_REMARK"]."]]></txt_rema>";
		$ResponseXML .= "<txt_ag_ye><![CDATA[".$row_rst["AGE_Y"]."]]></txt_ag_ye>";
	//	$ResponseXML .= "<txt_ag_mon><![CDATA[".$row_rst["AGE_M"]."]]></txt_ag_mon>";
		$ResponseXML .= "<cmbdi><![CDATA[".$row_rst["DEST"]."]]></cmbdi>";
		$ResponseXML .= "<txt_passno><![CDATA[".$row_rst["PA_NO"]."]]></txt_passno>";
		$ResponseXML .= "<txt_cmbno><![CDATA[".$row_rst["CMB_NO"]."]]></txt_cmbno>";
		$ResponseXML .= "<txt_serino><![CDATA[".$row_rst["SERI_NO"]."]]></txt_serino>";
		$ResponseXML .= "<txt_xrayno><![CDATA[".$row_rst["XRAYNO"]."]]></txt_xrayno>";
		//$ResponseXML .= "<TXTREFNO><![CDATA[".$row_rst["picture"]."]]></TXTREFNO>";
		//$ResponseXML .= "<TXTREFNO><![CDATA[".$row_rst["mfile"]."]]></TXTREFNO>";
		$ResponseXML .= "<cmbsex><![CDATA[".$row_rst["sex"]."]]></cmbsex>";
		$ResponseXML .= "<cmbstatus><![CDATA[".$row_rst["Status"]."]]></cmbstatus>";
		$ResponseXML .= "<cmbnat><![CDATA[".$row_rst["NATIONL"]."]]></cmbnat>";
		$ResponseXML .= "<txtPLA_OF_IS><![CDATA[".$row_rst["PLA_OF_IS"]."]]></txtPLA_OF_IS>";
		$ResponseXML .= "<txtPOS_APP><![CDATA[".$row_rst["POS_APP"]."]]></txtPOS_APP>";
		//$ResponseXML .= "<txtnoch><![CDATA[".$row_rst["No_child"]."]]></txtnoch>";
		//$ResponseXML .= "<txtchage><![CDATA[".$row_rst["last_ch_age"]."]]></txtchage>";
		$ResponseXML .= "<txt_gccno><![CDATA[".$row_rst["GCC_NO"]."]]></txt_gccno>";
		$ResponseXML .= "<txtadd><![CDATA[".$row_rst["cusadd"]."]]></txtadd>";
	//	$ResponseXML .= "<chkLRMP><![CDATA[".$row_rst["isLRMP"]."]]></chkLRMP>";
		$ResponseXML .= "<txt_lastname><![CDATA[".$row_rst["Lastname"]."]]></txt_lastname>";
		$ResponseXML .= "<TXTLAB_NO><![CDATA[".$row_rst["userrefno"]."]]></TXTLAB_NO>";
		$ResponseXML .= "<cmbmr><![CDATA[".$row_rst["initial"]."]]></cmbmr>";
		$ResponseXML .= "<stime><![CDATA[".$row_rst["stime"]."]]></stime>";
		$ResponseXML .= "<txt_chdate><![CDATA[".$row_rst["chkdt"]."]]></txt_chdate>";
		$ResponseXML .= "<txt_cheamo><![CDATA[".$row_rst["chkamt"]."]]></txt_cheamo>";
		$ResponseXML .= "<txtbank><![CDATA[".$row_rst["bank"]."]]></txtbank>";
		$ResponseXML .= "<txt_cheno><![CDATA[".$row_rst["CHKNO"]."]]></txt_cheno>";
		$ResponseXML .= "<txt_cas><![CDATA[".$row_rst["cash"]."]]></txt_cas>";
		$ResponseXML .= "<cmdbreligon><![CDATA[".$row_rst["religon"]."]]></cmdbreligon>";
		$ResponseXML .= "<RE_CHECHK><![CDATA[".$row_rst["RE_CHECHK"]."]]></RE_CHECHK>";
		$ResponseXML .= "<txttel><![CDATA[".$row_rst["tel"]."]]></txttel>";
		
		$ResponseXML .= "<chk_list><![CDATA[";
		
		$sql_per = " delete from tmp_treatment where user_id = '".$_SESSION["CURRENT_USER"]."'";
		$result_per=mysql_query($sql_per, $dbinv);
		
		$sql_treat = " select * from  tremas order by TDESCRIPT";
	//echo $sql_treat;
		$result_treat=mysql_query($sql_treat, $dbinv);
		while($row_treat = mysql_fetch_array($result_treat)){
	
			$sql_regtrn = " select * from  regtran where drefno='" . trim($row_rst["DREFNO"]) . "' and tcode='".$row_treat["TCODE"]."'";
			
			$result_regtrn=mysql_query($sql_regtrn, $dbinv);
			if ($row_regtrn = mysql_fetch_array($result_regtrn)){
					//echo $sql_regtrn;	
				$ResponseXML .= "<input type=\"checkbox\" name=\"".$row_treat["TCODE"]."\" id=\"".$row_treat["TCODE"]."\" checked=\"checked\" onclick=\"treat_tmp_save('".$row_treat["TCODE"]."');\" />&nbsp;&nbsp;&nbsp;".$row_treat["TDESCRIPT"]."</br>";
			
				$sql_per = " insert into tmp_treatment(code, name, amount, user_id) values ('".$row_treat["TCODE"]."', '".$row_treat["TDESCRIPT"]."', ".$row_treat["TAMOUNT"].", '".$_SESSION["CURRENT_USER"]."')";
				$result_per=mysql_query($sql_per, $dbinv);
			
				$TAMOUNT=$TAMOUNT+$row_treat["TAMOUNT"];
			} else {
			
				$ResponseXML .= "<input type=\"checkbox\" name=\"".$row_treat["TCODE"]."\" id=\"".$row_treat["TCODE"]."\" onclick=\"treat_tmp_save('".$row_treat["TCODE"]."');\" />&nbsp;&nbsp;&nbsp;".$row_treat["TDESCRIPT"]."</br>";
			}	
		}
		
		$ResponseXML .= "]]></chk_list>";
		
		
	}
	
	
	$ResponseXML .= "</salesdetails>";
	echo $ResponseXML;
}
	
if($_GET["Command"]=="save_item")
{

	if (($_SESSION["tmp_no_salinv"]=="") or ($_SESSION["dev"]=="")){
  		exit("no");
  	}	
	
	include('connection.php');
	
	$sqltmp="select * from invpara";
	$resulttmp=mysql_query($sqltmp, $dbinv);
	$rowtmp = mysql_fetch_array($resulttmp);
	
	if ($rowtmp["form_loc"]=="1"){
  		exit("no");
  	}	
	
	$tmpsubtot=0;
	$tot_dis_per=0;
	
	$sqltmp="select * from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
	$resulttmp=mysql_query($sqltmp, $dbinv);
	while($rowtmp = mysql_fetch_array($resulttmp)){
		
		$dis_per = $rowtmp["cur_rate"]*$rowtmp["cur_qty"]*$rowtmp["dis_per"]*0.01;
		
		$tot_dis_per=$tot_dis_per+$dis_per;
		
		$tmpsubtot=$tmpsubtot+(($rowtmp["cur_rate"]*$rowtmp["cur_qty"])-$dis_per);
	}
	
	$vat="";
	if (($_GET["vatmethod"]=="vat") or ($_GET["vatmethod"]=="svat") or ($_GET["vatmethod"]=="evat")){
		$vat="1";
	} else {
		$vat="0";	
	}	
	
	$sql_invpara="SELECT * from invpara";
	$result_invpara=mysql_query($sql_invpara, $dbinv);
	$row_invpara = mysql_fetch_array($result_invpara);
				
					
	if ($vat=="1"){
		$vat_value=$tmpsubtot*$row_invpara["vatrate"]/100;
	} else {
		$vat_value=0;
	}
	
	$grand_tot=$tmpsubtot+$vat_value;
	
	$form_subtot=str_replace(",", "", $_GET["subtot"]);
	//echo $form_subtot."/".$tmpsubtot;
	if (number_format($form_subtot, 0, ".", "")!=number_format($tmpsubtot, 0, ".", "")){
		if (number_format($form_subtot, 2, ".", "")!=number_format($tmpsubtot, 2, ".", "")){
			exit("err1");
		}	
	}
	
	
	$form_disc=str_replace(",", "", $_GET["totdiscount"]);
	//echo $form_disc."/".$tot_dis_per;
	//echo number_format($form_disc, 2, ".", "")."/".number_format($tot_dis_per, 2, ".", "");
	if (number_format($form_disc, 0, ".", "")!=number_format($tot_dis_per, 0, ".", "")){
		if (number_format($form_disc, 2, ".", "")!=number_format($tot_dis_per, 2, ".", "")){
			exit("err2");
		}	
	}
	
	$form_tax=str_replace(",", "", $_GET["tax"]);
	//echo $form_tax."/".$vat_value;
	if (number_format($form_tax, 0, ".", "")!=number_format($vat_value, 0, ".", "")){
		if (number_format($form_tax, 2, ".", "")!=number_format($vat_value, 2, ".", "")){
			exit("err3");
		}	
	}
	
	$form_invtot=str_replace(",", "", $_GET["invtot"]);
	//echo $form_invtot."/".$grand_tot;
	//echo number_format($form_invtot, 2, ".", "")."/".number_format($grand_tot, 2, ".", "");
	if (number_format($form_invtot, 0, ".", "")!=number_format($grand_tot, 0, ".", "")){
		if (number_format($form_invtot, 2, ".", "")!=number_format($grand_tot, 2, ".", "")){
			exit("err4");
		}	
	}
	/*
			
	$form_subtot=str_replace(",", "", $_GET["subtot"]);
	
	if (number_format($form_subtot, 0, ".", "")!=number_format($tmpsubtot, 0, ".", "")){
		exit("err1");
	}
	
	
	$form_disc=str_replace(",", "", $_GET["totdiscount"]);
	if (number_format($form_disc, 0, ".", "")!=number_format($tot_dis_per, 0, ".", "")){
		exit("err2");
	}
	
	$form_tax=str_replace(",", "", $_GET["tax"]);
	if (number_format($form_tax, 0, ".", "")!=number_format($vat_value, 0, ".", "")){
		exit("err3");
	}
	
	$form_invtot=str_replace(",", "", $_GET["invtot"]);
	//echo $form_invtot."/".$grand_tot;
	if (number_format($form_invtot, 0, ".", "")!=number_format($grand_tot, 0, ".", "")){
		exit("err4");
	}
	
		*/

	if ($_SESSION["save_sales_inv"]==1){
		
		$_SESSION["brand"]="";
	
		$insuf_qty="";
		$sqltmp1="select * from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
		$resulttmp1=mysql_query($sqltmp1, $dbinv);
		if($rowtmp1 = mysql_fetch_array($resulttmp1)){
		} else {
			exit("Empty Items List. Cannot Save!!!");
		}
		$resulttmp1=mysql_query($sqltmp1, $dbinv);
		
		while($rowtmp1 = mysql_fetch_array($resulttmp1)){
			$sqlqty1="select QTYINHAND from s_submas where STK_NO='".$rowtmp1['str_code']."' AND STO_CODE='".$_GET["department"]."'";
			$resultqty1=mysql_query($sqlqty1, $dbinv);
	
			if($rowqty1 = mysql_fetch_array($resultqty1)){
			 	if ($rowqty1["QTYINHAND"]<$rowtmp1["cur_qty"]){
					
					$sqlqty2="select * from s_adtrn where REF_NO='".$_GET["salesord1"]."' AND STK_NO='".$rowtmp1['str_code']."'";
					$resultqty2=mysql_query($sqlqty2, $dbinv);
					if($rowqty2 = mysql_fetch_array($resultqty2)){				
					} else {	
						$insuf_qty=$rowtmp1['str_code'];
					}	
				}
			 }
		}	
		
		
		if ($insuf_qty==""){
		
			$ResponseXML .= "";
			$ResponseXML .= "<salesdetails>";
	
						
			
			
		
		
			
			
			$cre_balance=str_replace(",", "", $_GET["balance"]);
			$totdiscount=str_replace(",", "", $_GET["totdiscount"]);
			$subtot=str_replace(",", "", $_GET["subtot"]);
			$invtot=str_replace(",", "", $_GET["invtot"]);
		    $tax=str_replace(",", "", $_GET["tax"]);
			
			// Insert s_salma ============================================================ 
			
			$sql="select * from vendor where CODE = '".trim($_GET["customercode"])."'";
			$result=mysql_query($sql, $dbinv);
			if($row = mysql_fetch_array($result)){
				if ($row["blacklist"]=="1"){
					$sqlapp="select * from s_cusordmas where ref_no='".trim($_GET["salesord1"])."'";
					$resultapp=mysql_query($sqlapp, $dbinv);
					if($rowapp = mysql_fetch_array($resultapp)){
						if ($rowapp["approveby"]=="0") {
							exit("Invoice Facilitey Stoped for This Customer,Please Invoice For Approved Sales Order");
						} else {
							exit("Invoice Facilitey Stoped for This Customer,Please Invoice For Approved Sales Order");	
						}	
						$_SESSION["print"]=0;
					}
				}	
			}
			


///////////////////////////   Call checkcreditlimit
	
	$InvClass="";
	$sqlclass = "select class from brand_mas where barnd_name='".trim($_GET["brand"])."'";
	$result=mysql_query($sqlclass, $dbinv);
	if ($rowclass = mysql_fetch_array($result)){
		if (is_null($rowclass["class"])==false){
			$InvClass=$rowclass["class"];
		}
	}
	
	$sql_brtrn = "select * from br_trn where Rep='" . trim($_GET["salesrep"]) . "' and brand='" . trim($InvClass) . "' and cus_code='" . trim($_GET["customercode"]) . "'";
	//echo $sql_brtrn;
	$result_brtrn=mysql_query($sql_brtrn, $dbinv);
	$row_brtrn = mysql_fetch_array($result_brtrn);
	$cuscat=trim($row_brtrn["CAT"]);
	
			if (trim($_GET["customercode"]) != "") {
				if ($cuscat=="A"){
					if ($invtot>$cre_balance){
						$ResponseXML .= "<msg_crelimi><![CDATA[Credit Limit Exceed1]]></msg_crelimi>";
					} else {
						$ResponseXML .= "<msg_crelimi><![CDATA[no]]></msg_crelimi>";
					}
				}
				
				if ($cuscat=="B"){
					if ($invtot>$cre_balance){
						$ResponseXML .= "<msg_crelimi><![CDATA[Credit Limit Exceed2]]></msg_crelimi>";
					} else {
						$ResponseXML .= "<msg_crelimi><![CDATA[no]]></msg_crelimi>";
					}
				}
				
				if ($cuscat=="C"){
					if ($invtot>$cre_balance){
						$ResponseXML .= "<msg_crelimi><![CDATA[Credit Limit Exceed3]]></msg_crelimi>";
					} else {
						$ResponseXML .= "<msg_crelimi><![CDATA[no]]></msg_crelimi>";
					}
				}
				
				if ($cuscat=="D"){
					$ResponseXML .= "<msg_crelimi><![CDATA[Customer Deleted]]></msg_crelimi>";
				}
				
				if (($cuscat!="D") and ($cuscat!="A") and ($cuscat!="B") and ($cuscat!="C")){
					$ResponseXML .= "<msg_crelimi><![CDATA[Customer Catogory Not Entered]]></msg_crelimi>";
				}
			} else {
				$ResponseXML .= "<msg_crelimi><![CDATA[no]]></msg_crelimi>";
			}
			
	


			//============
			$vat="";
			if (($_GET["vatmethod"]=="vat") or ($_GET["vatmethod"]=="svat") or ($_GET["vatmethod"]=="evat")){
				$vat="1";
			} else {
				$vat="0";	
			}

		
	

    		$svat = 0;
			if ($_GET["vatmethod"]=="svat"){
				$svat=str_replace(",", "", $_GET["tax"]);
			}
			

	
	//================discount
  
	
			$d1=str_replace(",", "", $_GET["discount_org1"]);
			$d2=str_replace(",", "", $_GET["discount_org2"]);
			$d3=str_replace(",", "", $_GET["discount_org3"]);
	
			if ($d1==""){$d1=0;}
			if ($d2==""){$d2=0;}
			if ($d3==""){$d3=0;}
	
	
			$d = 100 - (100 - $d3) * (100 - $d2) * (100 - $d1)/ 100;
    //===============================================
	
			$cre_balance=str_replace(",", "", $_GET["balance"]);
			$totdiscount=str_replace(",", "", $_GET["totdiscount"]);
			$subtot=str_replace(",", "", $_GET["subtot"]);
			$invtot=str_replace(",", "", $_GET["invtot"]);
		    $tax=str_replace(",", "", $_GET["tax"]);
			
			$sql_invpara="SELECT * from invpara";
                        $result_invpara=mysql_query($sql_invpara, $dbinv);
			$row_invpara = mysql_fetch_array($result_invpara);
				
			$mvatrate=$row_invpara["vatrate"];
		
			$customername =str_replace("~", "&", $_GET["customername"]);  
			$cus_address =str_replace("~", "&", $_GET["cus_address"]);
		
			$sql_status=0;
			
			mysql_query("SET AUTOCOMMIT=0", $dbinv);
			mysql_query("START TRANSACTION", $dbinv);	 
			
			if ($_SESSION['company']=="THT"){	
			
			
				$sql="Select SPINV, CRE_INV_NO, CAS_INV_NO from invpara";
				$result=mysql_query($sql, $dbinv);
				$row = mysql_fetch_array($result);
				if ($_SESSION['dev']=="1"){
				 				
					$tmpinvno="000000".($row["SPINV"]+1);
					$lenth=strlen($tmpinvno);
			
					$invno=trim("CRI/ ").substr($tmpinvno, $lenth-6)."/5";
					$_SESSION["invno"]=$invno;
					$txtdono=$row["CAS_INV_NO"]+1;
				} else {
				
					$tmpinvno="000000".($row["SPINV"]+1);
					$lenth=strlen($tmpinvno);
			
					$invno=trim("CRI/ ").substr($tmpinvno, $lenth-6)."/".$_GET["salesrep"];
					$_SESSION["invno"]=$invno;
					$txtdono=$row["CRE_INV_NO"]+1;
			
				}
			
			} else 	 if ($_SESSION['company']=="BEN") {
			
			
				$sql="Select SPINV, SPINV1, CAS_INV_NO_m, CAS_INV_NO from invpara";
				$result=mysql_query($sql, $dbinv);
				$row = mysql_fetch_array($result);
			
				if ($_SESSION['dev']=="1"){
					$tmpinvno="000000".($row["SPINV1"]+1);
					$lenth=strlen($tmpinvno);
			
					$invno=trim("BEN/CR/ ").substr($tmpinvno, $lenth-6)."/2";
					$_SESSION["invno"]=$invno;
					$txtdono=$row["CAS_INV_NO_m"]+1;
   	
				} else {
					$tmpinvno="000000".($row["SPINV"]+1);
					$lenth=strlen($tmpinvno);
			
					$invno=trim("BEN/CR/ ").substr($tmpinvno, $lenth-6)."/".$_GET["salesrep"];
					$_SESSION["invno"]=$invno;
					$txtdono=$row["CAS_INV_NO"]+1;
  
				}
			}
			
			
			$sqlisalma_q="select REF_NO from s_salma where REF_NO='".$invno."'";
			$resultsalma_q=mysql_query($sqlisalma_q, $dbinv);
			if ($rowsalma_q = mysql_fetch_array($resultsalma_q)){
				exit("Invoice No Already Exist !!!");
			}
			
			
	
			if ($_SESSION['dev']=="1"){
       			$sqlisalma="Update invpara  set SPINV1=SPINV1+1";
				$resultsalma=mysql_query($sqlisalma, $dbinv);
	   			if ($resultsalma!=1){ $sql_status=1; }
			}
			
			if ($_SESSION['dev']=="0"){
       			$sqlisalma="Update invpara  set SPINV=SPINV+1";
				$resultsalma=mysql_query($sqlisalma, $dbinv);
	   			if ($resultsalma!=1){ $sql_status=1; }
			}	
			
			if ($sql_status==0){
				mysql_query("COMMIT", $dbinv);
			}	else {
				mysql_query("ROLLBACK", $dbinv);
			}
			
			$sql_status=0;
			
			mysql_query("SET AUTOCOMMIT=0", $dbinv);
			mysql_query("START TRANSACTION", $dbinv);
				 
			$sqlisalma="Insert into s_salma  (REF_NO, TRN_TYPE, SDATE, C_CODE, Brand, CUS_NAME, VAT, VAT_VAL, TYPE, DISCOU, AMOUNT, GRAND_TOT,  TOTPAY, ORD_NO, ORD_DA,  DEPARTMENT, SAL_EX, BTT, cre_pe, GST, DIS, DIS1, DIS2, SVAT, Account, TOTPAY1, REMARK, REQ_DATE, CANCELL, DEV, tmp_no, DIS_RUP, CASH, SETTLED, DES_CAT, Accname, Costcenter, RET_AMO, Comm, red, seri_no, points, LOCK1, deliin, vat_no, s_vat_no, C_ADD1) values('".$invno."', 'INV', '".$_GET["invdate"]."', '".trim($_GET["customercode"])."', '".trim($_GET["brand"])."', '".trim($customername)."','".$vat."', ".$tax.", '".$_GET["paymethod"]."',".$totdiscount.", ".$subtot." , ".$invtot.", 0, '".trim($_GET["salesord1"])."', '".$_GET["deldate"]."', '".trim($_GET["department"])."', '".trim($_GET["salesrep"])."', ".$tax.", ".$_GET["credper"]." , ".$mvatrate.", ".$d1.", ".$d2.", ".$d3.", '".$svat."', 'NOTAUTH', '0',  '".$invno."', '".$_GET["deldate"]."', '0', '".$_SESSION['dev']."', '".$_SESSION["tmp_no_salinv"]."', 0, 0, '0', 'N', 'OFFICE', '', 0, 'N', '0', '', '0', '0', '', '".trim($_GET["vat1"])."', '".trim($_GET["vat2"])."', '".$cus_address."')";
		//echo $sqlisalma;
			$resultsalma=mysql_query($sqlisalma, $dbinv);
			if ($resultsalma==false){ $sql_status=1; }
	 		
			$sql1="insert into s_sttr_all(ST_REFNO, ST_DATE, ST_INVONO, ST_PAID, netamount, ST_CHNO, st_chdate, ST_FLAG, st_days, ap_days, st_chbank, cus_code, cusname, sal_ex, DEV, del_days, deliin_days, deliin_amo, deliin_lock, department, form_type, trn_type) values
	  ('".$invno."', '".$_GET["invdate"]."', '".$invno."', ".$invtot.", ".$invtot.", '', '', '', '', '', '', '".trim($_GET["customercode"])."', '".$_GET["customername"]."', '".$_GET["salesrep"]."', '".$_SESSION['dev']."', 0, 0, 0, '0', '".trim($_GET["department"])."', 'INV', 'OUT')";
	//  echo $sql1;
	  		$result1=mysql_query($sql1, $dbinv);
			if ($result1!=1){ $sql_status=2; }
			
	   
	   //==============Update credit limit==========================================
    
			//$sqlisalma="update vendor set CUR_BAL= CUR_BAL+".$invtot." where CODE='".trim($_GET["customercode"])."'";
			//$resultsalma=mysql_query($sqlisalma, $dbinv);
   		 	//if ($resultsalma!=1){ $sql_status=1; }
			
			$sql_invpara="SELECT * from invpara";
            $result_invpara=mysql_query($sql_invpara, $dbinv);
			$row_invpara = mysql_fetch_array($result_invpara);
				
			
			//$sqlisalma="update br_trn set credit= credit+".$invtot." where cus_code='".trim($_GET["customercode"])."'";
    		//$resultsalma=mysql_query($sqlisalma, $dbinv);

    		$sqltmp="select * from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			//echo $sqltmp;
			$resulttmp=mysql_query($sqltmp, $dbinv);
			while($rowtmp = mysql_fetch_array($resulttmp)){
				$dis_per = $rowtmp["cur_rate"]*$rowtmp["cur_qty"]*$rowtmp["dis_per"]*0.01;
		
				$sqlmas="select * from s_mas where STK_NO='".trim($rowtmp["str_code"])."'";
				$resultmas=mysql_query($sqlmas, $dbinv);
				$rowmas = mysql_fetch_array($resultmas);
	
				$sql_invo="Insert into s_invo  (REF_NO, SDATE, STK_NO, DESCRIPT, PART_NO, COST, PRICE, QTY, DEPARTMENT, DIS_per, DIS_rs, REP, TAX_PER, BRAND, vatrate, Print_dis1, Print_dis2, Print_dis3, subtot, ret_qty, DEV, CANCELL, c_code, seri_no, ad) values ('".$invno."', '".$_GET["invdate"]."', '".trim($rowtmp["str_code"])."', '".trim($rowtmp["str_description"])."', '".$rowmas["PART_NO"]."', ".$rowmas["COST"].", ".$rowtmp["actual_selling"].", ".$rowtmp["cur_qty"].", '".$department."', '".$rowtmp["dis_per"]."', ".$dis_per.", '".$_GET["salesrep"]."', '".$row_invpara["vatrate"]."', '".$_GET["brand"]."', ".$mvatrate.", ".$d1.", ".$d2.", ".$d3.", ".$rowtmp["cur_subtot"].", '0', '', '0', '', '', '".$rowtmp["ad"]."')";
		//echo $sql_invo;
				$result_invo=mysql_query($sql_invo, $dbinv);
				if ($result_invo!=1){ $sql_status=3; }
				
		
			 // if ($_GET["txtad"]!="AD"){
			  
				$sqls_trn="Insert into s_trn (STK_NO, SDATE, REFNO, QTY, LEDINDI, DEPARTMENT, Dev, seri_no, SAL_EX, ACTIVE, DONO) values('".trim($rowtmp["str_code"])."','".$_GET["invdate"]."','".trim($invno)."', ".$rowtmp["cur_qty"].", 'INV', '".trim($_GET["department"])."', '".$_SESSION['dev']."', '', '', '1', '')";
				$results_trn=mysql_query($sqls_trn, $dbinv);
				if ($results_trn!=1){ $sql_status=4; }
				
				
				$sqls_trn="Insert into s_trn_all (STK_NO, SDATE, REFNO, QTY, LEDINDI, DEPARTMENT, Dev, seri_no, SAL_EX, ACTIVE, DONO, cuscode, cusname, brand) values('".trim($rowtmp["str_code"])."','".$_GET["invdate"]."','".trim($invno)."', ".(-1*$rowtmp["cur_qty"]).", 'INV', '".trim($_GET["department"])."', '".$_SESSION['dev']."', '', '".trim($_GET["salesrep"])."', '1', '', '".trim($_GET["customercode"])."', '".trim($customername)."', '".$_GET["brand"]."')";
				//echo $sqls_trn;
				$results_trn=mysql_query($sqls_trn, $dbinv);
				if ($results_trn!=1){ $sql_status=5; }
				
						
				$sqls_mas="update s_mas set QTYINHAND= QTYINHAND-".$rowtmp["cur_qty"]." where STK_NO='".trim($rowtmp["str_code"])."'";
				$results_mas=mysql_query($sqls_mas, $dbinv);
				if ($results_mas!=1){ $sql_status=6; }
				
		
		// Call upsales(dtdate, Val(MSFlexGrid1.TextMatrix(i, 3)), Trim(MSFlexGrid1.TextMatrix(i, 0)))
        //m_STK_NO = Trim(MSFlexGrid1.TextMatrix(i, 0))
        //M_STOCODE = Trim(Mid(Me.com_dep, 1, 5))
    	
				$sqls_submas="update s_submas set QTYINHAND=QTYINHAND- ".$rowtmp["cur_qty"]." where STK_NO= '".trim($rowtmp["str_code"])."' and STO_CODE= '".trim($_GET["department"])."'";
				//echo $sqls_submas;
				$results_submas=mysql_query($sqls_submas, $dbinv);
				if ($results_submas!=1){ $sql_status=7; }
				
				$sqls_submas="update s_submas_ad set QTYINHAND=QTYINHAND- ".$rowtmp["cur_qty"]." where STK_NO= '".trim($rowtmp["str_code"])."' and STO_CODE= '".trim($_GET["department"])."'";
				//echo $sqls_submas;
				$results_submas=mysql_query($sqls_submas, $dbinv);
				if ($results_submas!=1){ $sql_status=8; }
     			
			  }
  			//}
	 
	
			$sqlpara="delete from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			$resultpara=mysql_query($sqlpara, $dbinv);
			if ($resultpara!=1){ $sql_status=9; }
			 
			$sqls_submas="Insert into s_led(REF_NO, SDATE, C_CODE, AMOUNT, FLAG, DEPARTMENT) values('".trim($invno)."', '".$_GET["invdate"]."', '".trim($_GET["customercode"])."', ".$invtot.", 'INV', '".$_GET["department"]."')";
			$results_submas=mysql_query($sqls_submas, $dbinv);
			if ($results_submas!=1){ $sql_status=10; }
		
			if ($_SESSION['dev']=="1"){
				$sqlpara="update invpara set CAS_INV_NO=CAS_INV_NO+1";
				$resultpara=mysql_query($sqlpara, $dbinv);
				if ($resultpara!=1){ $sql_status=11; }
			} 
		
			if ($_SESSION['dev']=="0"){
				$sqlpara="update invpara set CRE_INV_NO=CRE_INV_NO+1";
				$resultpara=mysql_query($sqlpara, $dbinv);
				if ($resultpara!=1){ $sql_status=12; }
			}
		
			$sqlpara="update vendor set temp_limit= '0'  where CODE='".trim($_GET["customercode"])."'";
			$resultpara=mysql_query($sqlpara, $dbinv);
			if ($resultpara!=1){ $sql_status=13; }
			
		
			$sqlbrand="select * from brand_mas where barnd_name='".trim($_GET["brand"])."'";
			$resultbrand=mysql_query($sqlbrand, $dbinv);
			//if ($resultbrand!=1){ $sql_status=14; }
			
			if($rowbrand = mysql_fetch_array($resultbrand)){
				$sqlbr_trn="update br_trn set tmplmt= '0'   where cus_code='".trim($_GET["customercode"])."' and brand='".trim($rowbrand["class"])."' and Rep='".trim($_GET["salesrep"])."'";
				
				$resultbr_trn=mysql_query($sqlbr_trn, $dbinv);
				if ($resultbr_trn!=1){ $sql_status=15; }
			}
		

			$sqlbr_trn="update s_cusordmas set INVNO= '".$invno."' where  REF_NO='".$_GET["ordno"]."'";
			$resultbr_trn=mysql_query($sqlbr_trn, $dbinv);	
			if ($resultbr_trn!=1){ $sql_status=16; }
			
			$sqlbr_trn="update s_admas set INVNO= '".$invno."' where  REF_NO='".$_GET["ordno"]."'";
			$resultbr_trn=mysql_query($sqlbr_trn, $dbinv);
			if ($resultbr_trn!=1){ $sql_status=17; }
			
			$sqlbrand="insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('".trim($invno)."', '".$_SESSION["CURRENT_USER"]."', 'Invoice', 'Save', '".date("Y-m-d H:i:s")."', '".date("Y-m-d")."')";
			$resultbrand=mysql_query($sqlbrand, $dbinv);
			if ($resultbrand!=1){ $sql_status=18; }
			
			if ($sql_status==0){
				mysql_query("COMMIT", $dbinv);
			}	else {
				mysql_query("ROLLBACK", $dbinv);
			}
			
	/////////////////////////////////////////////////////////////////////////
    
  
			$_SESSION["print"]=1;
			$_SESSION["save_sales_inv"]=0;
			if ($sql_status==0){
				$ResponseXML .= "<Saved><![CDATA[Saved]]></Saved>";
			} else {
				echo $sql_status;
				$ResponseXML .= "<Saved><![CDATA[no]]></Saved>";
			}	
			$ResponseXML .= "<invno><![CDATA[".$invno."]]></invno>";
			$ResponseXML .= "<company><![CDATA[".$_SESSION['company']."]]></company>";
			
			//echo "Saved";
			
		} else {
			$ResponseXML .= "";
			$ResponseXML .= "<salesdetails>";
			$ResponseXML .= "<Saved><![CDATA[insuficent]]></Saved>";
			$ResponseXML .= "<msg_crelimi><![CDATA[no]]></msg_crelimi>";
			
			//echo "insuficent";
		}	
	} else {
		$ResponseXML .= "";
		$ResponseXML .= "<salesdetails>";
		$ResponseXML .= "<msg_crelimi><![CDATA[no]]></msg_crelimi>";
		$ResponseXML .= "<Saved><![CDATA[no]]></Saved>";
		
		//echo "no";
	}	
	
	
	$ResponseXML .= " </salesdetails>";
	echo $ResponseXML;
}
	
if ($_GET["Command"]=="check_print")
{
	
	echo $_SESSION["print"];
}

	
if($_GET["Command"]=="tmp_crelimit")
{	
	echo "abc";
	$crLmt = 0;
	$cat = "";
	
	$rep=trim(substr($_GET["Com_rep1"], 0, 5));
	
	$sql = "select * from br_trn where rep='".$rep."' and cus_code='".trim($_GET["txt_cuscode"])."' and brand='".trim($_GET["cmbbrand1"])."'";
	echo $sql;
	$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
    if ($row = mysql_fetch_array($result)) {
		$crLmt = $row["credit_lim"];
   		If (is_null($row["cat"])==false) {
      		$cat = trim($row["cat"]);
   		} else {
      		$crLmt = 0;
		}	
   	}
/*	
$_SESSION["CURRENT_DOC"] = 66     //document ID
//$_SESSION["VIEW_DOC"] = true      //  view current document
 $_SESSION["FEED_DOC"] = true      //  save  current document
//$_SESSION["MOD_DOC"] = true       //   delete   current document
//$_SESSION["PRINT_DOC"] = true     // get additional print   of  current document
//$_SESSION["PRICE_EDIT"]= true     // edit selling price
$_SESSION["CHECK_USER"] = true    // check user permission again
$crLmt = $crLmt;
setlocale(LC_MONETARY, "en_US");
$CrTmpLmt = number_format($_GET["txt_tmeplimit"], 2, ".", ",");

$REFNO = trim($_GET["txt_cuscode"]) ;

$AUTH_USER="tmpuser";

$sql = "insert into tmpCrLmt (sdate, stime, username, tmpLmt, class, rep, cuscode, crLmt, cat) values 
        ('".date("Y-m-d")."','".date("H:i:s", time())."' ,'".$AUTH_USER."',".$CrTmpLmt." ,'".trim($_GET["cmbbrand1"])."','".$rep."','".trim($_GET["txt_cuscode"])."',".$crLmt.",'".$cat"' )";
$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 

$sql = "select * from  br_trn where cus_code='".trim($_GET["txt_cuscode"])."' and rep='".$rep."' and brand='".$_GET["cmbbrand1"]."'";
$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
if ($row = mysql_fetch_array($result)) {
   $sqlbrtrn= "insert into br_trn (cus_code, rep, credit_lim, brand, tmplmt) values ('".trim($_GET["txt_cuscode"])."','".$rep."','0','".trim($_GET["cmbbrand1"])."',".$CrTmpLmt." )";
   $resultbrtrn =$db->RunQuery($sqlbrtrn);
   
} else {
  
  	$sqlbrtrn= "update br_trn set tmplmt= ".$CrTmpLmt."  where cus_code='".trim($_GET["txt_cuscode"])."' and rep='".$rep."' and brand='".$_GET["cmbbrand1"]."' ";
 	$resultbrtrn =$db->RunQuery($sqlbrtrn);
	
//	$sqlbrtrn= "update vendor set temp_limit= ".$CrTmpLmt."  where code='".trim($_GET["txt_cuscode"])."' "
}

	If ($_GET["Check1"] == 1) {
   		$sqlblack= "update vendor set blacklist= '1'  where code='".trim($_GET["txt_cuscode"])."' ";
		$resultblack =$db->RunQuery($sqlblack);
	} else {	
    	$sqlblack= "update vendor set blacklist= '0'  where code='".trim($_GET["txt_cuscode"])."' ";
		$resultblack =$db->RunQuery($sqlblack);
	}

echo "Tempory limit updated";*/

}
	
?>