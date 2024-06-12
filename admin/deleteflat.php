

<?php	
include("dbcon.php");
$fid = $_GET['id'];
$sql = "update flat set status=2 where  fid=".$fid;

$conn->query($sql);

 header('location:viewflat.php');



?>

