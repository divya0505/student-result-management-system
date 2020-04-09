<?php
include('dash.php');
?>
<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<h1 style="text-align:center"><u>Result Details</u></h1>
<fieldset>
<form method = "POST" action="<?php $_PHP_SELF ?>"> 
<table width="400" height="300"> 
<tr><td><b>Class: </b></td> 
<td><select name="class">
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
<tr><td><b>Enrollment No: </b></td> 

<td><select name="enno"  >
<option
 <?php
                    $con=mysqli_connect("localhost","root","","student");
                    $result=mysqli_query($conn,"SELECT enno FROM tblstudent");
                    echo '<select enno="enno">';
                    while($row = mysqli_fetch_assoc($result))
					{
                        $display=$row['enno'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>';
                ?>
               </td></tr>
</select>

<tr><td><b>Subject 1: </b></td> 
<td><input type="number" name="sub1"  ></td></tr> 
<tr><td><b>Subject 2: </b></td> 
<td><input type="number" name="sub2"  ></td></tr> 
<tr><td><b>Subject 3: </b></td> 
<td><input type="number" name="sub3"  ></td></tr> 
<tr><td><b>Subject 4: </b></td> 
<td><input type="number" name="sub4"  ></td></tr> 
<tr><td><b>Subject 5: </b></td> 
<td><input type="number" name="sub5"  ></td></tr> 
<tr>
<td><input type="Submit" name="show" value="SHOW"></td> 
<td><input type="Submit" name="update" value="UPDATE"></td> 
<td><input type="Submit" name="delete" value="DELETE"></td> 
</tr> 
</table> 
</fieldset>
</form> 
</body> 
</html> 

<?php
if(isset($_POST['show']))
{
$res=mysqli_query($conn,"Select * from tblresult");
?>
<html>
<body>
<table border="1">
<tr>
<th> Name </th>
<th> Class </th>
<th> Enrollment No </th>
<th> Subject 1 </th>
<th> Subject 2 </th>
<th> Subject 3 </th>
<th> Subject 4 </th>
<th> subject 5 </th>
<th> total </th>
<th> percentage </th>
</tr>
<?php
while($row=mysqli_fetch_assoc($res))
{
	?>
	<tr><td><?php echo $row['name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><?php echo $row['enno']; ?></td>
<td><?php echo $row['sub1']; ?></td>
<td><?php echo $row['sub2']; ?></td>
<td><?php echo $row['sub3']; ?></td>
<td><?php echo $row['sub4']; ?></td>
<td><?php echo $row['sub5']; ?></td>
<td><?php echo $row['total']; ?></td>
<td><?php echo $row['percentage']; ?></td></tr>

<?php
}
}

elseif(isset($_POST['update']))
{
	$class=$_POST['class'];
	$enno = $_POST['enno'];
	$sub1 = $_POST['sub1'];
	$sub2 = $_POST['sub2'];
	$sub3 = $_POST['sub3'];
	$sub4 = $_POST['sub4'];
	$sub5 = $_POST['sub5'];
	$total=$sub1+$sub2+$sub3+$sub4+$sub5; 
	$p=$total/5;
	$q="UPDATE tblresult SET sub1 = $sub1, sub2=$sub2,sub3=$sub3,sub4=$sub4,sub5=$sub5,total=$total,percentage=$p where enno = '$enno' and class = '$class' "; 
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
	if(mysqli_query($conn,"delete from tblresult where enno='$enno' and class='$class'"));
	{
		echo '<script language="javascript">';
        echo 'alert("Delete record successfully")';
        echo '</script>';
	}
}
?>
