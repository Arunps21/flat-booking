<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess;
?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Flat Id</th>
                        <th>Flat Name</th>
                        <th>Flat Image</th>
                        <th>Flat Location</th>
                        <th>Category Name</th>
                        
			
                        <th>Edit</th>
                        <th>Delete</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editflat.php','params'=>array('id'=>'fid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deleteflat.php','params'=>array('id'=>'fid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('fid'),
'actions_td'=>true,
         'images'=>array(
                        'field'=>'fimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
    );

   
   $join=array(
     'category as r'=>array('r.cid = f.cid','join'),
	
    );  
$fields=array('f.fid','f.fname','f.fimage','f.flocation','r.cname');

    $users=$dao->selectAsTable($fields,'flat as f','f.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
