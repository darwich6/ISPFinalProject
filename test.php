<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <h1>
     <span style="color:#041e42"> CS Course</span>
     <span style="color:#e7e2d4">Tracker</span>
    </h1>
  <title>CS Course Tracker</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	.container {
	   	float: left;
		width: 50%;
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
?>
  </div>
  <div class='column'>
  <h2>My Courses</h2>
   <table id='mycourses'>
    <tr>
       <th>Subject</th>
       <th>Course</th>
       <th>Name</th>
       <th>Credits</th>
    </tr>
<?php
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
	  <input type="text" class="form-control" id="subjectnumber" onkeyup="narrowList()" placeholder="Enter Subject" name="subjectnumber">
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
<div id="genedprogresssheet" >
  <div id="academicfoundations">
    <span id="mathstatslogic"></span><br>
    <span id="speaking"></span><br>
    <span id="writing"></span><br>
  </div>
  <div id="breadthofknowledge">
    <span id="arts"></span><br>
    <span id="humanities"></span><br>
    <span id="natscience"></span><br>
    <span id="socscience"></span><br>
  </div>
  <div id="diversity">
    <span id="domesticdiv"></span><br>
    <span id="globaldiv"></span><br>
  </div>
  <div id="integ&appliedlearning">
    <span id="capstone"></span><br>
    <span id="complexissues"></span><br>
    <span id="totalcreditstaken"></span><br>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

function narrowList() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("subjectnumber");
  filter = input.value.toUpperCase();
  table = document.getElementById("courselist");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

var table = document.getElementById("mycourses"), sumVal = 0.0;
var mathstatslogic = speaking = writing = arts = humanities = natscience = socscience = domesticdiv = globaldiv = capstone = complexissues = 0.0;
            
for(var i = 1; i < table.rows.length; i++)
{
    sumVal = sumVal + parseFloat(table.rows[i].cells[3].innerHTML);
}
            
document.getElementById("mathstatslogic").innerHTML = "Mathematics, Statistics, and Logic = " + mathstatslogic + "/3";
document.getElementById("speaking").innerHTML = "Speaking = " + speaking + "/3";
document.getElementById("writing").innerHTML = "Writing = " + writing + "/6";
document.getElementById("arts").innerHTML = "Fine Arts and Humanities = " + arts + "/9";
document.getElementById("humanities").innerHTML = "Humanities = " + humanities + "/1";
document.getElementById("natscience").innerHTML = "Natural Science = " + natscience + "/7";
document.getElementById("socscience").innerHTML = "Social Science = " + socscience + "/6";
document.getElementById("domesticdiv").innerHTML = "Domestic Diversity = " + domesticdiv + "/1";
document.getElementById("globaldiv").innerHTML = "Global Diversity = " + globaldiv + "/1";
document.getElementById("capstone").innerHTML = "Capstone = " + capstone + "/1";
document.getElementById("complexissues").innerHTML = "Complex Issues Facing Society = " + complexissues + "/1";
document.getElementById("totalcreditstaken").innerHTML = "Total Credits Taken = " + sumVal + "/120";
</script>
