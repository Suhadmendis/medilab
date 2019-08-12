<?php

session_start();

////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');
include('connection_i.php');
date_default_timezone_set('Asia/Colombo');

/////////////////////////////////////// GetValue //////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Registration /////////////////////////////////////////////////////////////////////////



if ($_GET["Command"] == "updt_tmp") {
    $j = 1;
    $i = $_GET['count'];
    while ($i >= $j) {
        $test_name = "test_name" . $j;
        $discount = "discount" . $j;

        $sql = "update tmp_opd_med_test set discount = '" . $_GET[$discount] . "' where test_name1 ='" . $_GET[$test_name] . "' ";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
        $j = $j + 1;
    }
}

if ($_GET["Command"] == "getdata") {

    $ResponseXML = "<salesdetails>";
    $ResponseXML .= "<sales_table><![CDATA[<select multiple=\"multiple\" name=\"selectedit\"  onKeyPress=\"add_me(this,event);\"  id=\"selectedit\" size=\"5\"   >";


    $sql = "select distinct code, testname from lab_test ";
    if ($_GET['test_grp'] != "All") {
        $sql .= " where bgroup = '" . $_GET['test_grp'] . "'";
    }
    $sql .= " order by testname";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<option id=" . $row["code"] . " value=" . $row["code"] . " ondblclick=\"add_tmp('" . $row['code'] . "');\">" . $row["testname"] . "</option>";
    }

    $ResponseXML .= "</select>]]></sales_table>";
    $ResponseXML .= " </salesdetails>";

    echo $ResponseXML;
}






if ($_GET["Command"] == "del_item") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql = "delete from tmp_opd_med_test where id = '" . $_GET['id'] . "' ";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);


    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                     <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
		     <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Amount</font></td>
                     <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                     <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Net</font></td>
                     <td></td>
                    </tr>";


    $i = 1;

    $sql = "Select * from tmp_opd_med_test where tmpno='" . $_GET['tmpno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $test_name = "test_name" . $i;
        $amount = "amount" . $i;
        $discount = "discount" . $i;
        $test_code = "test_code" . $i;
        $net = "net" . $i;
        $id = "id" . $i;
        $sql = "Select * from lab_test where code='" . $row['test_name'] . "'";
        $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
        if ($rowa = mysqli_fetch_array($resulta)) {
            $amoo = $rowa['price'];
            $testnm = $rowa['testname'];
        }
        $netv = $row['amount'] - ($row['amount'] * ($row["discount"] / 100));
        $ResponseXML .= "<tr>                              
                             <td><input id=\"" . $test_code . "\" type=\"hidden\" value=\"" . $row["test_name"] . "\"/>  <input id=\"" . $test_name . "\" type=\"text\" value=\"" . $testnm . "\" class=\"text_purchase3\" disabled/></td>
                             <td><input id=\"" . $amount . "\" name=\"" . $amount . "\" type=\"text\"  value=\"" . $amoo . "\" class=\"text_purchase3\" disabled/></a></td>
                             <td><input id=\"" . $discount . "\" disabled name=\"" . $discount . "\" type=\"text\"  value=\"" . $row["discount"] . "\" class=\"text_purchase3\" onkeyup=\"calcc();\" /></a></td>
                             <td><input id=\"" . $net . "\" name=\"" . $net . "\" type=\"text\"  value=\"" . $netv . "\" class=\"text_purchase3\"  disabled/></a></td>
                            <td><img width=\"20\" height=\"20\" onclick=\"del_item('" . $row['id'] . "');\" name=\'" . $id . "'\" id=\'" . $id . "'\" src=\"images/delete_01.png\"></td></td>"
                . "</tr>";
        $i = $i + 1;
    }
    $ResponseXML .= "<tr><td  colspan='3'><div>Total</div></td> <td ><input type='text' id='amo' name='amo'  disabled  ></td></tr>";
    $ResponseXML .= "<tr><td  colspan='3'><div>Sub Total</div></td> <td ><input type='text' id='netamo' name='netamo' disabled   ></td></tr>";
    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "<count><![CDATA[" . ($mcou) . "]]></count>";



    $ResponseXML .= " </salesdetails>";

    //	}	


    echo $ResponseXML;
}





