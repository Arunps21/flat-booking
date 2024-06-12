<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
       "fname"=>"", "fimage"=>"","flocation"=>"","cid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('fname'=>"flat Name",'fimage'=>"Flat Image",'flocation'=>"Flat Location",'cid'=>"Category Name");

$rules=array(
    "fname"=>array("required"=>true),
    "fimage"=>array("filerequired"=>true),
    "flocation"=>array("required"=>true),
    "cid"=>array("required"=>true)
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['fimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {

$data=array(

       
        'fimage'=>$fileName,
        'fname'=>$_POST['fname'],
        'flocation'=>$_POST['flocation'], 
        'cid'=>$_POST['cid']
        
         
    );

    print_r($data);
  
    if($dao->insert($data,"flat"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>


<?php
    
}
else
echo $file->errors();
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

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
<span style="color:red;"><?= $validator->error('fimage'); ?></span>

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
<br>



<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>

