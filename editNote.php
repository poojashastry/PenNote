<?php

session_start();

$serverName="localhost";
$userName="root";
$name=$_SESSION['name'];
$_SESSION['name']=$name;
$note= $_GET['myNote'];
$noteTitle= $_GET['noteTitle'];
$conn= mysql_connect($serverName,$userName) or die('Could not connect to MySQL: ' . mysql_error());
		mysql_select_db('user',$conn);
$sql= "insert into $name(noteTitle,note) values ('$noteTitle','$note')";
$result=mysql_query($sql,$conn) or die(mysql_error());		
print "saved note!";


/*
future reference make sure you dont ue it
mysql_connect — Open a connection to a MySQL Server
Warning
This extension is deprecated as of PHP 5.5.0, and will be removed in the future. Instead, the MySQLi or PDO_MySQL extension should be used. See also MySQL: choosing an API guide and related FAQ for more information. Alternatives to this function include:

mysqli_connect()
PDO::__construct()
*/

#OBE SECOND

?>