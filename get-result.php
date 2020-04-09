<html> 
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head> 
<body> 
<h1 style="text-align:center"><u>Result Details</u></h1>
<fieldset>
</body>

<?php

		if(isset($_GET['submit2']))
		{
			
			$enno=$_GET['enno'];
			$conn =mysqli_connect("localhost","root","","student"); 
			$sql = "SELECT * FROM tblresult WHERE enno = $enno"; 
			$result = mysqli_query($conn,$sql); 
			$name_sql=mysqli_query($conn,"SELECT name,class,enno FROM tblstudent WHERE enno='$enno'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
		$class=$row['class'];
		$enno=$row['enno'];
        }
		?>
		<div class="container">
        <div class="details">
            <span><strong>Name:</span> <?php echo $name ?> <br>
            <span>Class:</span> <?php echo $class; ?> <br>
            <span>Roll No:</span> <?php echo $enno; ?> <br>
        </div>
</div>
			<html> 
	<body> 
	<table border="1px" style= "width:800px; line-height : 50px;"> 
	<t> 
	<th> Subject 1 </th> 
	<th> Subject 2</th> 
	<th> Subject 3 </th> 
	<th> Subject 4</th> 
	<th> Subject 5 </th> 
	
	
	</t> 
	<?php while($row = mysqli_fetch_assoc($result)) 
	{ 
	?> 
	<tr> 
    <td><?php echo $row['sub1'];?></td>      
    <td><?php echo $row['sub2'];?></td>   
    <td><?php echo $row['sub3'];?></td>       
    <td><?php echo $row['sub4'];?></td>       
    <td><?php echo $row['sub5'];?></td> 
	</tr>
	<tr>
    <td colspan="5"><b>Total Marks:</b> <?php echo $row['total'];?></td>  
	</tr>
	<tr>	
	<td colspan="5"><b>Average:</b> <?php echo $row['percentage'];?>%</td> 
	</tr> 
<?php 
	} 
	} 
?> 
</fieldset>
</body>
</html>
