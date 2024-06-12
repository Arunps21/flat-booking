<head>
      
    <script>
function showtotal() {
//alert(str);
	  var price=document.getElementById("price").value;  
	   var qty=document.getElementById("qty").value; 
	   var total=price*qty; 
	   //alert(total);
	   document.getElementById("total").value = total;
}
</script>
    
</head>

<body>
<?php require('../config/autoload.php'); ?>
<?php include("userheader.php");
include("dbcon.php");
if(isset($_SESSION['email']))
{ 
//include("nav2.php");
}

$name="";
$dao=new DataAccess();

if(isset($_POST["btn_insert"]))
{
if(!isset($_SESSION['email']))
   {
    echo"<script> location.replace('login.php'); </script>";
  }
  else
  {
    
$email=$_SESSION['email'];
$cname= $_SESSION['cname'];

$aid = $_GET['id'];
$q10="select * from apartment where aid=".$aid ;
$info=$dao->query($q10);
$rate = $info[0]["rate"];
$id11=$info[0]["cid"];


$q11="select * from category where cid=".$id11 ;
$info11=$dao->query($q11);
$cname = $info11[0]["cname"];


$advance = $_POST["advance"];
$astatus=1;
$bdate=date('Y-m-d',time());
$sql = "INSERT INTO booking(bdate,email,aid,rate,advance,balance,cname) VALUES ('$bdate','$email','$aid','$rate','$advance','$balance','$cname')";
$_SESSION['advance']=$advance; 
$conn->query($sql);
echo $sql;
echo"<script> location.replace('payment.php?tot=$advance'); </script>";
}
}

if(isset($_POST["btn_home"]))
{
    echo"<script> location.replace('index.php'); </script>";
}

$itid=$_GET['id']; 

$q="select * from apartment where aid=".$itid ;
$info=$dao->query($q);

?>

<div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Product Details</h1>
               
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                        <div id="success"></div>
<form action="" method="POST" enctype="multipart/form-data">

 <div class="upper">
        <div class="upper-left">
         <h3> <label for="name"><?php echo $info[0]["aid"]; ?></label><br> </h3>
            <img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[0]["aimage"]; ?> alt=" " class="img-responsive" />
        </div>
        <div class="content">
           
            <div style="display: block;">
               <br>
                <label for="price">Price:</label>
                <input id="price" name="offerprice" type="text" value="<?php echo $info[0]["rate"];  ?>" readonly style="margin-top: 8px;"><br>
           
                <label for="price">Advance Payment:</label>
                <input id="price" name="advance" value="10000"  readonly type="text"  ><br>
            </div>
        </div>
    <div class="lower">
        <div class="btn-grp">
                <button class="btn btn-primary py-2 px-3" name="btn_insert" id="btn-1">ORDER NOW</button>
                <button class="btn btn-primary py-2 px-3" name="btn_home" id="btn-2">Home</button>
                       
        </div>
    </div>
    </form>
   <strong> * NOTE:</strong> Pay 10000 as advance and balance amount after collecting the order.  
    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>