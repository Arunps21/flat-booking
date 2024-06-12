<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','apartment','aid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "rate"=>$info[0]['rate'],"aimage"=>$info[0]['aimage'],"cid"=>$info[0]['cid'],"floor"=>$info[0]['floor'],"fid"=>$info[0]['fid']);

	$form = new FormAssist($elements,$_POST);

$labels=array('rate'=>"Apartment Rate",'aimage'=>"Apartment Image",'cid'=>"Category Name",'floor'=>"Floor Number",'fid'=>"Flat Name");

$rules=array(
    "rate"=>array("required"=>true),
    "aimage"=>array("filerequired"=>true),
    "cid"=>array("required"=>true),
    "floor"=>array("required"=>true),
    "fid"=>array("required"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['aimage']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['aimage'],array('.jpg','.png','.jpeg','.webp'),100000,5,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

    'rate'=>$_POST['rate'],   
    'cid'=>$_POST['cid'], 
    'floor'=>$_POST['floor'],
    'fid'=>$_POST['fid']
        
    );
  $condition='aid='.$_GET['id'];
if(isset($flag))
			{	
        $data['aimage']=$fileName;
		
			}
    

if($dao->update($data,'apartment',$condition))
    {
        $msg="Successfullly Updated";
        //header('location:viewdepartment.php');

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
Apartment Rate:

<?= $form->textBox('rate',array('class'=>'form-control')); ?>
<?= $validator->error('rate'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Apartment Image:


<?= $form->fileField('aimage',array('class'=>'form-control')); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Category Name:

<?php
     $options = $dao->createOptions('cname','cid',"category");
     echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cid'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Floor:

<?= $form->textBox('floor',array('class'=>'form-control')); ?>
<?= $validator->error('floor'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Flat Name:

<?php
     $options = $dao->createOptions('fname','fid',"flat");
     echo $form->dropDownList('fid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('fid'); ?>

</div>
</div>




<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>