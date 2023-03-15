<div id="print_selected_establishments" class="modal hide fade" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
				<div class="alert btn-danger"><strong style="color:white">Generating Establishment ID AND Name Based on Zoba</strong></div>
	<form class="form-horizontal" method="post" action="print_establishment.php">
			
		
				<div class="control-group">
				<label class="control-label" for="inputEmail">Select Zoba</label>
				<div class="controls">
					
	                                                    <?php
                                                        $query1=mysql_query("SELECT * from zobas  ");
                                                        ?>	
                                               <select name='zoba' required>
                                               <option value="" ></option>
	                                           <?php while($row=mysql_fetch_array($query1)){  ?>
		  	                                   <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?> </option>
	                                             <?php  }  
						 ?>
						 
						   </select>
				</div>
			</div>
	
	

			
			<div class="control-group">
				<div class="controls">
				<button name="MOM" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Generate</button>
				</div>
			</div>




		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
   </form>
   </div>
	
      
<script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
			</script>

<?php
	if(isset($_POST['MOM']))
	{
$zoba=$_POST['zoba'];
session_start();
$_SESSION['print']=	$zoba;
header("location:print_establishment.php");
	}
		?>