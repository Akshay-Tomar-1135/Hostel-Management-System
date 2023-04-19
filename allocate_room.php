<?php
  require 'includes/config.inc.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Allocate rooms to students</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--bootsrap -->

	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>

<!-- banner -->
<?php include 'header_manager.php';?>
<!-- //banner --> 

<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<form action="allocate_room.php" method="post">
					<div class="row">
					        <div class="col-md-9"> 
							<input type="text" placeholder="Search by Roll Number" name="search_box">
							</div>
							<div class="col-md-3">
							<input type="submit" value="Search" name="search"></input>
							</div>
					</div>
				</form>
			</div>
	</div>
</section>
<?php
	if (isset($_POST['search'])) {
		$search_box = $_POST['search_box'];
		/*echo "<script type='text/javascript'>alert('<?php echo $search_box; ?>')</script>";*/
		$hostel_id = $_SESSION['man_hostel_id'];
		$query_search = "SELECT a.Student_id, CONCAT(s.Fname,' ',s.Lname) AS Student_name, h.Hostel_name, a.Message FROM Application as a, Hostel as h, Student as s WHERE a.Hostel_id = h.Hostel_id and a.Student_id = s.Student_id and a.Student_id like '%$search_box%' and a.Application_status = '1'";
		if($_SESSION['isadmin']==0){
			$query_search = "SELECT a.Student_id, CONCAT(s.Fname,' ',s.Lname) AS Student_name, h.Hostel_name, a.Message FROM Application as a, Hostel as h, Student as s WHERE a.Hostel_id = '$hostel_id' and a.Hostel_id = h.Hostel_id and a.Student_id = s.Student_id and a.Student_id like '%$search_box%' and a.Application_status = '1'";
		}
		$result_search = mysqli_query($conn,$query_search);

		//select the hostel name from hostel table
		// $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
		// $result6 = mysqli_query($conn,$query6);
		// $row6 = mysqli_fetch_assoc($result6);
		// $hostel_name = $row6['Hostel_name'];
   	   ?>
   	   <div class="container">
   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Hostel</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
		if(mysqli_num_rows($result_search)==0){
			echo '<tr><td colspan="4">No Rows Returned</td></tr>';
		}
		else{
			while($row_search = mysqli_fetch_assoc($result_search)){
				//get the name of the student to display
				// $student_id = $row_search['Student_id'];

				// $query7 = "SELECT * FROM Student WHERE Student_id = '$student_id'";
				// $result7 = mysqli_query($conn,$query7);
				// $row7 = mysqli_fetch_assoc($result7);
				// $student_name = $row7['Fname']." ".$row7['Lname'];
				
				echo "<tr><td>{$row_search['Student_name']}</td><td>{$row_search['Student_id']}</td><td>{$row_search['Hostel_name']}</td><td>{$row_search['Message']}</td></tr>\n";

				}
   		}
   ?>
   </tbody>
  </table>
</div>
<?php
	}
  ?>

<div class="container">
<h2 class="heading text-capitalize mb-sm-5 mb-4"> Applications Received </h2>
<?php
	$hostel_id = $_SESSION['man_hostel_id'];
	$query1 = "SELECT a.Student_id, CONCAT(s.Fname,' ',s.Lname) AS Student_name, h.Hostel_name, h.Hostel_id, a.Message FROM Application as a, Hostel as h, Student as s WHERE a.Hostel_id = h.Hostel_id and a.Student_id = s.Student_id and a.Application_status = '1'";
   	if($_SESSION['isadmin']==0){
		$query1 = "SELECT a.Student_id, CONCAT(s.Fname,' ',s.Lname) AS Student_name, h.Hostel_name, h.Hostel_id, a.Message FROM Application as a, Hostel as h, Student as s WHERE a.Hostel_id = '$hostel_id' and a.Hostel_id = h.Hostel_id and a.Student_id = s.Student_id and a.Application_status = '1'";
	}
	$result1 = mysqli_query($conn,$query1);
	//select the hostel name from hostel table
	// $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
	// $result6 = mysqli_query($conn,$query6);
	// $row6 = mysqli_fetch_assoc($result6);
	// $hostel_name = $row6['Hostel_name'];
?>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Hostel</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result1)){
      		//get the name of the student to display
            // $student_id = $row1['Student_id']; 
            // $query7 = "SELECT * FROM Student WHERE Student_id = '$student_id'";
            // $result7 = mysqli_query($conn,$query7);
            // $row7 = mysqli_fetch_assoc($result7);
            // $student_name = $row7['Fname']." ".$row7['Lname'];
            
      		echo "<tr><td>{$row1['Student_name']}</td><td>{$row1['Student_id']}</td><td>{$row1['Hostel_name']}</td><td>{$row1['Message']}</td></tr>\n";
      	}
      }
    ?>
    </tbody>
  </table>
</div>
<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<form action="allocate_room.php" method="post">
					<div class="row"> 
							<input type="submit" value="Allocate" name="submit">
					</div>
				</form>
			</div>
	</div>
</section>
<?php
if(isset($_POST['submit'])){
	$result1 = mysqli_query($conn,$query1);
	
	/*echo "<script type='text/javascript'>alert('<?php echo $room_no ?>')</script>";*/
	while($row1 = mysqli_fetch_assoc($result1)){
		//find the minimum room number
		$hostel_id = $row1['Hostel_id'];
		echo $hostel_id;
		$query2 = "SELECT * FROM Room where Hostel_id = '$hostel_id' and Room_No = (SELECT MIN(Room_No) FROM Room where Allocated = '0' and Hostel_id = '$hostel_id')";
		$result2 = mysqli_query($conn,$query2);
		if(!$result2){
			echo "<script type='text/javascript'>alert('Rooms not available')</script>";
			exit();
		}
		$row2 = mysqli_fetch_assoc($result2);
		$room_no = $row2['Room_No'];

		$student_id = $row1['Student_id'];
		$room_id = $row2['Room_id'];
		$query3 = "UPDATE Application SET Application_status = '0',Room_No = '$room_no' WHERE Student_id = '$student_id'";
		$result3 = mysqli_query($conn,$query3);
		$query4 = "UPDATE Student SET Hostel_id = '$hostel_id',Room_id = '$room_id' WHERE Student_id = '$student_id'";
		$result4 = mysqli_query($conn,$query4);
		$query5 = "UPDATE Room SET Allocated = '1' where Room_id = '$room_id'";
		$result5 = mysqli_query($conn,$query5);
		/*echo "<script type='text/javascript'>alert('<?php echo $result3; ?>')</script>";*/
		if($result3 && $result4 && $result5){
			mysqli_commit($conn);
			echo "<script type='text/javascript'>alert('Rooms Allocated Successfully')</script>";
			header("Location: allocate_room.php");
		}
		else{
			echo "<script type='text/javascript'>alert('Failed to allocate Rooms')</script>";
			mysqli_rollback($conn);
		}

	}
   
}
?>
<br>
<br>
<br>

<!-- footer -->
<?php include 'footer_manager.php';?>
<!-- footer -->

<!-- js-scripts -->

	<?php require 'js-scripts.php';?>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>

