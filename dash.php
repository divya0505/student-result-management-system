<?php
include('session.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="dash.css">
<link rel="stylesheet" type="text/css" href="student.css">
</head>
<body>
<h1 style="text-align:center;" > STUDENT RESULT MANAGEMENT SYSTEM </h1>
 <form method="post">
 <div class="navbar">
  <div class="subnav">
    <button class="subnavbtn">Classes <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="addclass.php">Add class</a>
      <a href="manageclass.php">Manage Class</a>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Students <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="addstudent.php">Add Students</a>
      <a href="managestudent.php">Manage Students</a>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Results <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="addresult.php">Add Result</a>
      <a href="#link2">Manage Result</a>
      </div>
  </div>
</div>
		
</body>
</html>