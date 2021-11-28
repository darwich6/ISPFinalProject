<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <h1>
		<center>
     	<span style="color:#999999">CS-Systems</span>
     	<span style="color:#000000">Course Tracker 2021</span>
		</center>	
    </h1>
  <title>CS Course Tracker 2021</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>  
	
	body{
		font-family: monospace;
	}

	.top { 
		text-align: center;
	}
  
	.courseListDiv {
		padding: auto;
		text-align: left;
		font-family: monospace;
		font-size: 13px;
		overflow-y: scroll;
		height:350px;
	}
	
	.myCoursesDiv {
		padding: auto;
		text-align: left;
		width:47%;
		font-family: monospace;
		font-size: 13px;
		overflow-y:scroll;
		height:350px;
		margin-left: 26%;
	}
	
	th {
		position: sticky;
		top: 0;
		background-color: #A9A9A9; 
	}
	.table-striped tr:hover td {
		background-color: #b2b1c7;
	}
	
	.table-striped tr.selected td {
		background-color: #cce6ff;
	}

	tr:hover { background-color: #b2b1c7; }
	tr.selected { background-color: #A9A9A9; }

	.userSearchForm{
		padding: auto;
		text-align: center;
		/*width: 30%;*/
		font-family: monospace;
		font-size: 13px;
		/*height:500px;*/
		margin-left: 22%;
		display: inline-block;
	}
	.userInputForm{
		text-align: center;
		width: 33%;
		font-family: monospace;
		font-size: 13px;
		height:450px;
		margin-left: 32%;
		display: none;
	}
	
	label{
		font-family: monospace;
		font-size: 13px;
	}
	
	h2{
		font-family: monospace;
	}

	h5{
		font-family: monospace;
	}

	p{
		font-family: monospace;
		font-size: 13px;
	}

	.btn-secondary {
		background-color: #dddddd;
		border: none;
		padding: 10px 12px;
		text-align: center;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}

	.progress-child1{
		padding: auto;
		width:50%;
		font-family: monospace;
		font-size: 13px;
		height:500px;
		display: inline-block;
	}

	.progress-child2{
		padding: auto;
		width:50%;
		font-family: monospace;
		font-size: 13px;
		height:500px;
		display: inline-block;
		float:right;
		position: absolute;
	}
	
	.form-group {
		display: inline;
	}


  </style>
</head>
<body>
	<div class="top">
		<h4> Authors: Ahmed Darwich, Zach Pallota, John Dailey </h4>
	</div>
	<h2 style="margin-left: 45%;">My Courses</h2>
	<!-- div class tl is now courseListDiv -->	
	<div class="modal fade" id="search" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Course List</h4>
				</div>
				<div class="modal-body">
					<div class="courseListDiv">
						<table class="table table-striped" id="courseList">
							<tr class="courseListTableRow">
								<th>Subject Number</th>
								<th>Course Number</th>
								<th>Course Name</th>
								<th>Credits</th>
							</tr>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "isp";


	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
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
	
	if(isset($_POST["clear"]))
	{
		mysqli_query($conn, "delete from username");
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
		echo "No Courses Found";
	}
	?>

					</div>
						<div class="form-group">
							<label for="subjectfind">Search Subject:</label>
							<input type="text" class="" id="subjectfind" onkeyup="narrowList()" placeholder="Enter Subject" name="subjectfind">
						</div>
				</div>
			</div>
			</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div> 
		</div>
	</div>
	
	<div class='myCoursesDiv'>
		<table class="table table-striped" id="mycourses">
    		<tr class="myCoursesTableRow">
       			<th>Subject Number</th>
       			<th>Course Number</th>
       			<th>Course Name</th>
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
				echo "</table>";
				echo "<p>No Courses Found</p>";
				
			}
			$conn->close();
		?>
  	</div>
	<div style="clear:both;"></div>
	<form action="http://localhost/isp/TermProject/test.php" name="coursetrackerform" method="post">
	<div class="userSearchForm">
  		<h2>Course</h2>
		<div class="">
    		<div class="form-group">
	  			<label for="subjectnumber">Subject Number:</label>
	  			<input type="text" class="" id="subjectnumber" placeholder="Enter Subject" name="subjectnumber">
			</div>
    		<div class="form-group">
	  			<label for="coursenumber">Course Number:</label>
	  			<input type="text" class="" id="coursenumber" placeholder="Enter Course Number" name="coursenumber">
			</div>
    		<div class="form-group">
	  			<label for="coursename">Course Name:</label>
	  			<input type="text" class="" id="coursename" placeholder="Enter Course Name" name="coursename">
			</div> 
    		<div class="form-group">
	  			<label for="credits">Credits:</label>
	  			<input type="text" class="" id="coursecredits" placeholder="Enter Credits" name="coursecredits">
			</div>
		</div>
		<div>
			<button type="button" name="search" class="btn btn-secondary" data-toggle="modal" data-target="#search">Find Course</button>
			<button type="submit" name="add" class="btn btn-secondary">Add Course</button>
			<button type="submit" name="delete" class="btn btn-secondary">Delete Course</button>
			<button type="submit" name="clear" class="btn btn-secondary" onclick="return confirm('Are you sure?')">Clear Courses</button>
			<button type="button" name="progress" class="btn btn-secondary" data-toggle="modal" data-target="#progressSheet">Show Progress</button>
			<button type="button" id="optionsbtn" name="options" class="btn btn-secondary" onclick="toggleOptions()">Show Options</button>
		</div>
	</div>

	<div id="userInputForm" class="userInputForm">
		<h2>GenEd Credit Options<h2>
		<p>Select where credit is assigned here for GenEd courses. If these are incorrect your course may be improperly tallied. 
		Non-GenEd courses must be all zeroes.</p>
			<div class="form-group">
	  			<label for="req1">Mathematics, Statistics, and Logic:</label>
	  			<input type="text" class="form-control" id="req1" placeholder="Enter 1 or 0" name="req1" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req2">Speaking:</label>
	  			<input type="text" class="form-control" id="req2" placeholder="Enter 1 or 0" name="req2" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req3">Writing First Course:</label>
	  			<input type="text" class="form-control" id="req3" placeholder="Enter 1 or 0" name="req3" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req4">Writing Second Course:</label>
	  			<input type="text" class="form-control" id="req4" placeholder="Enter 1 or 0" name="req4" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req5">Fine Arts and Humanities:</label>
	  			<input type="text" class="form-control" id="req5" placeholder="Enter 1 or 0" name="req5" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req6">Humanities:</label>
	  			<input type="text" class="form-control" id="req6" placeholder="Enter 1 or 0" name="req6" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req7">Natural Science:</label>
	  			<input type="text" class="form-control" id="req7" placeholder="Enter 1 or 0" name="req7" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req8">Natural Science w/Lab:</label>
	  			<input type="text" class="form-control" id="req8" placeholder="Enter 1 or 0" name="req8" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req9">Social Science:</label>
	  			<input type="text" class="form-control" id="req9" placeholder="Enter 1 or 0" name="req9" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req10">Domestic Diversity:</label>
	  			<input type="text" class="form-control" id="req10" placeholder="Enter 1 or 0" name="req10" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req11">Global Diversity:</label>
	  			<input type="text" class="form-control" id="req11" placeholder="Enter 1 or 0" name="req11" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req12">Capstone:</label>
	  			<input type="text" class="form-control" id="req12" placeholder="Enter 1 or 0" name="req12" maxlength="1">
			</div>
			<div class="form-group">
	  			<label for="req13">Complex Issues Facing Society:</label>
	  			<input type="text" class="form-control" id="req13" placeholder="Enter 1 or 0" name="req13" maxlength="1">
			</div>
  		</form>
	</div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

  <div class="modal fade" id="progressSheet" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Progress</h4>
        </div>
        <div class="modal-body">
          <div class="progress-child1">
  			<div class="criteria1">
    			<h5>ACADEMIC FOUNDATIONS</h5>
    			<span id="mathstatslogic" style="color: red;"></span><br>
    			<span id="speaking" style="color: red;"></span><br>
    			<span id="writing" style="color: red;"></span><br>
  			</div>
  			<div class="criteria2">
    			<h5>BREADTH OF KNOWLEDGE</h5>
    			<span id="arts" style="color: red;"></span><br>
    			<span id="humanities" style="color: red;"></span><br>
    			<span id="natscience" style="color: red;"></span><br>
    			<span id="socscience" style="color: red;"></span><br>
  			</div>
  			<div class="criteria3">
    			<h5>DIVERSITY</h5>
    			<span id="domesticdiv" style="color: red;"></span><br>
    			<span id="globaldiv" style="color: red;"></span><br>
  			</div>
  			<div class="criteria4">
    			<h5>INTEGRATED AND APPLIED LEARNING</h5>
    			<span id="capcomplex" style="color: red;"></span><br>
  			</div>
  			<div class="criteria5">
   				<h5>LANGUAGE REQUIREMENT</h5>
    			<span id="langreq" style="color: red;"></span><br><br>
  			</div>
  			<span id="totalcreditstaken" style="font-size: 24px; color: red;"></span><br>
		</div>
		<div class="progress-child2">
  			<div class="preadmission">
  				<h5>PRE-ADMISSION CORE CLASSES</h5>
    			<span id="discretemath" style="color: red;"></span><br>
    			<span id="compsci1" style="color: red;"></span><br>
    			<span id="compsci2" style="color: red;"></span><br>
				<span id="calc1" style="color: red;"></span><br>
  			</div>
  			<div class="core">
  				<h5>CS - SYSTEMS CORE COURSES</h5>
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
  				<h5>ELECTIVES</h5>
    			<span id="electives" style="color: red;"></span><br>
  			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div>

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
  input = document.getElementById("subjectfind");
  filter = input.value.toUpperCase();
  table = document.getElementById("courseList");
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

function toggleOptions() {
  var x = document.getElementById("userInputForm");
  var btn = document.getElementById("optionsbtn");
  if (x.style.display === "block") {
    x.style.display = "none";
	btn.innerHTML = ("Show Options");
  } else {
    x.style.display = "block";
	btn.innerHTML = ("Hide Options");
  }
}

var table = document.getElementById("mycourses"), sumVal = 0.0;
var mathstatslogic = speaking = writing1 = writing2 = arts = humanities = natscience = natsciencelab = socscience = domesticdiv = globaldiv = capcomplex = 0.0;
var french = german = spanish = 0.0;
var langreq = "Incomplete";
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
		if(table.rows[i].cells[1].innerHTML == "312")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "410")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "415")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "427")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "428")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "430")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "436")
		{
			electives = electives + 3;
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
		if(table.rows[i].cells[1].innerHTML == "395")
		{
			electives = electives + 3;
		}
	}
	
	if(table.rows[i].cells[0].innerHTML == "3520")
	{
		if(table.rows[i].cells[1].innerHTML == "101")
		{
			french = french + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "102")
		{
			french = french + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "201")
		{
			french = french + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "202")
		{
			french = french + 1;
		}		
	}
	
	if(table.rows[i].cells[0].innerHTML == "3530")
	{
		if(table.rows[i].cells[1].innerHTML == "101")
		{
			german = german + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "102")
		{
			german = german + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "201")
		{
			german = german + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "202")
		{
			german = german + 1;
		}		
	}
	
	if(table.rows[i].cells[0].innerHTML == "3580")
	{
		if(table.rows[i].cells[1].innerHTML == "101")
		{
			spanish = spanish + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "102")
		{
			spanish = spanish + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "201")
		{
			spanish = spanish + 1;
		}
		if(table.rows[i].cells[1].innerHTML == "202")
		{
			spanish = spanish + 1;
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
		if(table.rows[i].cells[1].innerHTML == "410")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "415")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "420")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "422")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "427")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "440")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "462")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "465")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML == "467")
		{
			electives = electives + 3;
		}
	}

	if(table.rows[i].cells[0].innerHTML == "2440")
	{
		if(table.rows[i].cells[1].innerHTML == "204")
		{
			electives = electives + 3;
		}
	}

	if(table.rows[i].cells[0].innerHTML == "3350")
	{
		if(table.rows[i].cells[1].innerHTML == "405")
		{
			electives = electives + 3;
		}
		if(table.rows[i].cells[1].innerHTML = "407")
		{
			electives = electives + 3;
		}
	}

	if(table.rows[i].cells[0].innerHTML == "3470")
	{
		if(table.rows[i].cells[1].innerHTML == "480")
		{
			electives = electives + 3;
		}
	}

	if(table.rows[i].cells[0].innerHTML == "4800")
	{
		if(table.rows[i].cells[1].innerHTML == "420")
		{
			electives = electives + 3;
		}
	}

	if(table.rows[i].cells[0].innerHTML == "7100")
	{
		if(table.rows[i].cells[1].innerHTML == "489")
		{
			electives = electives + 3;
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
if(french == 4 || german == 4 || spanish == 4)
{
	langreq = "Complete";
	document.getElementById("langreq").style.color = "green";
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
document.getElementById("langreq").innerHTML = "2-Year Language Requirement: " + langreq;
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
