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
		   
		   if ($_SESSION["dev"]!=""){
			
			$_SESSION["print"]=0;
			$_SESSION["save_sales_inv"]=1;
		/*	$sql="Select CAS_INV_NO_m from invpara";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			$row = mysql_fetch_array($result);
			$tmpinvno="000000".$row["CAS_INV_NO_m"];
			$lenth=strlen($tmpinvno);
			$invno="INV".substr($tmpinvno, $lenth-7);
			echo $invno;*/
			
		/*	$sql="Select SPINV, CRE_INV_NO, CAS_INV_NO from invpara";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			$row = mysql_fetch_array($result);
			$tmpinvno="000000".$row["CAS_INV_NO_m"];
			$lenth=strlen($tmpinvno);
			//echo $tmpinvno;
			$invno=trim("CRI/ ").substr($tmpinvno, $lenth-7);
			$_SESSION["invno"]=$invno;*/
			
			$_SESSION["brand"]="";
			
		  if ($_SESSION['company']=="THT"){	
			$sql="Select SPINV from tmpinvpara";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			$row = mysql_fetch_array($result);
			$_SESSION["tmp_no_salinv"]="CRI/".$row["SPINV"];
			//echo $_SESSION["tmp_no_salinv"];
			$sql="delete from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			$sql="update tmpinvpara set SPINV=SPINV+1";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			
			
			
			
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
			$_SESSION["tmp_no_salinv"]="CRI/".$row["SPINV"];
			//echo $_SESSION["tmp_no_salinv"];
			$sql="delete from tmp_inv_data where tmp_no='".$_SESSION["tmp_no_salinv"]."'";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			$sql="update tmpinvpara set SPINV=SPINV+1";
			$result =mysqli_query($GLOBALS['dbinv'],$sql) ; 
			
			
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
			header('Content-Type: text/xml'); 
			echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
			
			$ResponseXML = "";
			$ResponseXML .= "<salesdetails>";
			
			$ResponseXML .= "<invno><![CDATA[".$invno."]]></invno>";
			$ResponseXML .= "<txtdono><![CDATA[".$txtdono."]]></txtdono>";
			$ResponseXML .= "<sdate><![CDATA[".date("Y-m-d")."]]></sdate>";
			$ResponseXML .= "<chq_validity><![CDATA[yes]]></chq_validity>";
			
			$ResponseXML .= "</salesdetails>";
			echo $ResponseXML;	
		  } else {
		  	$ResponseXML = "<salesdetails>";
			
			$ResponseXML .= "<chq_validity><![CDATA[no]]></chq_validity>";
			
			$ResponseXML .= "</salesdetails>";
			echo $ResponseXML;	
		  }
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
			echo $sql_per;
			$result_per=mysql_query($sql_per, $dbinv);
		}	
	}
}		

