
<?php	
include("dbcon.php");
$aid = $_GET['id'];
$sql = "update apartment set astatus=2 where  aid=".$aid;

$conn->query($sql);

 header('location:viewapartment.php');



?>

