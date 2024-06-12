<?php
 include("userheader.php");
//session_start();
if(isset($_SESSION['email']))
{ 

	include("nav2.php");
}?>
<?php
require('../config/autoload.php'); 
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   $name=$_SESSION['email'] ;

   if(isset($_POST["home"]))
{
     header('location:header.php');
}
if(!isset($_SESSION['email']))
   {
	   header('location:login.php');
	   }
	   else
	   { 
	  
	   
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> BOOKING REPORT DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Category Name</th>
                        <th>Apartment No</th>
                      
                        
                        <th>Booking Date</th>
                    
                    </tr>
<?php
    
    $actions=array(
    
    
       // 'delete'=>array('label'=>'Cancel','link'=>'canceldoc.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success'))
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );

   $condition="email='".$name."' and status=2";
   
   $join=array(
       
    );  
	$fields=array('bid','cname','aid','bdate');

    $users=$dao->selectAsTable($fields,'booking as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


          
<form action="" method="POST" enctype="multipart/form-data">



</form>


            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php } ?>