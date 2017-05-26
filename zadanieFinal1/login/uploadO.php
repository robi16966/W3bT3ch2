<?php
	if (isset($_FILES['file'])) {
        $file=$_FILES['file'];
	//echo $_POST['Kontajner_select']."<br>";
		$file_name=$file['name'];
		$file_tmp=$file['tmp_name'];
		$file_size=$file['size'];
		$file_error=$file['error'];
		
		$file_ext=explode('.',$file_name);
		$file_ext=strtolower(end($file_ext));
		$allowed=array('txt','jpg','pdf','doc','zip','docx');
			
		if(in_array($file_ext,$allowed))
		{
			
			if($file_error===0)
			{
				if($file_size<=2097152)
				{
				
					//.....
					$path = "uploads/".$_POST['Kontajner_select']."/".$_POST['kategoria']."/";
					if( ! file_exists($path)) {
					$mask=umask(0);
					mkdir($path, 0777);
					umask($mask);
												}
					//.....
					$file_name_new=$file_name;
					$file_destination="uploads/".$_POST['Kontajner_select']."/".$_POST['kategoria']."/".$file_name;
			//echo $file_destination."<br>";
			//echo $file_tmp."<br>";
					if(move_uploaded_file($file_tmp, $file_destination)){
						
						echo $file_destination;
						//header("location:javascript://history.go(-1)");
						echo "<meta http-equiv='refresh' content='0'>";
						
					}
					else echo "NASTAV PRAVA PRE FILE DO KTOREHO SA SNAZIS UPLOADNUT.... chmod 777 'filename'";
				}
				
			}
			
		}
    }
    header("Location:index.php");





?>

