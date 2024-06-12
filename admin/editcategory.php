<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','category','cid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "cname"=>$info[0]['cname'],"cimage"=>$info[0]['cimage']);

	$form = new FormAssist($elements,$_POST);

$labels=array('cname'=>"Category Name",'cimage'=>"Category Image");

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "cimage"=>array("filerequired"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['cimage']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg','.webp'),100000,5,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

        'cname'=>$_POST['cname'],
        
    );
  $condition='cid='.$_GET['id'];
if(isset($flag))
			{	
        $data['cimage']=$fileName;
		
			}
    

if($dao->update($data,'category',$condition))
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
Category Name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Category Image:


<?= $form->fileField('cimage',array('class'=>'form-control')); ?>

</div>
</div>





<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>