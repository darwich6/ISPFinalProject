<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <h1>
     <span style="color:#041e42">CS Course</span>
     <span style="color:#e7e2d4">Tracker 2021</span>
    </h1>
  <title>CS Course Tracker 2021</title>
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
	.progress-container {
	    border: 3px solid #fff;
        padding: 20px;		
	}
	.progress-child {
	    width: 25%;
        float: left;
        padding: 20px;
        border: 2px solid black;		
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
	mysqli_query($conn, "insert into username values('$_POST[subjectnumber]','$_POST[coursenumber]','$_POST[coursename]','$_POST[coursecredits]','$_POST[req1]','$_POST[req2]','$_POST[req3]','$_POST[req4]','$_POST[req5]','$_POST[req6]','$_POST[req7]','$_POST[req8]','$_POST[req9]','$_POST[req10]','$_POST[req11]','$_POST[req12]','$_POST[req13]')");
	header("refresh:0;");
}
if(isset($_POST["delete"]))
{
	mysqli_query($conn, "delete from username where Subject_Number='$_POST[subjectnumber]' and Course_Number='$_POST[coursenumber]'");
	header("refresh:0;");
}

$sql = "SELECT Subject_Number, Course_Number, Course_Name, Credits, Mathematics_Statistics_Logic, Speaking, Writing_First_Course, Writing_Second_Course, Arts, Humanities, Natural_Science, Natural_Science_LAB, Social_Science, Domestic_Diversity, Global_Diversity, Capstone, Complex_Issues_Facing_Society FROM courselist";
$result = $conn->query($sql);

