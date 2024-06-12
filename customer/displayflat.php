

<?php  
//session_start();
if(isset($_SESSION['email']))
{ 	
	include("userheader2.php");
}
else
{
	include("userheader.php");
}
?>

<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>


	
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php    
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>

<?php } ?>
				 <h3 class="title-w3-agileits title-black-wthree">FLATS</h3>
						<div class="priceing-table-main">
            <?php
			
			$cid=$_GET['id']; 
			 $q="select * from flat where status=1 and cid=".$cid ;

$info=$dao->query($q);
							if($info==null){}
							else{

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["fimage"];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[$i]["fimage"]; ?> alt=" " class="img-responsive" />
							<?php ?>
                              <h4><?php echo $info[$i]["fname"]?></h4> 
							  <h5><?php echo $info[$i]["flocation"]?></h5>
                           
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>

								     </ul>
							</div>
							<div class="price-selet">
                            
			<a href="displayapartment.php?id=<?= $info[$i]["fid"]?>" >VIEW</a>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} }?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	
		<?php include("userfooter.php");	?>
	