<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{
if($_GET['action']=='delete'){
$bsid=intval($_GET['bsid']);
$query=mysqli_query($con,"delete from tblfood where ID='$bsid'");
if($query){
unlink($ppicpath);
echo "<script>alert('Donating food details deleted successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-food-details.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}
?>


<!DOCTYPE html>
<head>
<title>Food For thought|| Manage Food Detail </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Food Details
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>Food Id</th>
            <th>Food Items</th>
            <th>Contact Person</th>
            <th> Mobile Number</th>
            <th>State Name</th>
            <th>City Name</th>
            <th>Listing Date</th>
            <th data-breakpoints="xs">Action</th>
           
           
          </tr>
        </thead>
        <?php
        $did=$_SESSION['pgasoid'];

$ret=mysqli_query($con,"select * from  tblfood where DonorID='$did'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
            <td><?php  echo $row['foodId'];?></td>
            <td><?php  echo $row['FoodItems'];?></td>
              <td><?php  echo $row['ContactPerson'];?></td>
              <td><?php  echo $row['CPMobNumber'];?></td>
                  <td><?php  echo $row['StateName'];?></td>
                  <td><?php  echo $row['CityName'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
                  <td><a href="edit-fooddetails.php?editid=<?php echo $row['ID'];?>&&requestid=<?php echo $row['foodId'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>||<a href="manage-food-details.php?action=delete&&bsid=<?php echo $row['ID']; ?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
            </table>
            
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>