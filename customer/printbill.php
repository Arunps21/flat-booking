<?php

 require('../config/autoload.php');
 include("userheader.php");
?>
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<?php  
 //session_start();

include("dbcon.php");

$dao=new DataAccess();
$name=$_SESSION['email'];
?>
<div class="row">
 <div class="col-md-12">
 <div class="table-responsive">
   
                                <table border="1"  id="printTable" style="width:100%" >
                                    <thead>
                                    <center> IDEAL HOMES </center>
                           <center> ANGAMALY </center>
                            <tr>
                             <th style="text-align:left">To: <?php echo $name; ?></th>
                               <th colspan="2" style="text-align:centre"> ADVANCE PAYMENT RECIPT </th>
                              <th colspan="2" style="text-align:right" >Date:<?php echo  date("Y/m/d"); ?></th>
                            </tr>
                           <tr>
                        <th>Category</th>
                        <th>Apartment</th>
                        
			<th>Rate</th>

<th>Advance</th>
</tr>
                      
                                    </thead>
                                    <tbody>
                                   
 <?php
$amt= $_SESSION['advance'];

$sql = "SELECT * FROM booking WHERE status=1 and email='$name'";
$result = $conn->query($sql);
$c=0;

if ($result->num_rows > 0) {


 // output data of each row
    while($row = $result->fetch_assoc()) {
		
		$c = $row["rate"] - $amt;
      echo "<tr> <td> "  . $row["cname"]. "</td> <td>"  . $row["aid"]. "</td> <td>" . $row["rate"]. "</td>  <td>" . $amt. "</td>  </tr>";
	  
      $sql11 =" UPDATE apartment SET astatus=2 WHERE aid=". $row["aid"] ; 
      $conn->query($sql11);
}
}

    echo "<tr> <td colspan='4'  style='text-align:right'>Total:</td><td> ", $amt, "</td></tr>";
	   ?>
       




</table>



<?php


$sql11 =" UPDATE booking SET status=2,balance='$c' WHERE status=1 and email='$name'" ;

if ($conn->query($sql11) === TRUE) {
	echo "<script> alert('Payment Sucessfully');</script> ";
	 
	
	 }
	 ?>
     <br /><br />

<input type="button" onclick="printData();" value="PRINT"  />

<a href="displaycategory.php">HOME</a>
</div>
</div>
</div>

</form>