if ($result-> num_rows > 0) {
	while ($row = $result-> fetch_assoc()) 
	{
		echo "<tr onclick='javascript:fillFields(this);'>";
		echo "<td>" . $row['Subject_Number'] . "</td>";
		echo "<td>" . $row['Course_Number'] . "</td>";
		echo "<td>" . $row['Course_Name'] . "</td>";
		echo "<td>" . $row['Credits'] . "</td>";
		echo "<td style='display:none;'>" . $row['Mathematics_Statistics_Logic'] . "</td>";
		echo "<td style='display:none;'>" . $row['Speaking'] . "</td>";
		echo "<td style='display:none;'>" . $row['Writing_First_Course'] . "</td>";
		echo "<td style='display:none;'>" . $row['Writing_Second_Course'] . "</td>";
		echo "<td style='display:none;'>" . $row['Arts'] . "</td>";
		echo "<td style='display:none;'>" . $row['Humanities'] . "</td>";
		echo "<td style='display:none;'>" . $row['Natural_Science'] . "</td>";
		echo "<td style='display:none;'>" . $row['Natural_Science_LAB'] . "</td>";
		echo "<td style='display:none;'>" . $row['Social_Science'] . "</td>";
		echo "<td style='display:none;'>" . $row['Domestic_Diversity'] . "</td>";
		echo "<td style='display:none;'>" . $row['Global_Diversity'] . "</td>";
		echo "<td style='display:none;'>" . $row['Capstone'] . "</td>";
		echo "<td style='display:none;'>" . $row['Complex_Issues_Facing_Society'] . "</td>";
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
   <table id="mycourses">
    <tr>
       <th>Subject</th>
       <th>Course</th>
       <th>Name</th>
       <th>Credits</th>
    </tr>
<?php
$sql = "SELECT Subject_Number, Course_Number, Course_Name, Credits, Mathematics_Statistics_Logic, Speaking, Writing_First_Course, Writing_Second_Course, Arts, Humanities, Natural_Science, Natural_Science_LAB, Social_Science, Domestic_Diversity, Global_Diversity, Capstone, Complex_Issues_Facing_Society FROM username";
$result = $conn->query($sql);

if ($result-> num_rows > 0) {
	while ($row = $result-> fetch_assoc()) 
	{
		echo "<tr onclick='javascript:fillFields(this);'>";
		echo "<td>" . $row['Subject_Number'] . "</td>";
		echo "<td>" . $row['Course_Number'] . "</td>";
		echo "<td>" . $row['Course_Name'] . "</td>";
		echo "<td>" . $row['Credits'] . "</td>";
		echo "<td style='display:none;'>" . $row['Mathematics_Statistics_Logic'] . "</td>";
		echo "<td style='display:none;'>" . $row['Speaking'] . "</td>";
		echo "<td style='display:none;'>" . $row['Writing_First_Course'] . "</td>";
		echo "<td style='display:none;'>" . $row['Writing_Second_Course'] . "</td>";
		echo "<td style='display:none;'>" . $row['Arts'] . "</td>";
		echo "<td style='display:none;'>" . $row['Humanities'] . "</td>";
		echo "<td style='display:none;'>" . $row['Natural_Science'] . "</td>";
		echo "<td style='display:none;'>" . $row['Natural_Science_LAB'] . "</td>";
		echo "<td style='display:none;'>" . $row['Social_Science'] . "</td>";
		echo "<td style='display:none;'>" . $row['Domestic_Diversity'] . "</td>";
		echo "<td style='display:none;'>" . $row['Global_Diversity'] . "</td>";
		echo "<td style='display:none;'>" . $row['Capstone'] . "</td>";
		echo "<td style='display:none;'>" . $row['Complex_Issues_Facing_Society'] . "</td>";
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
	<br><br><br>
	<h2>Credit Options<h2>
	<div class="form-group">
	  <label for="req1">Mathematics Statistics Logic:</label>
	  <input type="text" class="form-control" id="req1" placeholder="Enter 1 or 0" name="req1">
	</div>
	<div class="form-group">
	  <label for="req2">Speaking:</label>
	  <input type="text" class="form-control" id="req2" placeholder="Enter 1 or 0" name="req2">
	</div>
	<div class="form-group">
	  <label for="req3">Writing First Course:</label>
	  <input type="text" class="form-control" id="req3" placeholder="Enter 1 or 0" name="req3">
	</div>
	<div class="form-group">
	  <label for="req4">Writing Second Course:</label>
	  <input type="text" class="form-control" id="req4" placeholder="Enter 1 or 0" name="req4">
	</div>
	<div class="form-group">
	  <label for="req5">Fine Arts and Humanities:</label>
	  <input type="text" class="form-control" id="req5" placeholder="Enter 1 or 0" name="req5">
	</div>
	<div class="form-group">
	  <label for="req6">Humanities:</label>
	  <input type="text" class="form-control" id="req6" placeholder="Enter 1 or 0" name="req6">
	</div>
	<div class="form-group">
	  <label for="req7">Natural Science:</label>
	  <input type="text" class="form-control" id="req7" placeholder="Enter 1 or 0" name="req7">
	</div>
	<div class="form-group">
	  <label for="req8">Natural Science Lab:</label>
	  <input type="text" class="form-control" id="req8" placeholder="Enter 1 or 0" name="req8">
	</div>
	<div class="form-group">
	  <label for="req9">Social Science:</label>
	  <input type="text" class="form-control" id="req9" placeholder="Enter 1 or 0" name="req9">
	</div>
	<div class="form-group">
	  <label for="req10">Domestic Diversity:</label>
	  <input type="text" class="form-control" id="req10" placeholder="Enter 1 or 0" name="req10">
	</div>
	<div class="form-group">
	  <label for="req11">Global Diversity:</label>
	  <input type="text" class="form-control" id="req11" placeholder="Enter 1 or 0" name="req11">
	</div>
	<div class="form-group">
	  <label for="req12">Capstone:</label>
	  <input type="text" class="form-control" id="req12" placeholder="Enter 1 or 0" name="req12">
	</div>
	<div class="form-group">
	  <label for="req13">Complex Issues Facing Society:</label>
	  <input type="text" class="form-control" id="req13" placeholder="Enter 1 or 0" name="req13">
	</div>	
  </form>
</div>
</div>
<div class="progresscontainer">
<div class="progress-child" style="font-size: 15px; font-family: sarif;">
  <div class="criteria1">
    <h5 style="font-family: sarif;">ACADEMIC FOUNDATIONS</h5>
    <span id="mathstatslogic" style="color: red;"></span><br>
    <span id="speaking" style="color: red;"></span><br>
    <span id="writing" style="color: red;"></span><br>
  </div>
  <div class="criteria2">
    <h5 style="font-family: sarif;">BREADTH OF KNOWLEDGE</h5>
    <span id="arts" style="color: red;"></span><br>
    <span id="humanities" style="color: red;"></span><br>
    <span id="natscience" style="color: red;"></span><br>
    <span id="socscience" style="color: red;"></span><br>
  </div>
  <div class="criteria3">
    <h5 style="font-family: sarif;">DIVERSITY</h5>
    <span id="domesticdiv" style="color: red;"></span><br>
    <span id="globaldiv" style="color: red;"></span><br>
  </div>
  <div class="criteria4">
    <h5 style="font-family: sarif;">INTEGRATED AND APPLIED LEARNING</h5>
    <span id="capcomplex" style="color: red;"></span><br><br><br>
  </div>
  <span id="totalcreditstaken" style="color: red; font-weight: bold;"></span><br>
</div>
<div class="progress-child" style="font-size: 15px; font-family: sarif;">
  <div class="preadmission">
  <h5 style="font-family: sarif;">PRE-ADMISSION CORE CLASSES</h5>
    <span id="discretemath" style="color: red;"></span><br>
    <span id="compsci1" style="color: red;"></span><br>
    <span id="compsci2" style="color: red;"></span><br>
	<span id="calc1" style="color: red;"></span><br>
  </div>
  <div class="core">
  <h5 style="font-family: sarif;">CS - SYSTEMS CORE COURSES</h5>
    <span id="datastructures" style="color: red;"></span><br>
    <span id="isp" style="color: red;"></span><br>
    <span id="oop" style="color: red;"></span><br>
	<span id="algorithms" style="color: red;"></span><br>
	<span id="softengi" style="color: red;"></span><br>
	<span id="seminar" style="color: red;"></span><br>
	<span id="compsys" style="color: red;"></span><br>
	<span id="os" style="color: red;"></span><br>
	<span id="calc2" style="color: red;"></span><br>
	<span id="stats" style="color: red;"></span><br>
  </div>
  <div class="electives">
  <h5 style="font-family: sarif;">ELECTIVES</h5>
    <span id="electives" style="color: red;"></span><br>
  </div>
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
		document.getElementById("req1").value = "";
		document.getElementById("req2").value = "";
		document.getElementById("req3").value = "";
		document.getElementById("req4").value = "";
		document.getElementById("req5").value = "";
		document.getElementById("req6").value = "";
		document.getElementById("req7").value = "";
		document.getElementById("req8").value = "";
		document.getElementById("req9").value = "";
		document.getElementById("req10").value = "";
		document.getElementById("req11").value = "";
		document.getElementById("req12").value = "";
		document.getElementById("req13").value = "";
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
		document.getElementById("req1").value = data[4].innerHTML;
		document.getElementById("req2").value = data[5].innerHTML;
		document.getElementById("req3").value = data[6].innerHTML;
		document.getElementById("req4").value = data[7].innerHTML;
		document.getElementById("req5").value = data[8].innerHTML;
		document.getElementById("req6").value = data[9].innerHTML;
		document.getElementById("req7").value = data[10].innerHTML;
		document.getElementById("req8").value = data[11].innerHTML;
		document.getElementById("req9").value = data[12].innerHTML;
		document.getElementById("req10").value = data[13].innerHTML;
		document.getElementById("req11").value = data[14].innerHTML;
		document.getElementById("req12").value = data[15].innerHTML;
		document.getElementById("req13").value = data[16].innerHTML;
	}
}

function narrowList() 
{
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("subjectnumber");
  filter = input.value.toUpperCase();
  table = document.getElementById("courselist");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) 
  {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) 
	{
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) 
	  {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

var table = document.getElementById("mycourses"), sumVal = 0.0;
var mathstatslogic = speaking = writing1 = writing2 = arts = humanities = natscience = natsciencelab = socscience = domesticdiv = globaldiv = capcomplex = 0.0;
var discretemath = compsci1 = compsci2 = calc1 = datastructures = isp = oop = algorithms = softengi = seminar = compsys = os = calc2 = stats = electives = 0.0;
            
for(var i = 1; i < table.rows.length; i++)
{
	if(table.rows[i].cells[0].innerHTML == "3450")
	{
		if(table.rows[i].cells[1].innerHTML == "208")
		{
			discretemath = discretemath + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "221")
		{
			calc1 = calc1 + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "222")
		{
			calc2 = calc2 + 1;
		}
	}
	if(table.rows[i].cells[0].innerHTML == "3460")
	{
		if(table.rows[i].cells[1].innerHTML == "209")
		{
			compsci1 = compsci1 + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "210")
		{
			compsci2 = compsci2 + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "316")
		{
			datastructures = datastructures + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "307")
		{
			isp = isp + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "421")
		{
			oop = oop + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "435")
		{
			algorithms = algorithms + 1;
		}	
		if(table.rows[i].cells[1].innerHTML == "480")
		{
			softengi = softengi + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "490")
		{
			seminar = seminar + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "426")
		{
			os = os + 1;
		}

	}
	if(table.rows[i].cells[0].innerHTML == "3470")
	{
		if(table.rows[i].cells[1].innerHTML == "401")
		{
			stats = stats + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "461")
		{
			stats = stats + 1;
		}
	}
	if(table.rows[i].cells[0].innerHTML == "4450")
	{
		if(table.rows[i].cells[1].innerHTML == "320")
		{
			compsys = compsys + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "325")
		{
			os = os + 1;
		}
	}
	
	for(var k = 4; k < table.rows[i].cells.length; k++)
	{
		if(k == 4 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			mathstatslogic = mathstatslogic + parseFloat(table.rows[i].cells[3].innerHTML);
		}
		if(k == 5 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			speaking = speaking + parseFloat(table.rows[i].cells[3].innerHTML);
		}
		if(k == 6 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			writing1 = writing1 + parseFloat(table.rows[i].cells[3].innerHTML);
		}		
		if(k == 7 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			writing2 = writing2 + parseFloat(table.rows[i].cells[3].innerHTML);
		}		
		if(k == 8 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			arts = arts + parseFloat(table.rows[i].cells[3].innerHTML);
		}		
		if(k == 9 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			humanities = humanities + 1;
		}		
		if(k == 10 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			natscience = natscience + parseFloat(table.rows[i].cells[3].innerHTML);
		}		
		if(k == 11 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			natscience = natscience + parseFloat(table.rows[i].cells[3].innerHTML);
			natsciencelab = natsciencelab + 1;
		}		
		if(k == 12 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			socscience = socscience + parseFloat(table.rows[i].cells[3].innerHTML);
		}		
		if(k == 13 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			domesticdiv = domesticdiv + 1;
		}		
		if(k == 14 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			globaldiv = globaldiv + 1;
		}		
		if(k == 15 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			capcomplex = capcomplex + 1;
		}		
		if(k == 16 && parseInt(table.rows[i].cells[k].innerHTML) == 1)
		{
			capcomplex = capcomplex + 1;
		}				
	}
    sumVal = sumVal + parseFloat(table.rows[i].cells[3].innerHTML);
}
if(mathstatslogic >= 3)
{
	document.getElementById("mathstatslogic").style.color = "green";
}
if(speaking >= 3)
{
	document.getElementById("speaking").style.color = "green";
}
if(writing1 >= 3 && writing2 >= 3)
{
	document.getElementById("writing").style.color = "green";
}
if(arts >= 9)
{
	document.getElementById("arts").style.color = "green";
}
if(humanities >= 1)
{
	document.getElementById("humanities").style.color = "green";
}
if(natscience >= 7 && natsciencelab >= 1)
{
	document.getElementById("natscience").style.color = "green";
}
if(socscience >= 6)
{
	document.getElementById("socscience").style.color = "green";
}
if(domesticdiv >= 1)
{
	document.getElementById("domesticdiv").style.color = "green";
}
if(globaldiv >= 1)
{
	document.getElementById("globaldiv").style.color = "green";
}
if(capcomplex >= 1)
{
	document.getElementById("capcomplex").style.color = "green";
}
if(sumVal >= 120)
{
	document.getElementById("totalcreditstaken").style.color = "green";
}
if(discretemath >= 1)
{
	document.getElementById("discretemath").style.color = "green";
}
if(compsci1 >= 1)
{
	document.getElementById("compsci1").style.color = "green";
}
if(compsci2 >= 1)
{
	document.getElementById("compsci2").style.color = "green";
}
if(calc1 >= 1)
{
	document.getElementById("calc1").style.color = "green";
}
if(datastructures >= 1)
{
	document.getElementById("datastructures").style.color = "green";
}
if(isp >= 1)
{
	document.getElementById("isp").style.color = "green";
}
if(oop >= 1)
{
	document.getElementById("oop").style.color = "green";
}
if(algorithms >= 1)
{
	document.getElementById("algorithms").style.color = "green";
}
if(softengi >= 1)
{
	document.getElementById("softengi").style.color = "green";
}
if(seminar >= 1)
{
	document.getElementById("seminar").style.color = "green";
}
if(compsys >= 1)
{
	document.getElementById("compsys").style.color = "green";
}
if(os >= 1)
{
	document.getElementById("os").style.color = "green";
}
if(calc2 >= 1)
{
	document.getElementById("calc2").style.color = "green";
}
if(stats >= 1)
{
	document.getElementById("stats").style.color = "green";
}
if(electives >= 15)
{
	document.getElementById("electives").style.color = "green";
}

document.getElementById("mathstatslogic").innerHTML = "Mathematics, Statistics, and Logic: " + mathstatslogic + "/3 Credits";
document.getElementById("speaking").innerHTML = "Speaking: " + speaking + "/3 Credits";
document.getElementById("writing").innerHTML = "Writing First Course: " + writing1 + "/3 Credits & Writing Second Course: " + writing2 + "/3 Credits";
document.getElementById("arts").innerHTML = "Fine Arts and Humanities: " + arts + "/9 Credits";
document.getElementById("humanities").innerHTML = "Humanities: " + humanities + "/1 Courses";
document.getElementById("natscience").innerHTML = "Natural Science: " + natscience + "/7 Credits & Lab: " + natsciencelab + "/1 Courses";
document.getElementById("socscience").innerHTML = "Social Science: " + socscience + "/6 Credits";
document.getElementById("domesticdiv").innerHTML = "Domestic Diversity: " + domesticdiv + "/1 Courses";
document.getElementById("globaldiv").innerHTML = "Global Diversity: " + globaldiv + "/1 Courses";
document.getElementById("capcomplex").innerHTML = "Capstone or Complex Issues Facing Society: " + capcomplex + "/1 Courses";
document.getElementById("totalcreditstaken").innerHTML = "Total Credits Taken: " + sumVal + "/120";

document.getElementById("discretemath").innerHTML = "Intro to Discrete Math: " + discretemath + "/1 Courses";
document.getElementById("compsci1").innerHTML = "Computer Science I: " + compsci1 + "/1 Courses";
document.getElementById("compsci2").innerHTML = "Computer Science II: " + compsci2 + "/1 Courses";
document.getElementById("calc1").innerHTML = "Analytic Geometry-Calculus I: " + calc1 + "/1 Courses";
document.getElementById("datastructures").innerHTML = "Data Structures: " + datastructures + "/1 Courses";
document.getElementById("isp").innerHTML = "Internet Systems Programming: " + isp + "/1 Courses";
document.getElementById("oop").innerHTML = "Object Oriented Programming: " + oop + "/1 Courses";
document.getElementById("algorithms").innerHTML = "Algorithms: " + algorithms + "/1 Courses";
document.getElementById("softengi").innerHTML = "Software Engineering: " + softengi + "/1 Courses";
document.getElementById("seminar").innerHTML = "Senior Seminar in Computer Science: " + seminar + "/1 Courses";
document.getElementById("compsys").innerHTML = "Computer Systems: " + compsys + "/1 Courses";
document.getElementById("os").innerHTML = "Operating Systems: " + os + "/1 Courses";
document.getElementById("calc2").innerHTML = "Analytic Geometry & Calculus II: " + calc2 + "/1 Courses";
document.getElementById("stats").innerHTML = "Probability & Statistics for Engineers: " + stats + "/1 Courses";
document.getElementById("electives").innerHTML = "Elective Courses: " + electives + "/15 Credits";

</script>
