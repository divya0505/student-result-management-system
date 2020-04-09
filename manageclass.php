<?php
include('dash.php');
?>
<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<h1 style="text-align:center"><u>Class Details</u></h1>
<form method = "POST" action="<?php $_PHP_SELF ?>"> 
<fieldset>
<table width="500" height="100"> 
<tr><td><b>Class Name:</b></td> 
<td><input type="text" name="cname"></td> 
</tr> 
<tr><td><b>Class Name in Numeric:</b></td> 
<td><input type="number" name="cname_num"></td> 
</tr> <tr>
<td><input type="Submit" name="show" value="SHOW"></td> 
<td><input type="Submit" name="delete" value="DELETE"></td>
</tr> 
</table>
</fieldset> 
</form> 

<?php
if(isset($_POST['show']))
{
$res=mysqli_query($conn,"Select * from tblclass");
?>
<html>
<body>
<table border="1" height="150">
<tr>
<th> Class Name </th>
<th> Class name in Numeric </th></tr>
<?php 
while($row=mysqli_fetch_assoc($res))
{
?>
<tr><td><?php echo $row['cname']; ?></td>
<td><?php echo $row['cname_num']; ?></td></tr>
<?php
}
}

elseif(isset($_POST['delete']))
{
	$cname=$_POST['cname'];
	if(mysqli_query($conn,"delete from tblclass where cname='$cname'"))
	{
		echo '<script language="javascript">';
        echo 'alert("Record deleted successfully")';
        echo '</script>';
	}
}
?>