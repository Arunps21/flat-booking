

<?php	
include("dbcon.php");
$cid = $_GET['id'];
$sql = "update category set status=2 where cid=".$cid;

$conn->query($sql);

 header('location:viewcategory.php');



?>

