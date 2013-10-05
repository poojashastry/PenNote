<?php
	session_start();
	$name=$_SESSION['name'];
	$_SESSION['name']=$name;
	$serverName="localhost";
		$userName="root";
		$conn= mysql_connect($serverName,$userName) or die('Could not connect to MySQL: ' . mysql_error());
				mysql_select_db('user',$conn);
	if (isset($_POST['Delete']))  
{
  foreach ($_POST['Query'] as $checkbox) 
  {
    echo "$checkbox";
    $del = mysql_query("DELETE FROM $name WHERE id=$checkbox") or die(mysql_error());

    if($del)
    { 
      echo ("Records Deleted"); 
    }   
    else
    {
      echo ("No Way");
    }
  }
}

	else
		echo "oh no";
?>			
