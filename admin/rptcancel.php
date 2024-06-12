<?php include("header.php");	?>
<?php require('../config/autoload1.php'); 
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   
	   
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> CANCEL DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                <tr>
                        
                        <th>SI No</th>
                        <th>Apartment No</th>
                         <th>Category Name</th>
                        <th>Booking Date</th>
                    
                    </tr>
<?php
    
    $actions=array(
    
    
   // 'delete'=>array('label'=>'Cancel','link'=>'cancel.php','params'=>array('id'=>'bookingid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );

   $condition="status=3";
   
   $join=array(
       
    );  
	$fields=array('bid','aid','cname','bdate');

    $users=$dao->selectAsTable($fields,'booking as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


            <div class="row">
 <div class="col-md-3">


</div>

</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php  ?>