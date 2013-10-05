<?php

session_start();
$name=$_SESSION['name'];
$_SESSION['name']=$name;

?>


<html>
<head>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
function doSomething() {
    $.get("logout.php");
    return false;
}
</script>
</head>

<body>
My Notes<br>

	<form name="createNote" method=get action="editNote.php">
	<a href="login.php" onclick="doSomething();">Logout</a>	
	<input type="text" name="noteTitle" />
	<textarea name="myNote" rows="7" columns="50">Type Note Here..</textarea>
	<input type="submit" value="Save note" />
	</form>


	<form name="displayNote" method=post action="delete.php">
		<?php
			$name=$_SESSION['name'];
			$_SESSION['name']=$name;

			$serverName="localhost";
			$userName="root";
			$conn= mysql_connect($serverName,$userName) or die('Could not connect to MySQL: ' . mysql_error());
					mysql_select_db('user',$conn);
			$sql= "select * from $name"; 								#query to be executed
			$result=mysql_query($sql,$conn) or die(mysql_error());		#process query

			while($row = mysql_fetch_row($result))						#returns false when all rows are parsed
			{
				echo"<input type='checkbox' name='Query[]' value=\"".$row[0]."\">";
				echo "$row[1]"; 
				echo "<br/>\n";
				echo "		$row[2]";
				echo "<br/>\n";
				echo "<br/><br/>\n";

			}
		?>

	<input type="submit" value="Delete" name="Delete"/>

		
	</form>



</body>
</html>