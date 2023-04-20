<?php
  require 'includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Vacate Rooms</title>
	
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

<?php
   $hostel_id = $_SESSION['man_hostel_id'];
   $query1 = "SELECT * FROM Hostel";
   if($_SESSION['isadmin']==0){
	   $query1 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
   }
   $result1 = mysqli_query($conn,$query1);
//    $row1 = mysqli_fetch_assoc($result1);
?>

<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Vacate Form </h2>
			<div class="mail_grid_w3l">
				<form action="vacate_rooms.php" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="roll_no" placeholder="Roll Number" required >
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel" placeholder="Hostel"  required>
								<!-- <select name="hostel" placeholder="Hostel" class="contact-fields-w3ls">
								<?php //while($row1 = mysqli_fetch_assoc($result1)){?>
								<option value="<?php //echo $row1['Hostel_name'];?>"><?php //echo $row1['Hostel_name'];?></option>
								<?php //}?>
								</select> -->
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="room_no" placeholder="Room Number" required="">
							</div>
						</div>
						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<input type="submit" name="submit" value="Click to Vacate">
						</div>
					</div>

				</form>
			</div>
		
	</div>
</section>
<?php
if(isset($_POST['submit'])){
	$roll = $_POST['roll_no'];
	$room_number =$_POST['room_no'];
	$hostel = $_POST['hostel'];

    $query2 = "SELECT * FROM Room NATURAL JOIN Hostel WHERE Hostel_name = '$hostel' and Room_No = '$room_number'";
    $result2 = mysqli_query($conn,$query2);
    if(mysqli_num_rows($result2)==0){
        echo "<script type='text/javascript'>alert('Incorrect Details')</script>";
        exit();
    }
    $row2 = mysqli_fetch_assoc($result2);
    if($row2['Allocated']=='0'){
    	echo "<script type='text/javascript'>alert('Room Not Allocated')</script>";
    	exit();
    }
    $room_id = $row2['Room_id'];
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
	$query3 = "SELECT * FROM Student NATURAL JOIN Hostel WHERE Student_id = '$roll' and Hostel_name = '$hostel' and Room_id = '$room_id'";
	$result3 = mysqli_query($conn,$query3);
    if(mysqli_num_rows($result3)==0){
        echo "<script type='text/javascript'>alert('Incorrect Details 2')</script>";
        exit();
    }
    $row3 = mysqli_fetch_assoc($result3);
	$query4 = "UPDATE Student SET Hostel_id = NULL, Room_id = NULL WHERE Student_id = '$roll'";
	$result4 = mysqli_query($conn,$query4);
	$query5 = "UPDATE Room SET Allocated = '0' WHERE Room_id = '$room_id'";
	$result5 = mysqli_query($conn,$query5);
	// $query6 = "DELETE FROM Application WHERE Student_id = '$roll'";
	// $result6 = mysqli_query($conn,$query6);
    if($result4 && $result5){
		echo "<script type='text/javascript'>alert('Vacated Successfully')</script>";
		mysqli_commit($conn);	
		$_SESSION['hostel_id']=NULL;
		$_SESSION['room_id']=NULL;
	}
	else{
		echo "<script type='text/javascript'>alert('Failed to vacate room')</script>";
		mysqli_rollback($conn);
	}
}


?>

<br><br><br>

<!-- footer -->
<?php include 'footer_manager.php';?>
<!-- footer -->

<!-- js-scripts -->

	<?php require 'js-scripts.php';?>

<!-- //js-scripts -->

</body>
</html>