if ($_GET["Command"] == "new_inv") {

    $sql = "Select * from invpara";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<refno><![CDATA[" . $row["appno"] . "]]></refno>";
    $ResponseXML .= "<txtdate><![CDATA[" . date("Y-m-d") . "]]></txtdate>";
    $ResponseXML .= "<txttime><![CDATA[" . date("g.i a", time()) . "]]></txttime>";
    $ResponseXML .= "<tmpno><![CDATA[" . $row["tmpappno"] . "]]></tmpno>";

    $sql = "update invpara set tmpappno=tmpappno+1 ";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    //'2015-02-11'     

    $sql = "select serino from pa_app where sdate='" . date("Y-m-d") . "'   order by serino desc ";

    $results = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($results);
    if ($rows) {
        $ResponseXML .= "<serino><![CDATA[" . ($rows['serino'] + 1) . "]]></serino>";
    } else {
        $ResponseXML .= "<serino><![CDATA[" . 1 . "]]></serino>";
    }

    $sql = "delete from tmp_opd_med_test where tmpno = '" . $row["tmpappno"] . "' ";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "add_tmp") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql = "Select * from tmp_opd_med_test where tmpno='" . $_GET['tmpno'] . "'  and test_name = '" . $_GET['test_det'] . "'";
    $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
    if (mysqli_num_rows($resulta) == 0) {

        $sql = "Select * from lab_test where code='" . $_GET['test_det'] . "'";
        $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
        if ($rowa = mysqli_fetch_array($resulta)) {
            $amoo = $rowa['price'];
            $testnm = $rowa['testname'];
        }

        $sql = "Insert into tmp_opd_med_test (refno, test_name, user_id ,test_name1,amount,tmpno,discount)values 
			('" . $_GET['refno'] . "', '" . $_GET['test_det'] . "', '" . $_SESSION["CURRENT_USER"] . "','" . $testnm . "','" . $amoo . "','" . $_GET['tmpno'] . "','" . $_GET['disc'] . "') ";
        //$ResponseXML .= $sql;
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
    }
    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                     <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
		     <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Amount</font></td>
                     <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                     <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Net</font></td>
                     <td></td>
                    </tr>";


    $i = 1;

    $sql = "Select * from tmp_opd_med_test where tmpno='" . $_GET['tmpno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $test_name = "test_name" . $i;
        $amount = "amount" . $i;
        $discount = "discount" . $i;
        $test_code = "test_code" . $i;
        $net = "net" . $i;
        $id = "id" . $i;
        $sql = "Select * from lab_test where code='" . $row['test_name'] . "'";
        $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
        if ($rowa = mysqli_fetch_array($resulta)) {
            $amoo = $rowa['price'];
            $testnm = $rowa['testname'];
        }

        $netv = $row['amount'] - ($row['amount'] * ($row["discount"] / 100));
        $ResponseXML .= "<tr>                              
                             <td><input id=\"" . $test_code . "\" type=\"hidden\" value=\"" . $row["test_name"] . "\"/>  <input id=\"" . $test_name . "\" type=\"text\" value=\"" . $testnm . "\" class=\"text_purchase3\" disabled/></td>
                             <td><input id=\"" . $amount . "\" name=\"" . $amount . "\" type=\"text\"  value=\"" . $amoo . "\" class=\"text_purchase3\" disabled/></a></td>
                             <td><input id=\"" . $discount . "\" disabled name=\"" . $discount . "\" type=\"text\"  value=\"" . $row["discount"] . "\" class=\"text_purchase3\" onkeyup=\"calcc();\" /></a></td>
                             <td><input id=\"" . $net . "\" name=\"" . $net . "\" type=\"text\"  value=\"" . $netv . "\" class=\"text_purchase3\"  disabled/></a></td>";


        $ResponseXML .= "<td><img width=\"20\" height=\"20\" onclick=\"del_item('" . $row['id'] . "');\" name=\'" . $id . "'\" id=\'" . $id . "'\" src=\"images/delete_01.png\"></td>";

        $ResponseXML .= "</tr>";
        $i = $i + 1;
    }
    $ResponseXML .= "<tr><td  colspan='3'><div>Total</div></td> <td ><input type='text' id='amo' name='amo'  disabled  ></td></tr>";
    $ResponseXML .= "<tr><td  colspan='3'><div>Sub Total</div></td> <td ><input type='text' id='netamo' name='netamo' disabled   ></td></tr>";
    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "<count><![CDATA[" . ($mcou) . "]]></count>";



    $ResponseXML .= " </salesdetails>";

    //	}	


    echo $ResponseXML;
}