if($_GET["Command"]=="assn_med_entry")
{
	
	include('connection.php');
	
	$ResponseXML .= "";
	$ResponseXML .= "<salesdetails>";
	
	//$ResponseXML .= "<txtBL_PRES><![CDATA[MMHG]]></txtBL_PRES>";		
	$ResponseXML .= "<txtDREFNO><![CDATA[".trim($_GET["txtDREFNO"])."]]></txtDREFNO>";		
	
	$sql_rege = "Select * from rege where DREFNO='" . trim($_GET["txtDREFNO"]) . "'";
	
	$result_rege=mysql_query($sql_rege, $dbinv);
	if($row_rege = mysql_fetch_array($result_rege)){
		if (is_null($row_rege["SERI_NO"])==false) { $txtSERINO = $row_rege["SERI_NO"]; }
		if (is_null($row_rege["PA_NO"])==false) { $txtPAS_NO = $row_rege["PA_NO"]; }
		if (is_null($row_rege["CMB_NO"])==false) { $txtCMB_NO = $row_rege["CMB_NO"]; }
		if (is_null($row_rege["SDATE"])==false) { $txtDATE = $row_rege["SDATE"]; }
		if (is_null($row_rege["NAME"])==false) { $txtName = $row_rege["NAME"]; }
		if (is_null($row_rege["Lastname"])==false) { $txtLASTNAME = $row_rege["Lastname"]; }
		if (is_null($row_rege["initial"])==false) { $txtini = $row_rege["initial"]; }
		if (is_null($row_rege["CODE"])==false) { $txtCODE = $row_rege["CODE"]; }
		if (is_null($row_rege["GCC_NO"])==false) { $txtGCC_NO = $row_rege["GCC_NO"]; }
		if (is_null($row_rege["POS_APP"])==false) { $txtPOS_APP = $row_rege["POS_APP"]; }
		if (is_null($row_rege["cusadd"])==false) { $lbladd = $row_rege["cusadd"]; }
		if (is_null($row_rege["SEX"])==false) { $txtSEX = $row_rege["SEX"]; }
		if ($row_rege["SEX"]=="MALE"){ $txtPREG_TEST = "2"; }
		if (is_null($row_rege["AGE_Y"])==false) { $txtAGE = $row_rege["AGE_Y"]; }
		if (is_null($row_rege["status"])==false) { $txtSTATUS = $row_rege["status"]; }
		if (is_null($row_rege["NATIONL"])==false) { $txtNATIONL = $row_rege["NATIONL"]; }
		if (is_null($row_rege["XRAYNO"])==false) { $txtCH_XRA_NO = $row_rege["XRAYNO"]; }
		
		
 		if (is_null($row_rege["COUNTRY"])==false) {
 			
			$sql_cn = "select * from country where CODE='" . trim($row_rege["COUNTRY"]) . "'";
			$result_cn=mysql_query($sql_cn, $dbinv);
			if($row_cn = mysql_fetch_array($result_cn)){
				if (is_null($row_cn["Head"])==false) { $ResponseXML .= "<cmbhead><![CDATA[".$row_rege["Head"]."]]></cmbhead>"; }
           	}
  		} else {
			$ResponseXML .= "<cmbhead><![CDATA[OTHER]]></cmbhead>";
  		}
		
		if (is_null($row_rege["PA_NO"])==false) {  }
		$txtPLA_OF_IS = "COLOMBO"; 
		if (is_null($row_rege["AGNAME"])==false) { 
			$txtREC_AG = $row_rege["AGNAME"];
			
		}
		
		

   	/*	rsp.Open "select * from phtooo where drefno = '" & Trim(rsrege!Drefno) & "'", DN.CON1
   		If Not rsp.EOF Then
   			If Not IsNull(rsp!pic) Then
        		Kill app.Path & "\*.jpg"
        		Set mstream = New ADODB.Stream
        		mstream.Type = adTypeBinary
        		mstream.Open
        		mstream.Write = rsp.Fields("pic").Value
        		mstream.SaveToFile (app.Path & "\0Preview.jpg")
        		Picture1.Picture = LoadPicture(app.Path & "\0Preview.jpg")
       			' Path = app.Path & "\0Preview.jpg"
        		mstream.Close
    		Else
        		Set Picture1.Picture = Nothing
    		End If
    	End If
    
lblerrr:
If Err Then
MsgBox Err.Description*/
	}
		
 
 	$sql_cn = "Select * from emas where CODE = '" . $row_rege["CODE"] . "'";
	$result_cn=mysql_query($sql_cn, $dbinv);
	if($row_cn = mysql_fetch_array($result_cn)){
 		$ResponseXML .= "<txtlil><![CDATA[".trim($row_rege["LABLI"])."]]></txtlil>";
 	}

 
		 $ResponseXML .= "<txtPAS_NO><![CDATA[".$row_rege["PA_NO"]."]]></txtPAS_NO>";
 	$sql_strsqlstr = "Select * from sumedi where DREFNO='" . trim($_GET["txtDREFNO"]) . "'";
	//echo $sql_strsqlstr;
	$result_strsqlstr=mysql_query($sql_strsqlstr, $dbinv);
	if($row_rege = mysql_fetch_array($result_strsqlstr)){
		
		if (is_null($row_rege["PAS_NO"])==false) { $txtPAS_NO = $row_rege["PAS_NO"]; }
		if (is_null($row_rege["SERINO"])==false) { $txtSERINO = $row_rege["SERINO"]; }
		if (is_null($row_rege["CMB_NO"])==false) { $txtCMB_NO = $row_rege["CMB_NO"]; }
		if (is_null($row_rege["CODE"])==false) { $txtCODE = $row_rege["CODE"]; }
		if (is_null($row_rege["ADDRESS"])==false) { $lbladd = $row_rege["ADDRESS"]; }
		if (is_null($row_rege["SEX"])==false) { $txtSEX = $row_rege["SEX"]; }
		if (is_null($row_rege["AGE"])==false) { $txtAGE = $row_rege["AGE"]; }
		if (is_null($row_rege["STATUS"])==false) { $txtSTATUS = $row_rege["STATUS"]; }
		if (is_null($row_rege["REC_AG"])==false) { $txtREC_AG = $row_rege["REC_AG"]; }
		
		if (is_null($row_rege["NAME"])==false) { $txtName = $row_rege["NAME"]; }
		if (is_null($row_rege["LASTNAME"])==false) { $txtLASTNAME = $row_rege["LASTNAME"]; }
		if (is_null($row_rege["sDATE"])==false) { $txtDATE = $row_rege["sDATE"]; }
		if (is_null($row_rege["DO_ACC_NO"])==false) { $txtDO_ACC_NO = $row_rege["DO_ACC_NO"]; }
		if (is_null($row_rege["M"])==false) { $txtM = $row_rege["M"]; }
		if (is_null($row_rege["HI_FT"])==false) { $txtHI_FT = number_format($row_rege["HI_FT"], 0, "", "") ; }
		if (is_null($row_rege["hi_in"])==false) { $txtHI_in = number_format($row_rege["hi_in"], 0, "", ""); }
		if (is_null($row_rege["WE"])==false) { $txtWE = $row_rege["WE"]; }
		if (is_null($row_rege["PLA_OF_IS"])==false) { $txtPLA_OF_IS = $row_rege["PLA_OF_IS"]; }
		if (is_null($row_rege["POS_APP"])==false) { $txtPOS_APP = $row_rege["POS_APP"]; }
		if (is_null($row_rege["P_N_D_RE"])==false) { $txtP_N_D_RE = $row_rege["P_N_D_RE"]; }
		if (is_null($row_rege["ALLERGY_RE"])==false) { $txtALLERGY_RE = $row_rege["ALLERGY_RE"]; }
		if (is_null($row_rege["OTHERS_RE"])==false) { $txtOTHERS_RE = $row_rege["OTHERS_RE"]; }
		if (is_null($row_rege["EYE_VISON"])==false) { $txtEYE_VISON = $row_rege["EYE_VISON"]; }
		if (is_null($row_rege["EYE_NE_R"])==false) { $txtEYE_NE_R = $row_rege["EYE_NE_R"]; }
		if (is_null($row_rege["EYE_NE_L"])==false) { $txtEYE_NE_L = $row_rege["EYE_NE_L"]; }
		if (is_null($row_rege["EYE_NE_RE"])==false) { $txtEYE_NE_RE = $row_rege["EYE_NE_RE"]; }
		if (is_null($row_rege["EYE_FA_R"])==false) { $txtEYE_FA_R = $row_rege["EYE_FA_R"]; }
		if (is_null($row_rege["EYE_FA_L"])==false) { $txtEYE_FA_L = $row_rege["EYE_FA_L"]; }
		if (is_null($row_rege["EYE_FA_RE"])==false) { $txtEYE_FA_RE = $row_rege["EYE_FA_RE"]; }
		if (is_null($row_rege["EYE_CO"])==false) { $txtEYE_CO = $row_rege["EYE_CO"]; }
		if (is_null($row_rege["EYE_CO_R"])==false) { $txtEYE_CO_R = $row_rege["EYE_CO_R"]; }
		if (is_null($row_rege["EYE_CO_L"])==false) { $txtEYE_CO_L = $row_rege["EYE_CO_L"]; }
		if (is_null($row_rege["YEAR_R"])==false) { $txtYEAR_R = $row_rege["YEAR_R"]; }
		if (is_null($row_rege["YEAR_L"])==false) { $txtYEAR_L = $row_rege["YEAR_L"]; }
		if (is_null($row_rege["YEAR_RRE"])==false) { $txtYEAR_RRE = $row_rege["YEAR_RRE"]; }
		if (is_null($row_rege["YEAR_LRE"])==false) { $txtYEAR_LRE = $row_rege["YEAR_LRE"]; }
		if (is_null($row_rege["CH_XRA_NO"])==false) { $txtCH_XRA_NO = $row_rege["CH_XRA_NO"]; }
		if (is_null($row_rege["CH_XRA_RE"])==false) { $txtCH_XRA_RE = $row_rege["CH_XRA_RE"]; }
		if (is_null($row_rege["LORD_NO"])==false) { $txtLORD_NO = $row_rege["LORD_NO"]; }
		if (is_null($row_rege["LORD_RE"])==false) { $txtLORD_RE = $row_rege["LORD_RE"]; }
		if (is_null($row_rege["BL_PRES"])==false) { $txtBL_PRES = $row_rege["BL_PRES"]; }
		if (is_null($row_rege["BL_PR_RE"])==false) { $txtBL_PR_RE = $row_rege["BL_PR_RE"]; }
		if (is_null($row_rege["HEAR_RE"])==false) { $txtHEAR_RE = $row_rege["HEAR_RE"]; }
		if (is_null($row_rege["LUN_RE"])==false) { $txtLUN_RE = $row_rege["LUN_RE"]; }
		if (is_null($row_rege["ABD_RE"])==false) { $txtABD_RE = $row_rege["ABD_RE"]; }
		if (is_null($row_rege["HER_RE"])==false) { $txtHER_RE = $row_rege["HER_RE"]; }
		if (is_null($row_rege["VARI_RE"])==false) { $txtVARI_RE = $row_rege["VARI_RE"]; }
		if (is_null($row_rege["EXTR_RE"])==false) { $txtEXTR_RE = $row_rege["EXTR_RE"]; }
		if (is_null($row_rege["SKIN_RE"])==false) { $txtSKIN_RE = $row_rege["SKIN_RE"]; }
		if (is_null($row_rege["CLINICAL"])==false) { $txtCLINICAL = $row_rege["CLINICAL"]; }
		if (is_null($row_rege["LAB_RE"])==false) { $txtLAB_RE = $row_rege["LAB_RE"]; }
		if (is_null($row_rege["VDRL_RE"])==false) { $txtVDRL_RE = $row_rege["VDRL_RE"]; }
		if (is_null($row_rege["TPHA_RE"])==false) { $txtTPHA_RE = $row_rege["TPHA_RE"]; }
		if (is_null($row_rege["CNS_RE"])==false) { $txtcns_re = $row_rege["CNS_RE"]; }
		if (is_null($row_rege["PSYCHIATRY_RE"])==false) { $txtPSYCHIATRY_re = $row_rege["PSYCHIATRY_RE"]; }
		if (is_null($row_rege["GIARDIA_re"])==false) { $txtGIARDIA_re = $row_rege["GIARDIA_re"]; }
		if (is_null($row_rege["MICROFILARIA_re"])==false) { $txtMICROFILARIA_re = $row_rege["MICROFILARIA_re"]; }
		if (is_null($row_rege["QUA_EL_HIV"])==false) { $txtQUA_EL_HIV = $row_rege["QUA_EL_HIV"]; }
		if (is_null($row_rege["SUG_RE"])==false) { $txtSUG_RE = $row_rege["SUG_RE"]; }
		if (is_null($row_rege["ALB_RE"])==false) { $txtALB_RE = $row_rege["ALB_RE"]; }
		if (is_null($row_rege["BIL_RE"])==false) { $txtBIL_RE = $row_rege["BIL_RE"]; }
		if (is_null($row_rege["OTH_RE"])==false) { $txtOTH_RE = $row_rege["OTH_RE"]; }
		if (is_null($row_rege["HEL_RE"])==false) { $txtHEL_RE = $row_rege["HEL_RE"]; }
		if (is_null($row_rege["S_BIL_RE"])==false) { $txtS_BIL_RE = $row_rege["S_BIL_RE"]; }
		if (is_null($row_rege["SAL_RE"])==false) { $txtSAL_RE = $row_rege["SAL_RE"]; }
		if (is_null($row_rege["V_CH_RE"])==false) { $txtV_CH_RE = $row_rege["V_CH_RE"]; }
		if (is_null($row_rege["OTHER0"])==false) { $txtOTHER0 = $row_rege["OTHER0"]; }
		if (is_null($row_rege["AOC"])==false) { $txtAOC = $row_rege["AOC"]; }
		if (is_null($row_rege["HEM"])==false) { $txtHEM = $row_rege["HEM"]; }
		if (is_null($row_rege["HEM_RE"])==false) { $txtHEM_RE = $row_rege["HEM_RE"]; }
		if (is_null($row_rege["MAL"])==false) { $txtMAL = $row_rege["MAL"]; }
		if (is_null($row_rege["MAL_RE"])==false) { $txtMAL_RE = $row_rege["MAL_RE"]; }
		if (is_null($row_rege["B_GROUP"])==false) { $txtbg = $row_rege["B_GROUP"]; }
		if (is_null($row_rege["B_GROUP_RE"])==false) { $txtbg_RE = $row_rege["B_GROUP_RE"]; }
		if (is_null($row_rege["ABD"])==false) { $txtABD = $row_rege["ABD"]; }
		if (is_null($row_rege["SERO_RE"])==false) { $txtSERO_RE = $row_rege["SERO_RE"]; }
		if (is_null($row_rege["HIV_RE"])==false) { $txtHIV_RE = $row_rege["HIV_RE"]; }
		if (is_null($row_rege["F_B_S"])==false) { $txtF_B_S = $row_rege["F_B_S"]; }
		if (is_null($row_rege["F_B_S_RE"])==false) { $txtF_B_S_RE = $row_rege["F_B_S_RE"]; }
		if (is_null($row_rege["HBSA"])==false) { $txtHBSA = $row_rege["HBSA"]; }
		if (is_null($row_rege["HBSA_RE"])==false) { $txtHBSA_RE = $row_rege["HBSA_RE"]; }
		if (is_null($row_rege["ANTI"])==false) { $txtANTI = $row_rege["ANTI"]; }
		if (is_null($row_rege["ANTI_RE"])==false) { $txtANTI_RE = $row_rege["ANTI_RE"]; }
		if (is_null($row_rege["ALP"])==false) { $txtALP = $row_rege["ALP"]; }
		if (is_null($row_rege["BILI"])==false) { $txtBILI = $row_rege["BILI"]; }
		if (is_null($row_rege["SGPT"])==false) { $txtSGPT = $row_rege["SGPT"]; }
		if (is_null($row_rege["L_F_T"])==false) { $txtL_F_T = $row_rege["L_F_T"]; }
		if (is_null($row_rege["L_F_T_RE"])==false) { $txtL_F_T_RE = $row_rege["L_F_T_RE"]; }
		if (is_null($row_rege["CREA"])==false) { $txtCREA = $row_rege["CREA"]; }
		if (is_null($row_rege["CREA_RE"])==false) { $txtCREA_RE = $row_rege["CREA_RE"]; }
		if (is_null($row_rege["UREA"])==false) { $txtUREA = $row_rege["UREA"]; }
		if (is_null($row_rege["UREA_RE"])==false) { $txtUREA_RE = $row_rege["UREA_RE"]; }
		if (is_null($row_rege["PREG_TEST"])==false) { $txtPREG_TEST = $row_rege["PREG_TEST"]; }
		if (is_null($row_rege["PRE_NOT_RE"])==false) { $txtpRE_NOT_RE = $row_rege["PRE_NOT_RE"]; }
		if (is_null($row_rege["PRE_NOT_DO"])==false) { $txtPRE_NOT_DO = $row_rege["PRE_NOT_DO"]; }
		if (is_null($row_rege["PRE_RECO"])==false) { $txtPRE_RECO = $row_rege["PRE_RECO"]; }
		if (is_null($row_rege["PSYCHOLGI"])==false) { $txtPSYCHOLGI = $row_rege["PSYCHOLGI"]; }
		if (is_null($row_rege["E_C_G"])==false) { $txtE_C_G = $row_rege["E_C_G"]; }
		if (is_null($row_rege["E_C_G_RE"])==false) { $txtE_C_G_RE = $row_rege["E_C_G_RE"]; }
		if (is_null($row_rege["OTH_1"])==false) { $txtOTH_1 = $row_rege["OTH_1"]; }
		if (is_null($row_rege["OTH_2"])==false) { $txtOTH_2 = $row_rege["OTH_2"]; }
		if (is_null($row_rege["darem1"])==false) { $txtdarem1 = $row_rege["darem1"]; }
		if (is_null($row_rege["darem2"])==false) { $txtdarem2 = $row_rege["darem2"]; }
		if (is_null($row_rege["darem3"])==false) { $txtdarem3 = $row_rege["darem3"]; }
		if (is_null($row_rege["rem1np"])==false) { $txtrem1np = $row_rege["rem1np"]; }
		if (is_null($row_rege["rem2np"])==false) { $txtrem2np = $row_rege["rem2np"]; }
		if (is_null($row_rege["larem1"])==false) { $txtlarem1 = $row_rege["larem1"]; }
		if (is_null($row_rege["larnp1"])==false) { $txtlarnp1 = $row_rege["larnp1"]; }
		if (is_null($row_rege["labrem"])==false) { $txtlabrem = $row_rege["labrem"]; }
		if (is_null($row_rege["xarem1"])==false) { $txtxarem1 = $row_rege["xarem1"]; }
		if (is_null($row_rege["xaremnp"])==false) { $txtaremnp = $row_rege["xaremnp"]; }
		if (is_null($row_rege["uai"])==false) { $CMBUAI = $row_rege["uai"]; }
		if (is_null($row_rege["DIG1"])==false) { $txtDIG1 = $row_rege["DIG1"]; }
		if (is_null($row_rege["DIG2"])==false) { $txtDIG2 = $row_rege["DIG2"]; }
		if (is_null($row_rege["DIG3"])==false) { $txtDIG3 = $row_rege["DIG3"]; }
		if ((is_null($row_rege["reject"])==false) and ($row_rege["reject"]!="")) { $cmbresult = $row_rege["reject"]; }
		if ((is_null($row_rege["xres"])==false) and ($row_rege["xres"]!="")) { $cmbxres = $row_rege["xres"]; }
		if (is_null($row_rege["xrea"])==false) { $cmbxrea = $row_rege["xrea"]; }
		if ((is_null($row_rege["lres"])==false) and ($row_rege["lres"]!="")) { $CMBlbrEC = $row_rege["lres"]; }
		if (is_null($row_rege["lrea"])==false) { $CMBlbRES = $row_rege["lrea"]; }
		if ((is_null($row_rege["fres"])==false) and ($row_rege["fres"]!="")) { $cmbfres = $row_rege["fres"]; }
		if ((is_null($row_rege["pres"])==false) and ($row_rege["pres"]!="")) { $cmbpres = $row_rege["pres"]; }
		if (is_null($row_rege["unfit_re"])==false) { $CMBuNFITrE = $row_rege["unfit_re"]; }
		
		if (is_null($row_rege["HEAR"])==false) { $txtHEAR = $row_rege["HEAR"]; }
		if (is_null($row_rege["LUN"])==false) { $txtLUN = $row_rege["LUN"]; }
		if (is_null($row_rege["ABD"])==false) { $txtABD = $row_rege["ABD"]; }
		if (is_null($row_rege["CLINICAL_RE"])==false) { $txtCLINICAL_RE = $row_rege["CLINICAL_RE"]; }
		if (is_null($row_rege["QUA_EL_HIV_RE"])==false) { $txtQUA_EL_HIV_RE = $row_rege["QUA_EL_HIV_RE"]; }
		if (is_null($row_rege["res"])==false) { $cmbres = $row_rege["res"]; }
		if (is_null($row_rege["ltime"])==false) { $txtltime = $row_rege["ltime"]; }
		if (is_null($row_rege["resx"])==false) { $cmbresx = $row_rege["resx"]; }
		if (is_null($row_rege["resx"])==false) { $cmbresx = $row_rege["resx"]; }
		if (is_null($row_rege["xtime"])==false) { $txtxtime = $row_rege["xtime"]; }
		if (is_null($row_rege["CH_XRA_RE"])==false) { $txtCH_XRA_RE = $row_rege["CH_XRA_RE"]; }
		if (is_null($row_rege["LORD_RE"])==false) { $txtLORD_RE = $row_rege["LORD_RE"]; }
		if (is_null($row_rege["LORD_RE"])==false) { $txtLORD_RE = $row_rege["LORD_RE"]; }
		if (is_null($row_rege["B_OTH"])==false) { $txtB_OTH = $row_rege["B_OTH"]; }
		if (is_null($row_rege["B_OTH_RE"])==false) { $txtB_OTH_RE = $row_rege["B_OTH_RE"]; }
			if (is_null($row_rege["HEL"])==false) { $txtHEL = $row_rege["HEL"]; }
		if (is_null($row_rege["S_BIL"])==false) { $txtS_BIL = $row_rege["S_BIL"]; }
		if (is_null($row_rege["SAL"])==false) { $txtSAL = $row_rege["SAL"]; }
		if (is_null($row_rege["V_CH"])==false) { $txtV_CH = $row_rege["V_CH"]; }
		if (is_null($row_rege["V_CH"])==false) { $txtV_CH = $row_rege["V_CH"]; }
		if (is_null($row_rege["OTHER0_RE"])==false) { $txtOTHER0_RE = $row_rege["OTHER0_RE"]; }
		if (is_null($row_rege["AOC_RE"])==false) { $txtAOC_RE = $row_rege["AOC_RE"]; }
		if (is_null($row_rege["PREG_TEST_RE"])==false) { $txtPREG_TEST_RE = $row_rege["PREG_TEST_RE"]; }
		if (is_null($row_rege["PSYCHOLGI_RE"])==false) { $txtPSYCHOLGI_RE = $row_rege["PSYCHOLGI_RE"]; }
		if (is_null($row_rege["E_C_G"])==false) { $txtE_C_G = $row_rege["E_C_G"]; }
		if (is_null($row_rege["OTH_1_RE"])==false) { $txtOTH_1_RE = $row_rege["OTH_1_RE"]; }
		if (is_null($row_rege["SUG"])==false) { $txtSUG = $row_rege["SUG"]; }
		if (is_null($row_rege["ALB"])==false) { $txtALB = $row_rege["ALB"]; }
		if (is_null($row_rege["BIL"])==false) { $txtBIL = $row_rege["BIL"]; }
		if (is_null($row_rege["OTH"])==false) { $txtOTH = $row_rege["OTH"]; }
		if (is_null($row_rege["UAI_RE"])==false) { $CMBUAI_RE = $row_rege["UAI_RE"]; }
		if (is_null($row_rege["HIV"])==false) { $txtHIV = $row_rege["HIV"]; }
		if (is_null($row_rege["LAB"])==false) { $txtLAB = $row_rege["LAB"]; }
		if (is_null($row_rege["VDRL"])==false) { $txtVDRL = $row_rege["VDRL"]; }
		if (is_null($row_rege["tpha"])==false) { $txtTPHA = $row_rege["tpha"]; }
		if (is_null($row_rege["HER"])==false) { $txtHER = $row_rege["HER"]; }
		if (is_null($row_rege["VARI"])==false) { $txtVARI = $row_rege["VARI"]; }
		if (is_null($row_rege["head"])==false) { $cmbhead = $row_rege["head"]; }
		
		if ((is_null($row_rege["print_date"])==false) and (is_null($row_rege["Print_TIME"])==false)) { 
			$pdate="Print ".date("Y-m-d") . " ".date("H:i:s");
			$lblprint = $pdate; 
		}
		
 	} 
		$ResponseXML .= "<txtName><![CDATA[".$txtName."]]></txtName>";
		$ResponseXML .= "<txtLASTNAME><![CDATA[".$txtLASTNAME."]]></txtLASTNAME>";
		$ResponseXML .= "<txtDATE><![CDATA[".$txtDATE."]]></txtDATE>";
		$ResponseXML .= "<txtDO_ACC_NO><![CDATA[".$txtDO_ACC_NO."]]></txtDO_ACC_NO>";
		$ResponseXML .= "<txtM><![CDATA[".$txtM."]]></txtM>";
		$ResponseXML .= "<txtHI_FT><![CDATA[".$txtHI_FT."]]></txtHI_FT>";
		$ResponseXML .= "<txtHI_in><![CDATA[".$txtHI_in."]]></txtHI_in>";
		$ResponseXML .= "<txtWE><![CDATA[".$txtWE."]]></txtWE>";
		$ResponseXML .= "<txtREC_AG><![CDATA[".$txtREC_AG."]]></txtREC_AG>";
		
		$ResponseXML .= "<txtPLA_OF_IS><![CDATA[".$txtPLA_OF_IS."]]></txtPLA_OF_IS>";
		$ResponseXML .= "<txtPOS_APP><![CDATA[".$txtPOS_APP."]]></txtPOS_APP>";
		$ResponseXML .= "<txtP_N_D_RE><![CDATA[".$txtP_N_D_RE."]]></txtP_N_D_RE>";
		$ResponseXML .= "<txtALLERGY_RE><![CDATA[".$txtALLERGY_RE."]]></txtALLERGY_RE>";
		$ResponseXML .= "<txtOTHERS_RE><![CDATA[".$txtOTHERS_RE."]]></txtOTHERS_RE>";
		$ResponseXML .= "<txtEYE_VISON><![CDATA[".$txtEYE_VISON."]]></txtEYE_VISON>";
		$ResponseXML .= "<txtEYE_NE_R><![CDATA[".$txtEYE_NE_R."]]></txtEYE_NE_R>";
		$ResponseXML .= "<txtEYE_NE_L><![CDATA[".$txtEYE_NE_L."]]></txtEYE_NE_L>";
		$ResponseXML .= "<txtEYE_NE_RE><![CDATA[".$txtEYE_NE_RE."]]></txtEYE_NE_RE>";
		$ResponseXML .= "<txtEYE_FA_R><![CDATA[".$txtEYE_FA_R."]]></txtEYE_FA_R>";
		$ResponseXML .= "<txtEYE_FA_L><![CDATA[".$txtEYE_FA_L."]]></txtEYE_FA_L>";
		$ResponseXML .= "<txtEYE_FA_RE><![CDATA[".$txtEYE_FA_RE."]]></txtEYE_FA_RE>";
		$ResponseXML .= "<txtEYE_CO><![CDATA[".$txtEYE_CO."]]></txtEYE_CO>";
		$ResponseXML .= "<txtEYE_CO_R><![CDATA[".$txtEYE_CO_R."]]></txtEYE_CO_R>";
		$ResponseXML .= "<txtEYE_CO_L><![CDATA[".$txtEYE_CO_L."]]></txtEYE_CO_L>";
		$ResponseXML .= "<txtYEAR_R><![CDATA[".$txtYEAR_R."]]></txtYEAR_R>";
		$ResponseXML .= "<txtYEAR_L><![CDATA[".$txtYEAR_L."]]></txtYEAR_L>";
		$ResponseXML .= "<txtYEAR_RRE><![CDATA[".$txtYEAR_RRE."]]></txtYEAR_RRE>";
		$ResponseXML .= "<txtYEAR_LRE><![CDATA[".$txtYEAR_LRE."]]></txtYEAR_LRE>";
		$ResponseXML .= "<txtCH_XRA_NO><![CDATA[".$txtCH_XRA_NO."]]></txtCH_XRA_NO>";
		$ResponseXML .= "<txtCH_XRA_RE><![CDATA[".$txtCH_XRA_RE."]]></txtCH_XRA_RE>";
		$ResponseXML .= "<txtLORD_NO><![CDATA[".$txtLORD_NO."]]></txtLORD_NO>";
		$ResponseXML .= "<txtLORD_RE><![CDATA[".$txtLORD_RE."]]></txtLORD_RE>";
		$ResponseXML .= "<txtBL_PRES><![CDATA[".$txtBL_PRES."]]></txtBL_PRES>";
		$ResponseXML .= "<txtBL_PR_RE><![CDATA[".$txtBL_PR_RE."]]></txtBL_PR_RE>";
		$ResponseXML .= "<txtHEAR_RE><![CDATA[".$txtHEAR_RE."]]></txtHEAR_RE>";
		$ResponseXML .= "<txtLUN_RE><![CDATA[".$txtLUN_RE."]]></txtLUN_RE>";
		$ResponseXML .= "<txtABD_RE><![CDATA[".$txtABD_RE."]]></txtABD_RE>";
		$ResponseXML .= "<txtHER_RE><![CDATA[".$txtHER_RE."]]></txtHER_RE>";
		$ResponseXML .= "<txtVARI_RE><![CDATA[".$txtVARI_RE."]]></txtVARI_RE>";
		$ResponseXML .= "<txtEXTR_RE><![CDATA[".$txtEXTR_RE."]]></txtEXTR_RE>";
		$ResponseXML .= "<txtSKIN_RE><![CDATA[".$txtSKIN_RE."]]></txtSKIN_RE>";
		$ResponseXML .= "<txtCLINICAL><![CDATA[".$txtCLINICAL."]]></txtCLINICAL>";
		$ResponseXML .= "<txtLAB_RE><![CDATA[".$txtLAB_RE."]]></txtLAB_RE>";
		$ResponseXML .= "<txtVDRL_RE><![CDATA[".$txtVDRL_RE."]]></txtVDRL_RE>";
		$ResponseXML .= "<txtTPHA_RE><![CDATA[".$txtTPHA_RE."]]></txtTPHA_RE>";
		$ResponseXML .= "<txtcns_re><![CDATA[".$txtcns_re."]]></txtcns_re>";
		$ResponseXML .= "<txtPSYCHIATRY_re><![CDATA[".$txtPSYCHIATRY_re."]]></txtPSYCHIATRY_re>";
		$ResponseXML .= "<txtGIARDIA_re><![CDATA[".$txtGIARDIA_re."]]></txtGIARDIA_re>";
		$ResponseXML .= "<txtMICROFILARIA_re><![CDATA[".$txtMICROFILARIA_re."]]></txtMICROFILARIA_re>";
		$ResponseXML .= "<txtQUA_EL_HIV><![CDATA[".$txtQUA_EL_HIV."]]></txtQUA_EL_HIV>";
		$ResponseXML .= "<txtSUG_RE><![CDATA[".$txtSUG_RE."]]></txtSUG_RE>";
		$ResponseXML .= "<txtALB_RE><![CDATA[".$txtALB_RE."]]></txtALB_RE>";
		$ResponseXML .= "<txtBIL_RE><![CDATA[".$txtBIL_RE."]]></txtBIL_RE>";
		$ResponseXML .= "<txtOTH_RE><![CDATA[".$txtOTH_RE."]]></txtOTH_RE>";
		$ResponseXML .= "<txtHEL_RE><![CDATA[".$txtHEL_RE."]]></txtHEL_RE>";
		$ResponseXML .= "<txtS_BIL_RE><![CDATA[".$txtS_BIL_RE."]]></txtS_BIL_RE>";
		$ResponseXML .= "<txtSAL_RE><![CDATA[".$txtSAL_RE."]]></txtSAL_RE>";
		$ResponseXML .= "<txtV_CH_RE><![CDATA[".$txtV_CH_RE."]]></txtV_CH_RE>";
		$ResponseXML .= "<txtOTHER0><![CDATA[".$txtOTHER0."]]></txtOTHER0>";
		$ResponseXML .= "<txtAOC><![CDATA[".$txtAOC."]]></txtAOC>";
		$ResponseXML .= "<txtHEM><![CDATA[".$txtHEM."]]></txtHEM>";
		$ResponseXML .= "<txtHEM_RE><![CDATA[".$txtHEM_RE."]]></txtHEM_RE>";
		$ResponseXML .= "<txtMAL><![CDATA[".$txtMAL."]]></txtMAL>";
		$ResponseXML .= "<txtMAL_RE><![CDATA[".$txtMAL_RE."]]></txtMAL_RE>";
		$ResponseXML .= "<txtbg><![CDATA[".$txtbg."]]></txtbg>";
		$ResponseXML .= "<txtbg_RE><![CDATA[".$txtbg_RE."]]></txtbg_RE>";
		$ResponseXML .= "<txtABD><![CDATA[".$txtABD."]]></txtABD>";
		$ResponseXML .= "<txtABD><![CDATA[".$txtABD."]]></txtABD>";
		$ResponseXML .= "<txtSERO_RE><![CDATA[".$txtSERO_RE."]]></txtSERO_RE>";
		$ResponseXML .= "<txtHIV_RE><![CDATA[".$txtHIV_RE."]]></txtHIV_RE>";
		$ResponseXML .= "<txtF_B_S><![CDATA[".$txtF_B_S."]]></txtF_B_S>";
		$ResponseXML .= "<txtF_B_S_RE><![CDATA[".$txtF_B_S_RE."]]></txtF_B_S_RE>";
		$ResponseXML .= "<txtHBSA><![CDATA[".$txtHBSA."]]></txtHBSA>";
		$ResponseXML .= "<txtHBSA_RE><![CDATA[".$txtHBSA_RE."]]></txtHBSA_RE>";
		$ResponseXML .= "<txtANTI><![CDATA[".$txtANTI."]]></txtANTI>";
		$ResponseXML .= "<txtANTI_RE><![CDATA[".$txtANTI_RE."]]></txtANTI_RE>";
		$ResponseXML .= "<txtALP><![CDATA[".$txtALP."]]></txtALP>";
		$ResponseXML .= "<txtBILI><![CDATA[".$txtBILI."]]></txtBILI>";
		$ResponseXML .= "<txtSGPT><![CDATA[".$txtSGPT."]]></txtSGPT>";
		$ResponseXML .= "<txtL_F_T><![CDATA[".$txtL_F_T."]]></txtL_F_T>";
		$ResponseXML .= "<txtL_F_T_RE><![CDATA[".$txtL_F_T_RE."]]></txtL_F_T_RE>";
		$ResponseXML .= "<txtCREA><![CDATA[".$txtCREA."]]></txtCREA>";
		$ResponseXML .= "<txtCREA_RE><![CDATA[".$txtCREA_RE."]]></txtCREA_RE>";
		$ResponseXML .= "<txtUREA><![CDATA[".$txtUREA."]]></txtUREA>";
		$ResponseXML .= "<txtUREA_RE><![CDATA[".$txtUREA_RE."]]></txtUREA_RE>";
		$ResponseXML .= "<txtPREG_TEST><![CDATA[".$txtPREG_TEST."]]></txtPREG_TEST>";
		$ResponseXML .= "<txtpRE_NOT_RE><![CDATA[".$txtpRE_NOT_RE."]]></txtpRE_NOT_RE>";
		$ResponseXML .= "<txtPRE_NOT_DO><![CDATA[".$txtPRE_NOT_DO."]]></txtPRE_NOT_DO>";
		$ResponseXML .= "<txtPRE_RECO><![CDATA[".$txtPRE_RECO."]]></txtPRE_RECO>";
		$ResponseXML .= "<txtPSYCHOLGI><![CDATA[".$txtPSYCHOLGI."]]></txtPSYCHOLGI>";
		$ResponseXML .= "<txtE_C_G><![CDATA[".$txtE_C_G."]]></txtE_C_G>";
		$ResponseXML .= "<txtE_C_G_RE><![CDATA[".$txtE_C_G_RE."]]></txtE_C_G_RE>";
		$ResponseXML .= "<txtOTH_1><![CDATA[".$txtOTH_1."]]></txtOTH_1>";
		$ResponseXML .= "<txtOTH_2><![CDATA[".$txtOTH_2."]]></txtOTH_2>";
		$ResponseXML .= "<txtdarem1><![CDATA[".$txtdarem1."]]></txtdarem1>";
		$ResponseXML .= "<txtdarem2><![CDATA[".$txtdarem2."]]></txtdarem2>";
		$ResponseXML .= "<txtdarem3><![CDATA[".$txtdarem3."]]></txtdarem3>";
		$ResponseXML .= "<txtrem1np><![CDATA[".$txtrem1np."]]></txtrem1np>";
		$ResponseXML .= "<txtrem2np><![CDATA[".$txtrem2np."]]></txtrem2np>";
		$ResponseXML .= "<txtlarem1><![CDATA[".$txtlarem1."]]></txtlarem1>";
		$ResponseXML .= "<txtlarnp1><![CDATA[".$txtlarnp1."]]></txtlarnp1>";
		$ResponseXML .= "<txtlabrem><![CDATA[".$txtlabrem."]]></txtlabrem>";
		$ResponseXML .= "<txtxarem1><![CDATA[".$txtxarem1."]]></txtxarem1>";
		$ResponseXML .= "<txtaremnp><![CDATA[".$txtaremnp."]]></txtaremnp>";
		$ResponseXML .= "<CMBUAI><![CDATA[".$CMBUAI."]]></CMBUAI>";
		$ResponseXML .= "<txtDIG1><![CDATA[".$txtDIG1."]]></txtDIG1>";
		$ResponseXML .= "<txtDIG2><![CDATA[".$txtDIG2."]]></txtDIG2>";
		$ResponseXML .= "<txtDIG3><![CDATA[".$txtDIG3."]]></txtDIG3>";
		$ResponseXML .= "<cmbresult><![CDATA[".$cmbresult."]]></cmbresult>";
		$ResponseXML .= "<cmbxres><![CDATA[".$cmbxres."]]></cmbxres>";
		$ResponseXML .= "<cmbxrea><![CDATA[".$cmbxrea."]]></cmbxrea>";
		$ResponseXML .= "<CMBlbrEC><![CDATA[".$CMBlbrEC."]]></CMBlbrEC>";
		$ResponseXML .= "<CMBlbRES><![CDATA[".$CMBlbRES."]]></CMBlbRES>";
		$ResponseXML .= "<cmbfres><![CDATA[".$cmbfres."]]></cmbfres>";
		$ResponseXML .= "<cmbpres><![CDATA[".$cmbpres."]]></cmbpres>";
		$ResponseXML .= "<CMBuNFITrE><![CDATA[".$CMBuNFITrE."]]></CMBuNFITrE>";
		$ResponseXML .= "<lblprint><![CDATA[".$lblprint."]]></lblprint>";
				
		
	
		$ResponseXML .= "<txtSERINO><![CDATA[".$txtSERINO."]]></txtSERINO>";
		$ResponseXML .= "<txtCMB_NO><![CDATA[".$txtCMB_NO."]]></txtCMB_NO>";
		$ResponseXML .= "<txtini><![CDATA[".$txtini."]]></txtini>";
		$ResponseXML .= "<txtCODE><![CDATA[".$txtCODE."]]></txtCODE>";
		$ResponseXML .= "<txtGCC_NO><![CDATA[".$txtGCC_NO."]]></txtGCC_NO>";
		$ResponseXML .= "<lbladd><![CDATA[".$lbladd."]]></lbladd>";
		$ResponseXML .= "<txtSEX><![CDATA[".$txtSEX."]]></txtSEX>";
		$ResponseXML .= "<txtAGE><![CDATA[".$txtAGE."]]></txtAGE>";
		$ResponseXML .= "<txtSTATUS><![CDATA[".$txtSTATUS."]]></txtSTATUS>";
		$ResponseXML .= "<txtNATIONL><![CDATA[".$txtNATIONL."]]></txtNATIONL>";
		$ResponseXML .= "<txtCH_XRA_NO><![CDATA[".$txtCH_XRA_NO."]]></txtCH_XRA_NO>";
		
		$ResponseXML .= "<txtHEAR><![CDATA[".$txtHEAR."]]></txtHEAR>";
		$ResponseXML .= "<txtLUN><![CDATA[".$txtLUN."]]></txtLUN>";
		$ResponseXML .= "<txtABD><![CDATA[".$txtABD."]]></txtABD>";
		$ResponseXML .= "<txtCLINICAL_RE><![CDATA[".$txtCLINICAL_RE."]]></txtCLINICAL_RE>";
		$ResponseXML .= "<txtQUA_EL_HIV_RE><![CDATA[".$txtQUA_EL_HIV_RE."]]></txtQUA_EL_HIV_RE>";
		$ResponseXML .= "<cmbres><![CDATA[".$cmbres."]]></cmbres>";
		$ResponseXML .= "<txtltime><![CDATA[".$txtltime."]]></txtltime>";
		$ResponseXML .= "<cmbresx><![CDATA[".$cmbresx."]]></cmbresx>";
		$ResponseXML .= "<txtxtime><![CDATA[".$txtxtime."]]></txtxtime>";
		$ResponseXML .= "<txtCH_XRA_RE><![CDATA[".$txtCH_XRA_RE."]]></txtCH_XRA_RE>";
		$ResponseXML .= "<txtLORD_RE><![CDATA[".$txtLORD_RE."]]></txtLORD_RE>";
		$ResponseXML .= "<txtLORD_RE><![CDATA[".$txtLORD_RE."]]></txtLORD_RE>";
		$ResponseXML .= "<txtB_OTH><![CDATA[".$txtB_OTH."]]></txtB_OTH>";
		$ResponseXML .= "<txtB_OTH_RE><![CDATA[".$txtB_OTH_RE."]]></txtB_OTH_RE>";
		$ResponseXML .= "<txtHEL><![CDATA[".$txtHEL."]]></txtHEL>";
		$ResponseXML .= "<txtS_BIL><![CDATA[".$txtS_BIL."]]></txtS_BIL>";
		$ResponseXML .= "<txtSAL><![CDATA[".$txtSAL."]]></txtSAL>";
		$ResponseXML .= "<txtV_CH><![CDATA[".$txtV_CH."]]></txtV_CH>";
		$ResponseXML .= "<txtOTHER0_RE><![CDATA[".$txtOTHER0_RE."]]></txtOTHER0_RE>";
		$ResponseXML .= "<txtAOC_RE><![CDATA[".$txtAOC_RE."]]></txtAOC_RE>";
		$ResponseXML .= "<txtPREG_TEST_RE><![CDATA[".$txtPREG_TEST_RE."]]></txtPREG_TEST_RE>";
		$ResponseXML .= "<txtPSYCHOLGI_RE><![CDATA[".$txtPSYCHOLGI_RE."]]></txtPSYCHOLGI_RE>";
		$ResponseXML .= "<txtE_C_G><![CDATA[".$txtE_C_G."]]></txtE_C_G>";
		$ResponseXML .= "<txtOTH_1_RE><![CDATA[".$txtOTH_1_RE."]]></txtOTH_1_RE>";
		$ResponseXML .= "<txtSUG><![CDATA[".$txtSUG."]]></txtSUG>";
		$ResponseXML .= "<txtALB><![CDATA[".$txtALB."]]></txtALB>";
		$ResponseXML .= "<txtBIL><![CDATA[".$txtBIL."]]></txtBIL>";
		$ResponseXML .= "<txtOTH><![CDATA[".$txtOTH."]]></txtOTH>";
		$ResponseXML .= "<CMBUAI_RE><![CDATA[".$CMBUAI_RE."]]></CMBUAI_RE>";
		$ResponseXML .= "<txtHIV><![CDATA[".$txtHIV."]]></txtHIV>";
		$ResponseXML .= "<txtLAB><![CDATA[".$txtLAB."]]></txtLAB>";
		$ResponseXML .= "<txtVDRL><![CDATA[".$txtVDRL."]]></txtVDRL>";
		$ResponseXML .= "<txtTPHA><![CDATA[".$txtTPHA."]]></txtTPHA>";
		$ResponseXML .= "<txtHER><![CDATA[".$txtHER."]]></txtHER>";
		$ResponseXML .= "<txtVARI><![CDATA[".$txtVARI."]]></txtVARI>";
		$ResponseXML .= "<cmbhead><![CDATA[".$cmbhead."]]></cmbhead>";
		
	$sql_rsrege = "select * from tbmed where drefno = '" . trim($_GET["txtDREFNO"]) . "'";
	$result_rsrege=mysql_query($sql_rsrege, $dbinv);
	if($row_rsrege = mysql_fetch_array($result_rsrege)){
		if (is_null($row_rege["code"])==false) { $ResponseXML .= "<txtmedcode><![CDATA[".$row_rege["code"]."]]></txtmedcode>"; }
		if ($row_rege["Show"]=="1"){
			$ResponseXML .= "<chks><![CDATA[1]]></chks>"; 
		} else {
			$ResponseXML .= "<chks><![CDATA[0]]></chks>"; 
		}

	} else {
		$ResponseXML .= "<txtmedcode><![CDATA[]]></txtmedcode>";
		$ResponseXML .= "<chks><![CDATA[0]]></chks>"; 
	}

	$sql_rsrege = "select * from resulton where  drefno = '" . trim($_GET["txtDREFNO"]) . "'";
	$result_rsrege=mysql_query($sql_rsrege, $dbinv);
	if($row_rsrege = mysql_fetch_array($result_rsrege)){
		if (is_null($row_rege["result"])==false) { $ResponseXML .= "<cmbres><![CDATA[".$row_rege["result"]."]]></cmbres>"; }
		if (is_null($row_rege["xresult"])==false) { $ResponseXML .= "<cmbresx><![CDATA[".$row_rege["xresult"]."]]></cmbresx>"; }
		if (is_null($row_rege["xrestime"])==false) { $ResponseXML .= "<txtxtime><![CDATA[".$row_rege["xrestime"]."]]></txtxtime>"; }
		if (is_null($row_rege["restime"])==false) { $ResponseXML .= "<txtltime><![CDATA[".$row_rege["restime"]."]]></txtltime>"; }
	} else {
		 $ResponseXML .= "<cmbres><![CDATA[]]></cmbres>";
		 $ResponseXML .= "<cmbresx><![CDATA[]]></cmbresx>";
		 $ResponseXML .= "<txtxtime><![CDATA[]]></txtxtime>";
		 $ResponseXML .= "<txtltime><![CDATA[]]></txtltime>";
	}
	
	$ResponseXML .= " </salesdetails>";
	echo $ResponseXML;
				

}




