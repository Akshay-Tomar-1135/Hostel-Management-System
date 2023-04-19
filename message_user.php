<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Message Recieved</title>
	
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
	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>
<style type="text/css">
	.card-header{
		padding: 15px;
		font-size: 30px;
	}
	.card-body{
		padding: 15px;
	}
	.card-footer{
		text-align: left;
		padding: 15px;
	}
</style>

<body>
	   
<!--Header-->
<?php include 'header.php';?>
<!--Header-->

<?php
    $roll_no = $_SESSION['roll'];
    $query = "SELECT * FROM Message WHERE receiver_id ='$roll_no'";
    $result = mysqli_query($conn,$query);

    while ($row = mysqli_fetch_assoc($result)){  
    	$hostel_id = $row['hostel_id'];
    	$query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
       $result6 = mysqli_query($conn,$query6);
       $row6 = mysqli_fetch_assoc($result6);
       $hostel_name = $row6['Hostel_name'];
          ?> 

    <div class="container">
      <div class="card">
      <div class="card-header"><b><?php echo $row['subject_h']; ?></b></div>
      <div class="card-body"><?php echo $row['message']; ?></div> 
      <div class="card-footer"><?php echo $hostel_name." Hostel Manager"; ?><span style="float: right"><?php echo $row['msg_date']." ".$row['msg_time']; ?></span></div>
  </div>
</div>
<br><br>
             
    <?php
	}
?>

<br>
<br>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- footer -->

<!-- js-scripts -->		

	<?php require 'js-scripts.php';?>
	
<!-- //js-scripts -->

</body>
</html>
