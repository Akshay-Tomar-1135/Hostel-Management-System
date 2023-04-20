<?php
  require 'includes/config.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Print Invoice</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		.student-info {
			width: 800px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #ccc;
		}
		h1 {
			font-size: 24px;
			margin-bottom: 20px;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ccc;
		}
		th {
			background-color: #f2f2f2;
			font-weight: normal;
		}
    /* body{
      padding: 25%;
    } */
		.print-button {
			display: block;
			width: 100px;
			height: 40px;
			background-color: #4CAF50;
			color: #fff;
			text-align: center;
			line-height: 40px;
			border-radius: 4px;
			text-decoration: none;
			margin: 20px auto;
		}
    .image {
        height: 70px;
        width: 70px;
    }
    .container {
    display: flex;
    align-items: center;
    justify-content: left;
    }
		.text {
			margin-left: 20px;
			font-size: 18px;
			color: #333;
		}
	</style>
</head>
<body>
  
	<div class="student-info">
		<div class="container">
			<img src="./web_home/images/logo.png" alt="Image description" width="100" height="100">
			<span class="text"><h1>Hostel Invoice</h1></span>
		</div>
		<?php 
    $student_id = $_SESSION['roll'];
    $query = "SELECT * FROM Student NATURAL JOIN Hostel NATURAL JOIN Room WHERE Student_id = '$student_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>
		<table>
			<tr>
				<th>Name</th>
				<td><?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?></td>
			</tr>
			<tr>
				<th>Roll No.</th>
				<td><?php echo $_SESSION['roll'];?></td>
			</tr>
			<tr>
				<th>Allotted Hostel</th>
				<td><?php echo $row['Hostel_name'];?></td>
			</tr>
			<tr>
				<th>Room No.</th>
				<td><?php echo $row['Room_No'];?></td>
			</tr>
      <?php $hostel_id = $_SESSION['hostel_id'];
      $query="SELECT * FROM Hostel_manager WHERE Hostel_id='$hostel_id'";
      $result = mysqli_query($conn, $query);
      if($row = mysqli_fetch_assoc($result)){?>
			<tr>
				<th>Manager Name</th>
				<td><?php echo $row['Fname'].' '.$row['Lname'];?></td>
			</tr>
			<tr>
				<th>Manager Phone No.</th>
				<td><?php echo $row['Mob_no'];?></td>
			</tr>
      <?php } ?>
		</table>
		<a href="#" class="print-button" onclick="window.print()">Print Information</a>
	</div>
</body>
</html>