if ($_GET["Command"] == "save_item") {
    if ($_SESSION['dev'] == "") {
        exit("logout");
    }



    $_SESSION["CURRENT_DOC"] = 1;      //document ID
    $_SESSION["VIEW_DOC"] = false;     //view current document
    $_SESSION["FEED_DOC"] = true;       //save  current document
    $_GET["MOD_DOC"] = false;         //delete   current document
    $_GET["PRINT_DOC"] = false;       //get additional print   of  current document
    $_GET["PRICE_EDIT"] = false;       //edit selling price
    $_GET["CHECK_USER"] = false;       //check user permission again
    //$cre_balance=str_replace(",", "", $_GET["balance"]);


    $sql = "select * from invpara";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($result1);
    $newno = $rows['appno'];

    $sql = "select serino from pa_app where sdate='" . $_GET["entdate"] . "'   order by serino desc ";
    $results = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($results);
    if ($rows) {
        $mserino = ($rows['serino'] + 1);
    } else {
        $mserino = 1;
    }

    $sql = "select * from pa_app where tmpno = '" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql1 = "update invpara set appno=appno+1";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
        $sql = "insert into entry_log (refno,username,docid,docname,trnType,sdate,stime) values"
                . " ('" . $_GET["tmpno"] . "','" . $_SESSION['CURRENT_USER'] . "','6','','SAVE','" . date('Y-m-d') . "','" . date('Y-m-d H-m-s') . "') ";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
    } else {
        $rows = mysqli_fetch_array($result);
        $mserino = $rows['serino'];
        $newno = $rows['refno'];
        $sql = "insert into entry_log (refno,username,docid,docname,trnType,sdate,stime) values"
                . " ('" . $_GET["tmpno"] . "','" . $_SESSION['CURRENT_USER'] . "','6','','EDIT','" . date('Y-m-d') . "','" . date('Y-m-d H-m-s') . "') ";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
    }

    $sql = "delete from pa_app where tmpno = '" . $_GET["tmpno"] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $sql = "delete from lab_test_pa_app_mas where tmpno = '" . $_GET["tmpno"] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);



    $sql1 = "insert into pa_app (refno,  serino, paname, apptime, tele, remark, paadd, sdate, age, sex, cash, initial,colby,amount,totalamount,docnname,type,tmpno,bloodtime,delvt,fileno) values "
            . "('" . $newno . "', '" . $mserino . "', '" . strtoupper($_GET["name"]) . "', '" . $_GET["time"] . "', '" . $_GET["tele"] . "', '" . $_GET["remark"] . "', '" . $_GET["add"] . "', '" . $_GET["entdate"] . "', '" . $_GET["age"] . "', '" . $_GET["sex"] . "', '" . $_GET["cash"] . "',  '" . $_GET["ini"] . "', '" . $_GET["colby"] . "', '" . $_GET["amount"] . "', '" . $_GET["totamount"] . "', '" . $_GET["doctor"] . "', '" . $_GET["paytype"] . "', '" . $_GET["tmpno"] . "', '" . $_GET["coltime"] . "', '" . $_GET["deltime"] . "', '" . $_GET["fileno"] . "')";

    $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);

    
    if ($_GET['disc']  <> "") {
        $mdis = $_GET['disc'];
        
        if ($mdis >0) {
            $sql = "update pa_disapp set uss ='1' where fileno='". $_GET["fileno"] . "' and sdate ='". $_GET["entdate"] ."' and uss =0";
            $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
            
        }
        
    }
    
    
    
    $sql = "Select * from tmp_opd_med_test where tmpno='" . $_GET['tmpno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    
    
    
    $mocu = $_GET["count"];
    $mcou = ($mocu + 1);

    $i = 1;
    while ($i <= $mocu) {
        $q = "q" . $i;
        $sql1 = "insert into lab_test_pa_app_mas (refno,  testdes, rate,  testcode,discount,tmpno) values "
                . "('" . $_GET[$q] . "')";
        $i = $i + 1;
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
    }


    echo "Saved";
}



