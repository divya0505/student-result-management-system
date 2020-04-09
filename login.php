<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<form method="POST" action=" "> 
<title>STUDENT RESULT MANAGEMENT SYSTEM</title>
		<div class="header">
            <h1 style="text-align:center"><u>STUDENT RESULT MANAGEMENT SYSTEM</u></h1>
        </div>
<div class="login">
<fieldset>
<legend><b>Admin Login</b></legend>
<h3 style="text-align:center" ><u>ADMIN LOGIN</u></h3> 
<table> 
<tr><td><h3><b>Username: </b></h3></td> 
<td><input type="text" name="username" required></td></tr> 
<tr><td><b><h3>Password: </h3></b></td> 
<td><input type="password" name="password" required></td></tr> 
<h5 style="background-color: Yellow" >
<tr><td><input type="submit" name="submit"></td> 
<td><input type="reset"></tr> </h5>
</fieldset>
</form>
</table> 
</div>

            <form action="get-result.php" method="get">
                <fieldset>
                    <legend><b>FOR CHECK RESULT</b></legend>
					<h3 style="text-align:center" ><u>CHECK RESULT</u></h3> 
                    <table> 
					<tr><td><h3><b>Selct Class: </b></h3></td> 
					<td><select name="class" required>
					<option
					<?php
						$con=mysqli_connect("localhost","root","","student");
						$result=mysqli_query($con,"SELECT cname FROM tblclass");
                        echo '<select name="cname">';
						while($row = mysqli_fetch_assoc($result))
						{
							$display=$row['cname'];
							echo '<option value="'.$display.'">'.$display.'</option>';
						}
						echo'</select>';
					?>
               </td></tr>
				</select>
					<tr><td><b><h3>Enrollment no: </h3></b></td> 
					<td><input type="text" name="enno" required></td></tr> 
					<h5 style="background-color: Yellow" >
					<tr><td><input type="submit" name="submit2" value="GET RESULT"></td>
				</fieldset>
            </form>

</body> 
</html> 

<?php
session_start();

if(isset($_POST['submit']))
{
	   
	$username=$_POST['username'];
	$password=$_POST['password'];
	$conn =mysqli_connect("localhost","root","","student"); 
	$q="SELECT username FROM admin WHERE username='$username' and password='$password'";
	$res=mysqli_query($conn,$q);
	$count=mysqli_num_rows($res);	
	if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: dash.php");
        }else {
            echo 'alert("Invalid Username or Password")';
        }
}
?>