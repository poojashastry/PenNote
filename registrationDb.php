<?php
	session_start();
	$name=$_GET['userName'];
	$email=$_GET['email'];
	$password=$_GET['password'];
	$confirmPassword=$_GET['confirmPassword'];
	$table=$name;
	$encryptionMethod = "AES-256-CBC";
	$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
	$iv="25c6c7ff35b9979b";
	$encryptName= openssl_encrypt($name, $encryptionMethod, $secretHash, true,$iv );
	$encryptPassword= openssl_encrypt($password, $encryptionMethod, $secretHash, true, $iv);
	$encryptEmail= openssl_encrypt($email, $encryptionMethod, $secretHash, true, $iv);
	$decryptName= openssl_decrypt($encryptName, $encryptionMethod, $secretHash, true, $iv);
	if($name && $email && $password && $confirmPassword )
	{
		if($password==$confirmPassword)
			{
				$servername="localhost";
				$username="root";
				$conn= mysql_connect($servername,$username) or die('Could not connect to MySQL: ' . mysql_error());
				mysql_select_db("user",$conn);
				#$passwordHash=sha1($password);
				$sqlCheck= "select * from user where name = '$name'";
				$resultCheck= mysql_query($sqlCheck,$conn) or die(mysql_error());
				$count=mysql_num_rows($resultCheck);
				if($count==1)
					echo "Username already exists";
				else
			{
					$sql="insert into user(name,password,email)values('$encryptName','$encryptPassword','$encryptEmail')";
					$sqlTable= "create table $table(id int NOT NULL AUTO_INCREMENT ,noteTitle varchar(30), note varchar(150), PRIMARY KEY(id))";
					$result=mysql_query($sql,$conn) or die(mysql_error());
					$resultTable=mysql_query($sqlTable,$conn) or die(mysql_error());
					print "<h1>you have registered sucessfully</h1>";
					#echo "$decryptName";
			}

	#print "<a href='index.php'>go to login page</a>";
			}
		else print "passwords do not match";
	}
	
	else print"invaild data";
?>

 