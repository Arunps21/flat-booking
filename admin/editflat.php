<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','flat','fid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "fname"=>$info[0]['fname'],"fimage"=>$info[0]['fimage'],"flocation"=>$info[0]['flocation'],"cid"=>$info[0]['cid']);

	$form = new FormAssist($elements,$_POST);

$labels=array('fname'=>"flat Name",'fimage'=>"Flat Image",'flocation'=>"Flat Location",'cid'=>"Category Name");

$rules=array(
    "fname"=>array("required"=>true),
    "fimage"=>array("filerequired"=>true),
    "flocation"=>array("required"=>true),
    "cid"=>array("required"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['fimage']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['fimage'],array('.jpg','.png','.jpeg','.webp'),100000,5,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

    'fname'=>$_POST['fname'],
    'flocation'=>$_POST['flocation'], 
    'cid'=>$_POST['cid']
        
    );
  $condition='fid='.$_GET['id'];
if(isset($flag))
			{	
        $data['fimage']=$fileName;
		
			}
    

if($dao->update($data,'flat',$condition))
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
Flat Name:

<?= $form->textBox('fname',array('class'=>'form-control')); ?>
<?= $validator->error('fname'); ?>


</div>
</div>


<div class="row">
                    <div class="col-md-6">
Flat Image:


<?= $form->fileField('fimage',array('class'=>'form-control')); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Flat Location:

<?= $form->textBox('flocation',array('class'=>'form-control')); ?>
<?= $validator->error('flocation'); ?>

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




<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>