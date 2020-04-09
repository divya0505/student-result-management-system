<?php
include('session.php');
?>

<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<h1 style="text-align:center"><u>Add Result</u></h1>
<form method = "POST" action="<?php $_PHP_SELF ?>"> 
<fieldset>
<legend><b>Add Result</b></legend>
<table width="400" height="300"> 
<tr><td><b>Class: </b></td> 
<td><select name="class" required>
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

<td><select name="enno" required>
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
<td><input type="number" name="sub1" required></td></tr> 
<tr><td><b>Subject 2: </b></td> 
<td><input type="number" name="sub2" required></td></tr> 
<tr><td><b>Subject 3: </b></td> 
<td><input type="number" name="sub3" required></td></tr> 
<tr><td><b>Subject 4: </b></td> 
<td><input type="number" name="sub4" required></td></tr> 
<tr><td><b>Subject 5: </b></td> 
<td><input type="number" name="sub5" required></td></tr> 
<tr>
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
	$class=$_POST['class'];
	$enno = $_POST['enno'];
	$sub1 = $_POST['sub1'];
	$sub2 = $_POST['sub2'];
	$sub3 = $_POST['sub3'];
	$sub4 = $_POST['sub4'];
	$sub5 = $_POST['sub5'];
	
	$total=$sub1+$sub2+$sub3+$sub4+$sub5; 
	$p=$total/5;
	$name=mysqli_query($conn,"SELECT name FROM tblstudent WHERE enno='$enno' and class='$class'");
    while($row = mysqli_fetch_array($name)) 
	{
        $display=$row['name'];
	}
	
	$sql = "INSERT INTO tblresult (name, enno, class, sub1,sub2,sub3, sub4, sub5, total ,percentage) VALUES ('$display', $enno, '$class', $sub1, $sub2, $sub3, $sub4, $sub5, $total, $p)";
 if (mysqli_query($conn,$sql))  
 { 
		echo '<script language="javascript">';
        echo 'alert("New result created successfully")';
        echo '</script>'; 
 }  
 else  
 { 
      	echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
 } 
} 