if($_GET["Command"]=="save_medical")
{
	include('connection.php');
	
	$ResponseXML .= "";
	$ResponseXML .= "<salesdetails>";
						
						
	

	
	$sql_rsemas = "select sum(GRAND_TOT) as tot, sum(TOTPAY) pay from s_salma where C_CODE = '" . trim($_GET["txtCODE"]) . "'";
	$result_rsemas=mysql_query($sql_rsemas, $dbinv);
	if($row_rsemas = mysql_fetch_array($result_rsemas)){

  		$sql_crelimit = "select * from emas where CODE = '" . trim($_GET["txtCODE"]) . "' and chklimi = '1'";
		$result_crelimit=mysql_query($sql_crelimit, $dbinv);
		if($row_crelimit = mysql_fetch_array($result_crelimit)){
  			
			if (($row_rsemas["tot"] - $row_rsemas["pay"]) > $row_crelimit["LIMIT1"]) {
    			exit("Agent Has Exceded His Credit Limit Exceded");
    		}
  		}
  	}

	/*$sql_per = "select * from  userpermission where username='" . $_SESSION["CURRENT_USER"] . "' and docid = '12'";
	$result_per=mysql_query($sql_per, $dbinv);
	if($row_per = mysql_fetch_array($result_per)){
		
		if ($row_per["doc_feed"]=="0"){
			exit("Permission Denied");
		}
	} else {
		exit("Empty Items List. Cannot Save!!!");
	}*/
	
	

//==================================check Permission===========================

//=============================================================================
	
	$sql_status=0;
			
	mysql_query("SET AUTOCOMMIT=0", $dbinv);
	mysql_query("START TRANSACTION", $dbinv);	 

	if (trim($_GET["txtDREFNO"]) != "") {

   		$sql_rssumedi = "Select * from sumedi where DREFNO='" . trim($_GET["txtDREFNO"]) . "'";
   		$result_rssumedi=mysql_query($sql_rssumedi, $dbinv);
		if($row_rssumedi = mysql_fetch_array($result_rssumedi)){
			
			$sql = "insert into entry_log(refno, username, docid, docname, trnType, stime, sdate) values ('" . trim($_GET["txtDREFNO"]) . "', '" . $_SESSION["CURRENT_USER"] . "', '12', 'SUMEDI', 'EDIT', '" . date("Y-m-d") . "', '" . date("H:i:s") . "')";
   			$result=mysql_query($sql, $dbinv);
   			if ($result!=1){ $sql_status=1; }
			
		} else {
			
			if ($row_rssumedi["REJ_CON"] != "Y") {
         		$sql_rs1 = "Select count(ID) as reccount from sumedi where REJ_CON order by ID='Y'";
				$result_rs1=mysql_query($sql_rs1, $dbinv);
         		$REJ_no = $result_rs1["reccount"] + 1;
      		}
			
			$sql = "insert into entry_log(refno, username, docid, docname, trnType, stime, sdate) values ('" . trim($_GET["txtDREFNO"]) . "', '" . $_SESSION["CURRENT_USER"] . "', '12', 'SUMEDI', 'SAVE', '" . date("Y-m-d") . "', '" . date("H:i:s") . "')";
   			$result=mysql_query($sql, $dbinv);
			if ($result!=1){ $sql_status=1; }
		}
		
		if ($_GET["txtHI_FT"]==""){
			$txtHI_FT=0;
		} else {
			$txtHI_FT=$_GET["txtHI_FT"];
		}	
		
		if ($_GET["txtHI_in"]==""){
			$txtHI_in=0;
		} else {
			$txtHI_in=$_GET["txtHI_in"];
		}
		
		if ($_GET["txtWE"]==""){
			$txtWE=0;
		} else {
			$txtWE=$_GET["txtWE"];
		}
		
		$sql = "insert into sumedi(Drefno, Serino, CMB_NO, sDate, DO_ACC_NO, code, Name, Lastname, Address, m, sex, age, Status, NATIONL, HI_FT, HI_in, WE, PAS_NO, PLA_OF_IS, POS_APP, REC_AG, P_N_D_RE, ALLERGY_RE, OTHERS_RE, EYE_VISON, EYE_NE_R, EYE_NE_L, mfile, EYE_NE_RE, EYE_FA_R, EYE_FA_L, EYE_FA_RE, EYE_CO, EYE_CO_R, EYE_CO_L, YEAR_R, YEAR_L, YEAR_RRE, YEAR_LRE, CH_XRA_NO, CH_XRA_RE, LORD_NO, LORD_RE, BL_PRES, BL_PR_RE, HEAR, HEAR_RE, LUN, LUN_RE, ABD_RE, HER, HER_RE, VARI, VARI_RE, EXTR_RE, SKIN_RE, CLINICAL, CLINICAL_RE, LAB, LAB_RE, VDRL, VDRL_RE, tpha, tpha_re, cns_re, PSYCHIATRY_re, GIARDIA_RE, MICROFILARIA_re, qua_el_hiv, SUG, SUG_RE, ALB, ALB_RE, BIL, BIL_RE, OTH, OTH_RE, HEL, HEL_RE, S_BIL, S_BIL_RE, SAL, SAL_RE, V_CH, V_CH_RE, OTHER0, OTHER0_RE, AOC, AOC_RE, HEM, HEM_RE, MAL, MAL_RE, B_OTH, B_OTH_RE, ABD, SERO_RE, HIV, HIV_RE, F_B_S, F_B_S_RE, HBSA, HBSA_RE, ANTI, ANTI_RE, ALP, BILI, SGPT, L_F_T, L_F_T_RE, CREA, CREA_RE, UREA, UREA_RE, PREG_TEST, PREG_TEST_RE, PRE_NOT_RE, PRE_NOT_DO, PRE_RECO, PSYCHOLGI, PSYCHOLGI_RE, E_C_G, E_C_G_RE, OTH_1, OTH_1_RE, DIG1, DIG2, DIG3, reject, unfit_re, darem1, darem2, darem3, rem1np, rem2np, larem1, larnp1, labrem, xarem1, xaremnp, uai, UAI_RE, xres, xrea, lres, lrea, fres, pres, res, ltime, resx, xtime, B_GROUP, B_GROUP_RE, head) values ('" . trim($_GET["txtDREFNO"]) . "', " . $_GET["txtSERINO"] . ", '".trim($_GET["txtCMB_NO"])."', '". $_GET["txtDATE"]."', '".trim($_GET["txtDO_ACC_NO"])."', '" . trim($_GET["txtCODE"]) . "', '" . trim($_GET["txtNAME"]) . "', '".trim($_GET["txtLASTNAME"])."', '".trim($_GET["lbladd"])."', '".trim($_GET["txtM"])."', '".trim($_GET["txtSEX"])."', '".trim($_GET["txtAGE"])."', '".trim($_GET["txtSTATUS"])."', '".trim($_GET["txtNATIONL"])."', ".$txtHI_FT.", ".$txtHI_in.", ".$txtWE.", '".trim($_GET["txtPAS_NO"])."', '".trim($_GET["txtPLA_OF_IS"])."', '".trim($_GET["txtPOS_APP"])."', '".trim($_GET["txtREC_AG"])."', '".trim($_GET["txtP_N_D_RE"])."', '".trim($_GET["txtALLERGY_RE"])."', '".trim($_GET["txtOTHERS_RE"])."', '".trim($_GET["txtEYE_VISON"])."', '".trim($_GET["txtEYE_NE_R"])."', '".trim($_GET["txtEYE_NE_L"])."', '".trim($_GET["mfile"])."', '".trim($_GET["txtEYE_NE_RE"])."', '".trim($_GET["txtEYE_FA_R"])."', '".trim($_GET["txtEYE_FA_L"])."', '".trim($_GET["txtEYE_FA_RE"])."', '".trim($_GET["txtEYE_CO"])."', '".trim($_GET["txtEYE_CO_R"])."', '".trim($_GET["txtEYE_CO_L"])."', '".trim($_GET["txtYEAR_R"])."', '".trim($_GET["txtYEAR_L"])."', '".trim($_GET["txtYEAR_RRE"])."', '".trim($_GET["txtYEAR_LRE"])."', '".trim($_GET["txtCH_XRA_NO"])."', '".trim($_GET["txtCH_XRA_RE"])."', '".trim($_GET["txtLORD_NO"])."', '".trim($_GET["txtLORD_RE"])."', '".trim($_GET["txtBL_PRES"])."', '".trim($_GET["txtBL_PR_RE"])."', '".trim($_GET["txtHEAR"])."', '".trim($_GET["txtHEAR_RE"])."', '".trim($_GET["txtLUN"])."', '".trim($_GET["txtLUN_RE"])."', '".trim($_GET["txtABD_RE"])."', '".trim($_GET["txtHER"])."', '".trim($_GET["txtHER_RE"])."', '".trim($_GET["txtVARI"])."', '".trim($_GET["txtVARI_RE"])."', '".trim($_GET["txtEXTR_RE"])."', '".trim($_GET["txtSKIN_RE"])."', '".trim($_GET["txtCLINICAL"])."', '".trim($_GET["txtCLINICAL_RE"])."', '".trim($_GET["txtLAB"])."', '".trim($_GET["txtLAB_RE"])."', '".trim($_GET["txtVDRL"])."', '".trim($_GET["txtVDRL_RE"])."', '".trim($_GET["txtTPHA"])."', '".trim($_GET["txtTPHA_RE"])."', '".trim($_GET["txtTcns_re"])."', '".trim($_GET["txtPSYCHIATRY_re"])."', '".trim($_GET["txtPSYCHIATRY_re"])."', '".trim($_GET["txtMICROFILARIA_re"])."', '".trim($_GET["txtQUA_EL_HIV"])."', '".trim($_GET["txtSUG"])."', '".trim($_GET["txtSUG_RE"])."', '".trim($_GET["txtALB"])."', '".trim($_GET["txtALB_RE"])."', '".trim($_GET["txtBIL"])."', '".trim($_GET["txtBIL_RE"])."', '".trim($_GET["txtOTH"])."', '".trim($_GET["txtOTH_RE"])."', '".trim($_GET["txtHEL"])."', '".trim($_GET["txtHEL_RE"])."', '".trim($_GET["txtS_BIL"])."', '".trim($_GET["txtS_BIL_RE"])."', '".trim($_GET["txtSAL"])."', '".trim($_GET["txtSAL_RE"])."', '".trim($_GET["txtV_CH"])."', '".trim($_GET["txtV_CH_RE"])."', '".trim($_GET["txtOTHER0"])."', '".trim($_GET["txtOTHER0_RE"])."', '".trim($_GET["txtAOC"])."', '".trim($_GET["txtAOC_RE"])."', '".trim($_GET["txtHEM"])."', '".trim($_GET["txtHEM_RE"])."', '".trim($_GET["txtMAL"])."', '".trim($_GET["txtMAL_RE"])."', '".trim($_GET["txtB_OTH"])."', '".trim($_GET["txtB_OTH_RE"])."', '".trim($_GET["txtABD"])."', '".trim($_GET["txtSERO_RE"])."', '".trim($_GET["txtHIV"])."', '".trim($_GET["txtHIV_RE"])."', '".trim($_GET["txtF_B_S"])."', '".trim($_GET["txtF_B_S_RE"])."', '".trim($_GET["txtHBSA"])."', '".trim($_GET["txtHBSA_RE"])."', '".trim($_GET["txtANTI"])."', '".trim($_GET["txtANTI_RE"])."', '".trim($_GET["txtALP"])."', '".trim($_GET["txtBILI"])."', '".trim($_GET["txtSGPT"])."', '".trim($_GET["txtL_F_T"])."', '".trim($_GET["txtL_F_T_RE"])."', '".trim($_GET["txtCREA"])."', '".trim($_GET["txtCREA_RE"])."', '".trim($_GET["txtUREA"])."', '".trim($_GET["txtUREA_RE"])."', '".trim($_GET["txtPREG_TEST"])."', '".trim($_GET["txtPREG_TEST_RE"])."', '".trim($_GET["txtpRE_NOT_RE"])."', '".trim($_GET["txtPRE_NOT_DO"])."', '".trim($_GET["txtPRE_RECO"])."', '".trim($_GET["txtPSYCHOLGI"])."', '".trim($_GET["txtPSYCHOLGI_RE"])."', '".trim($_GET["txtE_C_G"])."', '".trim($_GET["txtE_C_G_RE"])."', '".trim($_GET["txtOTH_1"])."', '".trim($_GET["txtOTH_1_RE"])."', '".trim($_GET["txtDIG1"])."', '".trim($_GET["txtDIG2"])."', '".trim($_GET["txtDIG3"])."', '".trim($_GET["cmbresult"])."', '".trim($_GET["CMBuNFITrE"])."', '".trim($_GET["txtdarem1"])."', '".trim($_GET["txtdarem2"])."', '".trim($_GET["txtdarem3"])."', '".trim($_GET["txtrem1np"])."', '".trim($_GET["txtrem2np"])."', '".trim($_GET["txtlarem1"])."', '".trim($_GET["txtlarnp1"])."', '".trim($_GET["txtlabrem"])."', '".trim($_GET["txtxarem1"])."', '".trim($_GET["txtaremnp"])."', '".trim($_GET["CMBUAI"])."', '".trim($_GET["CMBUAI_RE"])."', '".trim($_GET["cmbxres"])."', '".trim($_GET["cmbxrea"])."', '".trim($_GET["CMBlbrEC"])."', '".trim($_GET["CMBlbRES"])."', '".trim($_GET["cmbfres"])."', '".trim($_GET["cmbpres"])."', '".trim($_GET["cmbres"])."', '".trim($_GET["txtltime"])."', '".trim($_GET["cmbresx"])."', '".trim($_GET["txtxtime"])."', '".trim($_GET["txtbg"])."', '".trim($_GET["txtbg_RE"])."', '".trim($_GET["cmbhead"])."')";
		//echo $sql;
		$result=mysql_query($sql, $dbinv);
		if ($result!=1){ $sql_status=1; }
		

		$sql_rs1 = "UPDATE rege SET remark_rej='" . trim($_GET["txtREMARK6"]) . "'   WHERE DREFNO='" . trim($_GET["txtDREFNO"]) . "'";
		$result_rs1=mysql_query($sql_rs1, $dbinv);
   		if ($result_rs1!=1){ $sql_status=1; }
		
		
		if (trim($_GET["txtmedcode"]) != "") {
		
			$sql_rst = "select * from tbmed where drefno = '" & Trim(txtDREFNO) & "'";
			$result_rst=mysql_query($sql_rst, $dbinv);
			if($row_rst = mysql_fetch_array($result_rst)){
				
				$sql_rs1 = "update tbmed set code = '" . trim($_GET["txtmedcode"]) . "' where drefno = '" . trim($_GET["txtDREFNO"]) . "'";
				$result_rs1=mysql_query($sql_rs1, $dbinv);
				if ($result_rs1!=1){ $sql_status=1; }
			} else {
				$name=trim($_GET["txtini"]) . trim($_GET["txtNAME"]);
				
				$sql_rs1 = "insert into tbmed(Drefno, PPNO, seri_no, sdate, Name, code, Show) values ('".$_GET["txtDREFNO"]."', '".$_GET["txtPAS_NO"]."', '".$_GET["txtSERINO"]."', '".$_GET["txtDATE"]."', '".$name."', '".$_GET["txtmedcode"]."', '".$_GET["chks"]."')";
				$result_rs1=mysql_query($sql_rs1, $dbinv);
				if ($result_rs1!=1){ $sql_status=1; }
			}
		} else {
			$sql_rs1 = "delete from tbmed WHERE DREFNO = '" . trim($_GET["txtDREFNO"]) . "'";
			$result_rs1=mysql_query($sql_rs1, $dbinv);
			if ($result_rs1!=1){ $sql_status=1; }
		}		

  		
		$sql_rst = "update rege set Name='".trim($_GET["txtNAME"])."', Lastname='".$_GET["txtLASTNAME"]."', initial='".$_GET["txtini"]."', GCC_NO='".$_GET["txtGCC_NO"]."', AGE_Y='".$_GET["txtAGE"]."', PA_NO='".$_GET["txtPAS_NO"]."' where DREFNO= '" . trim($_GET["txtDREFNO"]) . "'";
		$result_rst=mysql_query($sql_rst, $dbinv);
		if ($result_rst!=1){ $sql_status=1; }
					

	} else {
    
    	exit("Insufficient Detail Not Saved");
	}
	
	if ($sql_status==0){
		mysql_query("COMMIT", $dbinv);
		echo "Successfully Saved";
	}	else {
		mysql_query("ROLLBACK", $dbinv);
		echo "Error has occured";
	}

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