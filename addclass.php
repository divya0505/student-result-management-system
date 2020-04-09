<?php
include('dash.php');
?>

<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<h1 style="text-align:center"><u>CREATE STUDENT CLASS</u></h1>
<form method = "POST" action="<?php $_PHP_SELF ?>"> 
<fieldset>
<legend><b>Create class</b></legend>
<table width="500" height="100"> 
<tr><td><b>Class Name:</b></td> 
<td><input type="text" name="cname"></td> 
</tr> 
<tr><td><b>Class Name in Numeric:</b></td> 
<td><input type="number" name="cname_num"></td> 
</tr> 
<td><input type="Submit" name="submit" value="INSERT"></td> 
</tr> 
</table>
</fieldset> 
</form> 
</body> 
</html> 


<?php 
if(isset($_POST['submit'])) 
{ 
$cname = $_POST['cname']; 
$cname_num = $_POST['cname_num']; 
$sql = "INSERT INTO tblclass (cname, cname_num) VALUES ('$cname', $cname_num)";  
if (mysqli_query($conn,$sql))  
 { 
			echo '<script language="javascript">';
            echo 'alert("New record created successfully")';
            echo '</script>';
			
 }  
 else  
 { 
      	echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
 } 
} 
?>
