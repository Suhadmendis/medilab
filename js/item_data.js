function GetXmlHttpObject()
	{
		var xmlHttp=null;
		try
		 {
			 // Firefox, Opera 8.0+, Safari
			 xmlHttp=new XMLHttpRequest();
		 }
		catch (e)
		 {
			 // Internet Explorer
			 try
			  {
				  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			  }
			 catch (e)
			  {
				 xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
		 }
		return xmlHttp;
}	

function keyset(key, e)
{	

   if(e.keyCode==13){
	 
	document.getElementById(key).focus();
   }
}

function keyset_chng(key, e)
{	

 
	 
	document.getElementById(key).focus();
 
}


function clear_item()
{
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 		
			
			
	document.getElementById('txtSTK_NO').value="";
	document.getElementById('txtDESCRIPTION').value="";
	 
	
	
	document.getElementById('txtCOST').value="";
	 
	document.getElementById('txtSELLING').value="";
	 
	document.getElementById('txtgroup').value="";
        document.getElementById('txtunit').value="";
         
    
}

function new_item()
{   
	
			
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		
			
			
			clear_item();
			
			//document.getElementById('invdate').value=Date();
			
			var url="item_data.php";			
			url=url+"?Command="+"new_item";
			//alert(url);
			xmlHttp.onreadystatechange=assign_invno1;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
			
}

function assign_invno1(){
	//alert("okkkk");
	//alert(xmlHttp.responseText);
	
	document.getElementById('txtSTK_NO').value=xmlHttp.responseText;	
	document.getElementById('txtDESCRIPTION').focus();
}

var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}

 
function save_item()
{
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 		
 
			
	var url="item_data.php";	
	
	url=url+"?Command="+"item_data_save";
 
	
	url=url+"&txtSTK_NO="+document.getElementById('txtSTK_NO').value;
	url=url+"&txtDESCRIPTION="+document.getElementById('txtDESCRIPTION').value;
	
	url=url+"&txtCOST="+document.getElementById('txtCOST').value;
	
	url=url+"&txtSELLING="+document.getElementById('txtSELLING').value;
	
        
        url=url+"&txtgroup="+document.getElementById('txtgroup').value;
        url=url+"&txtunit="+document.getElementById('txtunit').value;
	
	xmlHttp.onreadystatechange=item_save_results;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function item_save_results()
{
	var XMLAddress1;
 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 	
	 
			alert("Successfully Saved");
			
			new_item();
		}
}

function delete_item()
{
	
  var msg=confirm("Are you sure to DELETE ? ");
  if (msg==true){
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 		
			
	var url="item_data.php";	
	
	url=url+"?Command="+"delete_item";
	//$_FILES["image"]["name"][$key] ;
	
	url=url+"&txtSTK_NO="+document.getElementById('txtSTK_NO').value;
	xmlHttp.onreadystatechange=item_delete_results;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
 
  }
}

 

function item_delete_results()
{
	var XMLAddress1;
	//alert(xmlHttp.responseText);
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 	
						
		//	document.getElementById("message").innerHTML=xmlHttp.responseText;
		//	setTimeout("location.reload(true);",1000);
			alert("Successfully Deleted");
			
			new_item();
		}
}

 

function close_form()
{
    self.close();
}