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
 <form action="allocate_room.php" method="post">     
  <table class="table table-hover">
    <thead>
      <tr>
	    <th>Select</th>
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
            // $student_name = $row1['Student_name'];
           
			// Output a row with a checkbox for each database row
			echo "<tr><td><input type='checkbox' name='selected_rows[]' value='{$row1['Student_id']}' ></td><td>{$row1['Student_name']}</td><td>{$row1['Student_id']}</td><td>{$row1['Hostel_name']}</td><td>{$row1['Message']}</td></tr>\n";
			// echo $row1['Application_id'];
		  }
      }
    ?>

    </tbody>
  </table>
		<section class="contact py-5">
			<div class="container ">
					<div class="mail_grid_w3l">
							<div class="row"> 
								<input class="ml-1 mr-5 mt-5 mb-5" type="submit" value="Allocate" name="submit">
								<div class="row"> 
									<input class="m-5" type="submit" value="Cancel" name="submit">
								</div>
							</div>
					</div>
			</div>
		</section>
</form>
</div>
<?php
/*if(isset($_POST['submit']) && $_POST['submit'] === 'Cancel'){
	$result1 = mysqli_query($conn,$query1);
	
	/*echo "<script type='text/javascript'>alert('<?php echo $room_no ?>')</script>";
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
		/*echo "<script type='text/javascript'>alert('<?php echo $result3; ?>')</script>";
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
   
}*/
if (isset($_POST['submit']) && $_POST['submit'] === 'Cancel') {
	// process form data
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// Get the array of selected checkbox values
		$selected_rows = isset($_POST['selected_rows']) ? $_POST['selected_rows'] : array();
		// print_r($selected_rows);
		foreach($selected_rows as $selected) { // loop through the array
			// $selected contains the value of the selected checkbox
			// echo "Selected row: ".$selected."<br>";
			//Get the mobile number of the student to send message //
			$query11 = "SELECT * FROM Student where Student_id = '$selected' ";
			
			$result11 = mysqli_query($conn,$query11);
    		$row11 = mysqli_fetch_assoc($result11);
    		$phone_number = "+91" .$row11['Mob_no'];
			$name = $row11['Fname'] . " " . $row11['Lname'];
			$studentID = $selected;
			$message = "Dear " . $name . " STUDENT ID ". $studentID . PHP_EOL . ". Your Application has been canceled by the Manager of IIITK. \n For any query contact to the Manager. \n Best Wishes \nIndian Institute of Information Technology Kalyani";
			
			// Do something with the selected row, such as deleting it from the database
			$query = "DELETE FROM Application WHERE Student_id = '$selected'";
			$result6 = mysqli_query($conn, $query);
			if($result6){
				mysqli_commit($conn);
// <!--  *****************************************************************************************************  -->
				// see https://getcomposer.org/doc/01-basic-usage.md
				require_once 'vendor/autoload.php';
				$sid    = "";
				$token  = "";
				$twilio = new Twilio\Rest\Client($sid, $token);
				$from = "";
				$message = $twilio->messages
				->create($phone_number, // to
				array(
					"from" => $from,
					"body" => $message
					)
				);
				echo "Row with ID $selected was successfully deleted.";		
				print($message->sid);
// <!--  *****************************************************************************************************  -->
			}else{
				echo "Row with ID $selected not found.";
				mysqli_rollback($conn);
			}
		}
	  }
}

