<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8" />

	<meta name="viewport"
		content="width=device-width, initial-scale=1.0" />

	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
		rel="stylesheet" />

	<link rel="stylesheet" href="adminpage.css" />

	<title>Home</title>

</head>

<body>

<?php include 'header.php'; ?>

</body>

</html>
<?php

$user = 'root';
$password = '';

$database = 'DBMS';

$servername = 'localhost';
$mysqli = new mysqli(
	$servername,
	$user,
	$password,
	$database
);

if ($mysqli->connect_error) {
	die('Connect Error (' .
		$mysqli->connect_errno . ') ' .
		$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM customer_info ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>User Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 3% auto;
			font-size: large;
			border: 4px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
				' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}

		.left {
			display: inline-block;
			width: 50%;
			height: 50em;
		}

		.right {
			display: inline-block;
			width: 49%;
			height: 50em;
			/* background-image: url(MODI.jpg); */
			background-repeat: no-repeat;
		}

		#information {
			color: black;
			background-color: #E4F5D4;
			text-align: center;
			margin-bottom: 8px;
			height: 79px;
			padding: 41px;

		}
	

		#suser {
			align-self: auto;
			margin-left: 36%;
			margin-top: 3%;
		}

		input,
		textarea {

			border: 2px solid black;
			border-radius: 6px;
			outline: none;
			font-size: 16px;
			/* size: 10px; */
			width: 44%;
			/* margin: 11px 0px;
			padding: 7px; */
		}


		#btn {
			color: white;
			background: purple;
			/* background-color: #E4F5D4; */
			padding: 7px 8px;
			font-size: 20px;
			border: 2px solid white;
			border-radius: 14px;
			cursor: pointer;
			margin-left: 17%;
			margin-top: 1.5%;
			width: 15%;
		}
		#seh{
			margin-left:15% ;
			/* padding: 5%; */
			/* background-color: #E4F5D4; */
		}
	</style>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class=>
		<form id="suser" action="search_user.php"
		
			method="post">
			<h3 style="text-decoration-style:double">SEARCH STOCK</h3>
			<input type="number" name="search" placeholder="Enter the Id"><br>
			<button type="submit" class="btn btn-info btn-sm">SUBMIT</button>
		</form>
	</div>
	<div class="left">
		<table>
			<!-- <h1>Customer info</h1> -->
			<caption>
				<h1>REMAINING STOCK</h1>
			</caption>
			<tr>

				<th>ID</th>
				<!-- <th>name</th>
				<th>family_count</th> -->
				<th>RICE</th>
				<th>WHEAT</th>
				<th>SUGAR</th>
			</tr>
			<?php
            $search = $_POST["search"];
            $server = "localhost:3306";
            $username = "root";
            $password = "";
			$database = "dbms";

            // Create a database connection
            $conn = mysqli_connect($server, $username, $password, $database);

            if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM remain_stock WHERE id = '$search'";
            // Execute the query
            
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
	            while ($rows = $result->fetch_assoc()) {
            ?>
			<tr>
				<td>
					<?php echo $rows['id']; ?>
				</td>
				<td>
				
					<?php echo $rows['rice']; ?>
				</td>
				<td>
					<?php echo $rows['wheat']; ?>
				</td>
				<td>
					<?php echo $rows['sugar']; ?>
				</td>
			</tr>
			<?php
	            }
            }
            ?>
		</table>

	</div>
	<div class='right'>

		<table class="table-responsive" "table-bordered">
			<!-- <h1>Customer info</h1> -->
			<caption>
				<h1>CUSTOMER INFO</h1>
			</caption>
			<tr>

				<th>ID</th>
				<th>CUSTOMER NAME</th>
				<th>COLOR</th>
				<th>FAMILY COUNT</th>
				<th>cCONTACT</th>
				<th>CITY</th>
			</tr>
			<?php
            $user = 'root';
            $password = '';

            // Database name is geeksforgeeks
            $database = 'DBMS';

            // Server is localhost with
            // port number 3306
            $servername = 'localhost:3306';
            $mysqli = new mysqli(
            	$servername,
            	$user,
            	$password,
            	$database
            );

            // Checking for connections
            if ($mysqli->connect_error) {
	            die('Connect Error (' .
	            	$mysqli->connect_errno . ') ' .
	            	$mysqli->connect_error);
            }

            // SQL query to select data from database
            $sql = " SELECT * FROM customer_info ";
            $result = $mysqli->query($sql);

            while ($rows = $result->fetch_assoc()) {
            ?>
			<tr>
				<td>
					<?php echo $rows['id']; ?>
				</td>
				<td>
					<?php echo $rows['name']; ?>
				</td>
				<td>
					<?php echo $rows['color']; ?>
				</td>
				<td>
					<?php echo $rows['family_count']; ?>
				</td>
				<td>
					<?php echo $rows['contact']; ?>
				</td>
				<td>
					<?php echo $rows['city']; ?>
				</td>
			</tr>
			<?php
            }
            ?>
		</table>






	</div>
	
</body>

</html>