if ($_GET["Command"] == "pass_arnno_gin") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $sql = "Select * from pa_app where refno='" . $_GET['arnno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<refno><![CDATA[" . $row["refno"] . "]]></refno>";
        $ResponseXML .= "<entdate><![CDATA[" . $row["sdate"] . "]]></entdate>";
        $ResponseXML .= "<serino><![CDATA[" . $row["serino"] . "]]></serino>";
        $ResponseXML .= "<paname><![CDATA[" . $row["paname"] . "]]></paname>";
        $ResponseXML .= "<tele><![CDATA[" . $row["tele"] . "]]></tele>";
        $ResponseXML .= "<remark><![CDATA[" . $row["remark"] . "]]></remark>";
        $ResponseXML .= "<paadd><![CDATA[" . $row["paadd"] . "]]></paadd>";
        $ResponseXML .= "<initial><![CDATA[" . $row["initial"] . "]]></initial>";
        $ResponseXML .= "<sex><![CDATA[" . $row["sex"] . "]]></sex>";
        $ResponseXML .= "<age><![CDATA[" . $row["age"] . "]]></age>";
        $ResponseXML .= "<doctor><![CDATA[" . $row["docnname"] . "]]></doctor>";
        $ResponseXML .= "<amount><![CDATA[" . $row["amount"] . "]]></amount>";
        $ResponseXML .= "<totamount><![CDATA[" . $row["totalamount"] . "]]></totamount>";
        $ResponseXML .= "<cash><![CDATA[" . $row["cash"] . "]]></cash>";
        $ResponseXML .= "<tmpno><![CDATA[" . $row["tmpno"] . "]]></tmpno>";

        $ResponseXML .= "<coltime><![CDATA[" . $row["bloodtime"] . "]]></coltime>";
        $ResponseXML .= "<deltime><![CDATA[" . $row["delvt"] . "]]></deltime>";
        $ResponseXML .= "<colby><![CDATA[" . $row["colby"] . "]]></colby>";
        $ResponseXML .= "<fileno><![CDATA[" . $row["fileno"] . "]]></fileno>";
    }

    $ResponseXML .= "<sales_table><![CDATA[<table><tr> 
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
			      <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Amount</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Net</font></td>
                              <td></td>
                            </tr>";
    $i = 1;


    $sql = "delete from tmp_opd_med_test where tmpno='" . $row['tmpno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);


    $sql = "Select * from lab_test_pa_app_mas where refno='" . $row['refno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

   
    $mcou = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $test_name = "test_name" . $i;
        $amount = "amount" . $i;
        $discount = "discount" . $i;
        $net = "net" . $i;
        $test_code = "test_code" . $i;
        $id = "id" . $i;
        $netv = $row['rate'] - ($row['rate'] * ($row["discount"] / 100));
        $ResponseXML .= "<tr>                              
                             <td><input id=\"" . $test_code . "\" type=\"hidden\" value=\"" . $row["testcode"] . "\"/>  <input id=\"" . $test_name . "\" type=\"text\" value=\"" . $row['testdes'] . "\" class=\"text_purchase3\" disabled/></td>
			     <td><input id=\"" . $amount . "\" name=\"" . $amount . "\" type=\"text\"  value=\"" . $row['rate'] . "\" class=\"text_purchase3\" disabled /></a></td>
			     <td><input id=\"" . $discount . "\" disabled name=\"" . $discount . "\" type=\"text\"  value=\"" . $row['discount'] . "\" class=\"text_purchase3\" onkeyup=\"calcc();\" /></a></td>";

        $sql1 = "insert into tmp_opd_med_test (refno,  test_name1, amount,  test_name,discount,tmpno,id) values "
                . "('" . $row["refno"] . "', '" . $row['testdes'] . "', '" . $row['rate'] . "', '" . $row['testcode'] . "', '" . $row['discount'] . "','" . $row['tmpno'] . "','" . $row['id'] . "')";

        $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
         
        //   $mid = mysqli_insert_id();

        $ResponseXML .= "<td><input id=\"" . $net . "\" name=\"" . $net . "\" type=\"text\"  value=\"" . $netv . "\" class=\"text_purchase3\" disabled /></a></td>";

        $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='OPD Medical' and grp='Data Capture' and admin=1";
        $resultp = mysqli_query($GLOBALS['dbinv'], $sql);
        if ($rowp = mysqli_fetch_array($resultp)) {
            $ResponseXML .= "<td><img width=\"20\" height=\"20\" onclick=\"del_item('" . $row['id'] . "');\" name=\'" . $id . "'\" id=\'" . $id . "'\" src=\"images/delete_01.png\"></td>";
            $medit=1;            
        } else {
            $ResponseXML .= "<td></td>";
            $medit=0;
        }
        $ResponseXML .= "</tr>";



        $i = $i + 1;
    }

    $ResponseXML .= "<tr><td  colspan='3'><div>Total</div></td> <td ><input type='text' id='amo' name='amo'  disabled  ></td></tr>";
    $ResponseXML .= "<tr><td  colspan='3'><div>Sub Total</div></td> <td ><input type='text' id='netamo' name='netamo'  disabled  ></td></tr>";

    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "<count><![CDATA[" . $mcou . "]]></count>";
    $ResponseXML .= "<medit><![CDATA[" . $medit . "]]></medit>";


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "cancel_inv") {

    $sql = "select * from lab_test_pa_app_trn where refno = '" . $_GET['invno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $mcou = mysqli_num_rows($result);

    if ($mcou <> 0) {
        echo "Results Are Enterd For this Record";
    } else {
        $sql = "update  pa_app set cancell='1'  where refno = '" . $_GET['invno'] . "'";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);

        $sql = "update lab_test_pa_app_mas set cancell='1'  where refno = '" . $_GET['invno'] . "'";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
        echo "Record Deleted";
    }
}

mysqli_close($GLOBALS['dbinv']);
 
?>