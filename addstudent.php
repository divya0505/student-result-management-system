<?php
include('dash.php');
?>

<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<h1 style="text-align:center"><u>FILL STUDENT DETAILS</u></h1>
<form method = "POST" action="<?php $_PHP_SELF ?>"> 
<fieldset>
<legend><b>Enter Student Details </b></legend>
<table width="400" height="300"> 
<tr><td><b>Full Name:</b></td> 
<td><input type="text" name="name" required></td> 
</tr> 
<tr><td><b>Enrollment No:</b></td> 
<td><input type="number" name="enno" required></td> 
</tr> 
<tr><td><b>Email ID: </b></td> 
<td><input type="Email" name="email" required></td></tr> 
<tr><td><b>Mobile no: </b></td> 
<td><input type="number" name="mno" required></td></tr> 
<tr><td><b>Address: </b></td> 
<td><input type="textarea" name="address" required></td></tr> 
<tr><td><b>Gender: </b></td> 
<td><input type="radio" name="radio" value="Male">Male<br> 
<input type="radio" name="radio" value="Female">Female</td></tr> 
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
$name = $_POST['name']; 
$enno = $_POST['enno'];
$email = $_POST['email'];
$mno = $_POST['mno'];
$address = $_POST['address'];
$radio = $_POST['radio'];
$class=$_POST['class'];
$sql = "INSERT INTO tblstudent (name, enno, email, mno, address, gender,class) VALUES ('$name', $enno, '$email', $mno, '$address', '$radio', '$class')";
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


