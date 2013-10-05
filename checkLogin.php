<?php
		session_start();
		
		$serverName="localhost";
		$userName="root";
		$name= $_POST['userName'];
		$checkPassword= $_POST['password'];
		$encryptionMethod = "AES-256-CBC";
		$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
		$iv="25c6c7ff35b9979b";
		$encryptName= openssl_encrypt($name, $encryptionMethod, $secretHash, true,$iv );
		$encryptPassword= openssl_encrypt($checkPassword, $encryptionMethod, $secretHash, true, $iv);
		$decryptPassword= openssl_decrypt($encryptPassword, $encryptionMethod, $secretHash, true, $iv);


		$conn= mysql_connect($serverName,$userName) or die('Could not connect to MySQL: ' . mysql_error());
		mysql_select_db("user",$conn);
		$sql="select * from user where password='$encryptPassword' and name='$encryptName'";
		$result=mysql_query($sql);

		$count= mysql_num_rows($result);
		if($count==1 && ctype_alnum($decryptPassword))
			{
				$_SESSION['name']= $name;
				#
				header("location:loginSuccess.php");
				die();
			}
		else
			echo "Login Unsuccessful! Try Again.";



?>