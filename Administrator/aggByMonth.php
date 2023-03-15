<div id="aggbymonth" class="modal hide fade in active" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal">
			<p id="demo"></p>


			<div class="alert badge-inverse"><strong style="color:white">Aggregate Report By Month</strong></div>
	
	<form class="form-horizontal" role="form" method="post" action="reportAggByMon.php">
	
	<div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-inverse disabled">Report Title</button></label>
				<div class="controls">
				<input type="text" name="title" id="Report_Title" placeholder="Report_Title" maxlength="100"  required>
				</div>
	</div>
	
		    <div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse	disabled">From:</button></label>
				<div class="controls">
			 
      
          
<script>
function aggByMonth(str) {
  if (str=="") {
    document.getElementById("aggBMo").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("aggBMo").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","ajaxAggByMon.php?agg="+str,true);
  xmlhttp.send();
}
</script>

          
  <?php

$sql="SELECT month_no FROM month_tb ";
$month_no=mysql_query($sql);
     ?>
  
<select name="month1" onchange="aggByMonth(this.value)" required>
    
    <option value="" ></option>
      <?php while($myMonth=mysql_fetch_array($month_no)){  ?>
      
    <option value="<?php echo $myMonth[0]; ?>"><?php echo $myMonth[0]; ?> </option>
                 
              
               <?php 
             
             }  
             ?>
             
               </select>
      
        </div>
    

      </div>

     <div class="control" id="aggBMo"><b>.</b></div>			
	
	<div class="control-group">
	
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse disabled">Year</button></label>
				<div class="controls">
					 <select class="form-control" name="year" required>
              <option value="">Select Year</option>          
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
               <option value="2017">2018</option>
                <option value="2017">2019</option>
                 <option value="2017">2020</option>
                  <option value="2017">2021</option>
                   <option value="2017">2022</option>
              </select>
				</div>					
			</div>
		
			<div class="control-group">
				<div class="controls">
				<button type="submit" name="Report" class="alert badge-inverse"><i class="icon-save icon-large"></i>&nbsp; Preview Aggregate Report</button>
				</div>
			</div>
			<div class="modal-footer">
			<button class="alert badge-inverse" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </form>
		</div>
		
    </div>
 
