<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Apartment Id</th> 
                        <th>Rate</th>                    
                        <th>Apartment Image</th>
                        <th>Category Name</th>
                        <th>Floor</th>
                        <th>Flat Name</th>
                        <th>Edit/Delete</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editapartment.php','params'=>array('id'=>'aid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deleteapartment.php','params'=>array('id'=>'aid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('aid'),
'actions_td'=>false,
         'images'=>array(
                        'field'=>'aimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
    );

   
   $join=array(
    'category as c' => array('c.cid = a.cid', 'join'),
    'flat as f' => array('f.fid = a.fid', 'join')
    );  
$fields=array('aid','rate','aimage','c.cname','floor','f.fname');

    $users=$dao->selectAsTable($fields,'apartment as a','astatus=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
