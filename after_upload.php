<script src="js/medical_reg.js"></script>

<body >

<?php

$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG", "tif", "TIF");
$extension = end(explode(".", $_FILES["file"]["name"]));
//if ((($_FILES["file"]["type"] == "image/gif")
//|| ($_FILES["file"]["type"] == "image/jpeg")
//|| ($_FILES["file"]["type"] == "image/jpg")
//|| ($_FILES["file"]["type"] == "image/pjpeg")
//|| ($_FILES["file"]["type"] == "image/x-png")
//|| ($_FILES["file"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 50000)
//&& in_array($extension, $allowedExts))
//  {
 // if ($_FILES["file"]["error"] > 0)
 //   {
  //  echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  //  }
  //else
  //  {
   /* echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/
	
		
	//if (!file_exists('path/to/directory')) {
   // mkdir('path/to/directory', 0777, true);
	//}
	
	
//	if ($_POST["cou"]=="image1"){	
    	//if (file_exists("upload/id_copy/" . $_FILES["file"]["name"]))
      	//{
      	//	echo $_FILES["file"]["name"] . " already exists. ";
      //	}
    	//else
      //	{
	  		
			$len=strlen($_FILES["file"]["name"]);
			$pos=strpos($_FILES["file"]["name"], ".")+1;
			
			$reqlen=$len-$pos;
	  		$type=strtolower(substr($_FILES["file"]["name"],$pos, $reqlen));
			echo $type."/";
			echo $_FILES["file"]["name"];
			move_uploaded_file($_FILES["file"]["tmp_name"],
      		"upload/image1/" .$_POST["txt_passno"].".".$type);
			//echo "upload/id_copy/" .$_POST["cus_id"].".".$type;
	   		echo "<img src=\"upload/image1/" .$_POST["txt_passno"].".".$type."\" >";
			$pho_path="upload/image1/" .$_POST["txt_passno"].".".$type;
      //	}
//	}	
	
/*	if ($_POST["cou"]=="image2"){	
    	
	  	$type=substr($_FILES["file"]["type"],6);
      	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/image2/" .$_POST["txt_passno"].".".$type);
		echo "<img src=\"upload/image2/" .$_POST["txt_passno"].".".$type."\" >";

	}
	
	if ($_POST["cou"]=="image3"){	
    	
	  	$type=substr($_FILES["file"]["type"],6);
      	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/image3/" .$_POST["txt_passno"].".".$type);
		echo "<img src=\"upload/image3/" .$_POST["txt_passno"].".".$type."\" >";

	}
	
	if ($_POST["cou"]=="br_copy"){	
    	
	  	$type=substr($_FILES["file"]["type"],6);
      	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/br_copy/" .$_POST["txt_passno"].".".$type);
		echo "<img src=\"upload/br_copy/" .$_POST["txt_passno"].".".$type."\" >";

	}	*/
//    }
//  }
//else
//  {
 // echo "Invalid file";
 // }
 	echo $pho_path;
 	echo '<script type="text/javascript">
					var a="'.$pho_path.'";
					saveimage1(a);
		        	</script>';
					
 	
?> 


</body>