static $x = 1;
static $y = 1;
static $room_no = 0;
static $room_id = 0;
static $curr_room_no;
static $no_of_students;
if (isset($_POST['submit']) && $_POST['submit'] === 'Allocate') {
    // form was submitted with the "Allocate" button
	echo "Allocate pressed";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// Get the array of selected checkbox values
		$selected_rows = isset($_POST['selected_rows']) ? $_POST['selected_rows'] : array();
		// print_r($selected_rows);
		foreach($selected_rows as $selected) { // loop through the array
		  // $selected contains the value of the selected checkbox
		  echo "Selected row: ".$selected."<br>";
		  //Get the mobile number of the student to send message //
		  	$query111 = "SELECT * FROM Application where Student_id = '$selected' ";

			$result111 = mysqli_query($conn,$query111);
    		$row111 = mysqli_fetch_assoc($result111);
    		$phone_number = $row111['Mob_no'];
			$student_id = $selected;
			$hostel_id = $row111['Hostel_id'];
			echo "hostel id = $hostel_id";

			// Find the minimum available room number for the hostel
			// Initialize the room no and room id
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
		$query3 = "UPDATE Application SET Application_status = '0',Room_No = '$room_no' WHERE Student_id = '$selected'";
		$result3 = mysqli_query($conn,$query3);
		$query4 = "UPDATE Student SET Hostel_id = '$hostel_id',Room_id = '$room_id' WHERE Student_id = '$selected'";
		$result4 = mysqli_query($conn,$query4);
		$query5 = "UPDATE Room SET Allocated = '1' where Room_id = '$room_id'";
		$result5 = mysqli_query($conn,$query5);
		/*echo "<script type='text/javascript'>alert('<?php echo $result3; ?>')</script>";*/
		if($result3 && $result4 && $result5){
			mysqli_commit($conn);
			echo " Student Updated Sending Message";
			// Send an SMS message to the student's mobile number with the allocated room number
			// see https://getcomposer.org/doc/01-basic-usage.md
			// require_once 'vendor/autoload.php';
			// $sid    = "";
			// $token  = "";
			// $twilio = new Twilio\Rest\Client($sid, $token);
			// $from = "";
			// $message = $twilio->messages
			// ->create($phone_number, // to
			// array(
			// 	"from" => $from,
			// 	"body" => $message
			// 	)
			// );
			// print($message->sid);
			// if($message['success']){
			// 	echo "<script type='text/javascript'>alert('Rooms Allocated Successfully. SMS sent to the student with room number.')</script>";
			// }
			echo "<script type='text/javascript'>alert('Rooms Allocated Successfully')</script>";
			header("Location: allocate_room.php");
		}
		else{
			echo "<script type='text/javascript'>alert('Failed to allocate Rooms')</script>";
			mysqli_rollback($conn);
		}
			/*$query22 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id' AND current_no_of_rooms < No_of_rooms ";
			$result22 = mysqli_query($conn,$query22);
			if(!$result22){
				echo "<script type='text/javascript'>alert('Rooms not available Finding for empty room')</script>";
				$query2 = "SELECT * FROM Room WHERE Room_No = (SELECT MIN(Room_No) FROM Room WHERE  Allocated = '0' AND Hostel_id = '$hostel_id')";
				$result2 = mysqli_query($conn,$query2);
				if(!$result2){
					echo "<script type='text/javascript'>alert('All the rooms are filled')</script>";
					exit();
				}else{
					$row2 = mysqli_fetch_assoc($result2);
					$room_no = $row2['Room_No']++;
					$room_id = $row2['Room_id']++;
					echo "Got room from Room DB \nStudent room_no =  $room_no and room_id = $room_id  and stuedent_id = $student_id ";
				}
			}else{
				$row22 = mysqli_fetch_assoc($result22);
				$curr_room_no = ++$row22['current_no_of_rooms'];
				$no_of_students = ++$row22['No_of_students'];
				$room_no = $x++;
				$room_id = $y++;
				echo "Got room from Hostel DB \nStudent room_no =  $room_no, room_id = $room_id, curr_room_no = $curr_room_no, no_of_students = $no_of_students  and stuedent_id = $student_id ";
			}
			// Update the Application and Student tables with the allocated room number
			$query3 = "UPDATE Application SET Application_status = '0' , Room_No = '$room_no' WHERE Student_id = '$student_id'";
			$result3 = mysqli_query($conn,$query3);
			if($result3){
				echo "Application : \nStudent room_no =  $room_no and room_id = $room_id  and stuedent_id = $student_id ";
				$query5 = "UPDATE Room SET Allocated = '1' WHERE Room_id = '$room_id'";
				$result5 = mysqli_query($conn,$query5);
				if($result5){
					echo "Room Updated";
					$query41 = " UPDATE Student SET Hostel_id = '$hostel_id' , Room_id = '$room_id' WHERE Student_id = '$student_id' ";
					$result41 = mysqli_query($conn,$query41);
					if($result41){
						echo " Student Updated Sending Message";
						// Send an SMS message to the student's mobile number with the allocated room number
						// see https://getcomposer.org/doc/01-basic-usage.md
						// require_once 'vendor/autoload.php';
						// $sid    = "";
						// $token  = "";
						// $twilio = new Twilio\Rest\Client($sid, $token);
						// $from = "";
						// $message = $twilio->messages
						// ->create($phone_number, // to
						// array(
						// 	"from" => $from,
						// 	"body" => $message
						// 	)
						// );
						// print($message->sid);
						// if($message['success']){
						// 	echo "<script type='text/javascript'>alert('Rooms Allocated Successfully. SMS sent to the student with room number.')</script>";
						// }
					}
				}
				else{
					echo "<script type='text/javascript'>alert('Failed to update student Allocated room')</script>";
				}
			}
			else{
				echo "<script type='text/javascript'>alert('Failed to allocate Rooms')</script>";
			}*/
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

