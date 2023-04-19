<?php
  require 'includes/config.inc.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Empty Rooms</title>
	
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
				<form action="empty_rooms.php" method="post">
					<div class="row">
						<div class="col-md-9"> 
						<input type="text" placeholder="Search by Room Number" name="search_box">
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
	if(isset($_POST['search'])) {
		$search_box = $_POST['search_box'];
		/*echo "<script type='text/javascript'>alert('<?php echo $search_box; ?>')</script>";*/
		$hostel_id = $_SESSION['man_hostel_id'];
		$query_search = "SELECT * FROM Room NATURAL JOIN Hostel WHERE Room_No like '%$search_box%' and Allocated = '0'";
		if($_SESSION['isadmin']==0){
			$query_search = "SELECT * FROM Room NATURAL JOIN Hostel WHERE Room_No like '%$search_box%' and Hostel_id = '$hostel_id' and Allocated = '0'";
			// $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
			// $result6 = mysqli_query($conn,$query6);
			// $row6 = mysqli_fetch_assoc($result6);
			// $hostel_name = $row6['Hostel_name'];
		}
		$result_search = mysqli_query($conn,$query_search);

		?>
   	   	<div class="container">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Hostel Name</th>
						<th>Room Number</th>
					</tr>
    			</thead>
    <tbody>
    <?php
   	   if(mysqli_num_rows($result_search)==0){
   	   	  echo '<tr><td colspan="4">No Rows Returned</td></tr>';
		}
		else{
			while($row_search = mysqli_fetch_assoc($result_search)){
				//select the hostel name from hostel table
				// if($_SESSION['isadmin']==1){
				// 	$hostel_id = $row_search['Hostel_id']
				// 	$query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
				// 	$result6 = mysqli_query($conn,$query6);
				// 	$row6 = mysqli_fetch_assoc($result6);
				// 	$hostel_name = $row6['Hostel_name'];
				// }
				
      			echo "<tr><td>{$row_search['Hostel_name']}</td><td>{$row_search['Room_No']}</td></tr>\n";
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
<h2 class="heading text-capitalize mb-sm-5 mb-4"> Empty Rooms </h2>
<?php
   $hostel_id = $_SESSION['man_hostel_id'];
   $query1 = "SELECT * FROM Room NATURAL JOIN Hostel WHERE Allocated = '0'";
	if($_SESSION['isadmin']==0){
		$query1 = "SELECT * FROM Room NATURAL JOIN Hostel WHERE Hostel_id = '$hostel_id' and Allocated = '0'";
		// $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
		// $result6 = mysqli_query($conn,$query6);
		// $row6 = mysqli_fetch_assoc($result6);
		// $hostel_name = $row6['Hostel_name'];
	}
//    $query1 = "SELECT * FROM Room where Hostel_id = '$hostel_id' and Allocated = '0'";
   $result1 = mysqli_query($conn,$query1);
//    //select the hostel name from hostel table
//    $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
//    $result6 = mysqli_query($conn,$query6);
//    $row6 = mysqli_fetch_assoc($result6);
//    $hostel_name = $row6['Hostel_name'];


?>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Hostel Name</th>
        <th>Room Number</th>
      </tr>
    </thead>
    <tbody>
    <?php
		if(mysqli_num_rows($result1)==0){
			echo '<tr><td colspan="4">No Rows Returned</td></tr>';
		}
      	else{
			while($row1 = mysqli_fetch_assoc($result1)){
				//select the hostel name from hostel table
				// if($_SESSION['isadmin']==1){
				// 	$hostel_id = $row_search['Hostel_id']
				// 	$query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
				// 	$result6 = mysqli_query($conn,$query6);
				// 	$row6 = mysqli_fetch_assoc($result6);
				// 	$hostel_name = $row6['Hostel_name'];
				// }
				echo "<tr><td>{$row1['Hostel_name']}</td><td>{$row1['Room_No']}</td></tr>\n";
			}
      	}
    ?>
    </tbody>
  </table>
</div>
<br>
<br>
<br>

<!-- footer -->
<?php include 'footer_manager.php';?>
<!-- footer -->

<!-- js-scripts -->

	<?php require 'js-scripts.php';?>

<!-- //js-scripts -->

</body>
</html>

