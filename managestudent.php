<?php
include('dash.php');
?>
<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<h1 style="text-align:center"><u>Student Details</u></h1>

<fieldset>
<form method = "POST" action="<?php $_PHP_SELF ?>"> 
<table width="400" height="300"> 
<tr><td><b>Full Name:</b></td> 
<td><input type="text" name="name"  ></td> 
</tr> 
<tr><td><b>Enrollment No:</b></td> 
<td><input type="number" name="enno"  ></td> 
</tr> 
<tr><td><b>Email ID: </b></td> 
<td><input type="Email" name="email"  ></td></tr> 
<tr><td><b>Mobile no: </b></td> 
<td><input type="number" name="mno"  ></td></tr> 
<tr><td><b>Address: </b></td> 
<td><input type="textarea" name="address"  ></td></tr> 
<tr><td><b>Gender: </b></td> 
<td><input type="radio" name="gender" value="Male">Male<br> 
<input type="radio" name="gender" value="Female">Female</td></tr> 
<tr><td><b>Class: </b></td> 
<td><select name="class"  >
<option 
 <?php
                    $con=mysqli_connect("localhost","root","","student");
                    
                    $result=mysqli_query($conn,"SELECT cname FROM tblclass");
                        echo '<select name="cname">';
                    while($row = mysqli_fetch_assoc($result)){
                        $display=$row['cname'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
               </td></tr>
</select>
<tr>
<td><input type="Submit" name="show" value="SHOW"></td> 
<td><input type="Submit" name="update" value="UPDATE"></td> 
<td><input type="Submit" name="delete" value="DELETE"></td> 
</tr> 
</table> 
</fieldset>
</form> 
<?php
if(isset($_POST['show']))
{
$res=mysqli_query($conn,"Select * from tblstudent");
?>
<html>
<body>
<table border="1">
<tr>
<th> Name </th>
<th> Enrollment No </th>
<th> Email </th>
<th> Mobile No </th>
<th> Address</th>
<th> Gender </th>
<th> Class </th>
</tr>
<?php
while($row=mysqli_fetch_assoc($res))
{
	?>
	<tr><td><?php echo $row['name']; ?></td>
<td><?php echo $row['enno']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['mno']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo$row['class']; ?></td></tr>

<?php
}
}

elseif(isset($_POST['update']))
{
	$name = $_POST['name']; 
	$enno = $_POST['enno'];
	$email = $_POST['email'];
	$mno = $_POST['mno'];
	$gender=$_POST['gender'];
	$address = $_POST['address'];
	$class=$_POST['class'];
	
	$q="UPDATE tblstudent SET name = '$name' , email = '$email' ,mno='$mno', address='$address',gender='$gender' where enno = '$enno' and class = '$class' "; 
	if(mysqli_query($conn,$q))
	{
		echo '<script language="javascript">';
        echo 'alert("Record updated successfully")';
        echo '</script>';
	}
	else
	{
		    echo "Error: " . $q . "<br>" . mysqli_error($conn); 
	}
}
elseif(isset($_POST['delete']))
{
	$enno = $_POST['enno'];
	$class=$_POST['class'];
	if(mysqli_query($conn,"delete from tblstudent where enno='$enno' and class='$class'"));
	{
		echo '<script language="javascript">';
        echo 'alert("Delete record successfully")';
        echo '</script>';
	}
}
?>
