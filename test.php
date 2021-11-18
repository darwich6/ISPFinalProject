<!DOCTYPE html>
<html>
<head>
  <h1>
   <span style="color:#041e42">Course</span>
   <span style="color:#e7e2d4">Tracker</span>
  </h1>
  <title>Course Tracker</title>
  <style>  
  	* {
		box-sizing: border-box;
	}
	.row {
		margin-left:-5px;
		margin-right:-5px;
	}
	.column {
		float: left;
		width: 50%;
		padding: 5px;
	}
    h1 {
		font-family: fantasy;
		text-align: center;
		font-size: 45px;
	}
  
    table {
		font-family: monospace;
		font-size: 25px;
		text-align: left;
		overflow-y:scroll;
  		height:300px;
   		display:block;	
	}
	
	th {
		background-color: #041e42;
		color: white;
	}
	
	tr:nth-child(even) { background-color: #e7e2d4; }
	tr:hover { background-color: #b2b1c7; }
	tr.selected { background-color: #ff8800; }
	
	.btn-def {
		background-color: #041e42;
		border: none;
		color: white;
		padding: 10px 20px;
		text-align: center;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}
    
	label {
		font-size: 17px;
	}
	
	input[type=text], select {
		padding: 12px 20px;
		margin: 6px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}
	
	#container {
		bottom: auto|length|initial|inherit;
	}

	
  </style>
</head>
<body>
<div class="row">
  <div class="column">
  <h2>Course List</h2>
   <table id="courselist">
  	<tr>
	   <th>Subject</th>
	   <th>Course</th>
	   <th>Name</th>
	   <th>Credits</th>
        </tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isp";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["add"]))
{
	mysqli_query($conn, "insert into username values('$_POST[subjectnumber]','$_POST[coursenumber]','$_POST[coursename]','$_POST[coursecredits]',FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE)");
	header("refresh:0;");
}
if(isset($_POST["delete"]))
{
	mysqli_query($conn, "delete from username where Subject_Number='$_POST[subjectnumber]' and Course_Number='$_POST[coursenumber]'");
	header("refresh:0;");
}

$sql = "SELECT Subject_Number, Course_Number, Course_Name, Credits FROM GenEd";
$result = $conn->query($sql);

if ($result-> num_rows > 0) {
	while ($row = $result-> fetch_assoc()) 
	{
		echo "<tr onclick='javascript:fillFields(this);'>";
		echo "<td>" . $row['Subject_Number'] . "</td>";
		echo "<td>" . $row['Course_Number'] . "</td>";
		echo "<td>" . $row['Course_Name'] . "</td>";
		echo "<td>" . $row['Credits'] . "</td>";
		echo "</tr>";
	}
	echo "</table>"; 
} else {
	echo "0 Results found";
}

	echo  "</div>";
	echo  "<div class='column'>";
	echo   "<h2>My Courses</h2>";
	echo   "<table id='mycourses'>";
	echo  	"<tr>";
	echo	   "<th>Subject</th>";
	echo	   "<th>Course</th>";
	echo	   "<th>Name</th>";
	echo	   "<th>Credits</th>";
	echo    "</tr>";

$sql = "SELECT Subject_Number, Course_Number, Course_Name, Credits FROM username";
$result = $conn->query($sql);

if ($result-> num_rows > 0) {
	while ($row = $result-> fetch_assoc()) 
	{
		echo "<tr onclick='javascript:fillFields(this);'>";
		echo "<td>" . $row['Subject_Number'] . "</td>";
		echo "<td>" . $row['Course_Number'] . "</td>";
		echo "<td>" . $row['Course_Name'] . "</td>";
		echo "<td>" . $row['Credits'] . "</td>";
		echo "</tr>";
	}
	echo "</table>"; 
} else {
	echo "0 Results found";
}
$conn->close();
?>
  </div>
</div>

<div class="container">
<div class="usr-form">
  <h2></h2>
  <form action="http://localhost/isp/TermProject/test.php" name="coursetrackerform" method="post">
    <div class="form-group">
	  <label for="subjectnumber">Subject Number:</label>
	  <input type="text" class="form-control" id="subjectnumber" placeholder="Enter Subject" name="subjectnumber">
	</div>
    <div class="form-group">
	  <label for="coursenumber">Course Number:</label>
	  <input type="text" class="form-control" id="coursenumber" placeholder="Enter Course Number" name="coursenumber">
	</div>
    <div class="form-group">
	  <label for="coursename">Course Name:</label>
	  <input type="text" class="form-control" id="coursename" placeholder="Enter Course Name" name="coursename">
	</div> 
    <div class="form-group">
	  <label for="credits">Credits:</label>
	  <input type="text" class="form-control" id="coursecredits" placeholder="Enter Credits" name="coursecredits">
	</div>
    <button type="submit" name="add" class="btn-def">Add Course</button>
	<button type="submit" name="delete" class="btn-def">Delete Course</button>
  </form>
</div>
</div>
<span id="val"></span>
</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 

<script>
$("table tr").click(function()
{
	
    if ($(this).hasClass("selected"))
	{
        $(this).removeClass("selected");
		document.getElementById("subjectnumber").value = "";
		document.getElementById("coursenumber").value = "";
		document.getElementById("coursename").value = "";
		document.getElementById("coursecredits").value = "";
    }else{
        $(this).addClass("selected").siblings().removeClass("selected");
    }
});

function fillFields(row) 
{
	var data = row.cells;
	if (document.getElementById("subjectnumber").value != data[0].innerHTML 
	 || document.getElementById("coursenumber").value != data[1].innerHTML )
	{
		document.getElementById("subjectnumber").value = data[0].innerHTML;
		document.getElementById("coursenumber").value = data[1].innerHTML;
		document.getElementById("coursename").value = data[2].innerHTML;
		document.getElementById("coursecredits").value = data[3].innerHTML;
	}
}

    var table = document.getElementById("mycourses"), sumVal = 0;
            
    for(var i = 1; i < table.rows.length; i++)
    {
        sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
    }
            
    document.getElementById("val").innerHTML = "Total Credits Taken = " + sumVal;
    console.log(sumVal);
</script>