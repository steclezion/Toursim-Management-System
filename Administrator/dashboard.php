<?php include('header.php'); ?>
<?php include('session.php'); ?>
<!DOCTYPE html>
<html>

<?php include('navbar_dashboard.php'); ?>
<body>

<!DOCTYPE html>
<html lang="en">

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
	  background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
<body>
<br/><br/><br/>
<div class="jumbotron">
  <div class="container text-center">
   <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">	<img src="Toursim/Logo.jpg" alt="Toursim Logo"></div>
      <div class="panel-body">RESERVED FOR STASTICAL UNIT
	  
	  	<div class="col-md-8">
    	<div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
                                <div id="notice_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
    </div>
</div>
    <h1>TOURISM MANAGEMENT</h1>      
    <p>PERSON LOGED IN <div class="alert alert-danger"><?PHP $Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
							   $year=date('Y', strtotime($Today));
						
								$id=$_SESSION['id'];$query=mysql_query("select First_name,Middle_Name,Last_Name from users where id='$id' ");   
								$fetch=mysql_fetch_array($query); echo  $fetch[0]." ".$fetch[1]." ".$fetch[ 2]." ". $new;  ?></div></p>
  </div>
</div>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_store&stacked=h by HTTrack Website Copier/3.x [XR&CO'2010], Sat, 02 Apr 2016 18:57:03 GMT -->
</html>
<br><br/><br/>
 <?php 
	
	
	//include("footer.php");
	
	
	?>
	<br>
	 <script>
  $(document).ready(function() {
	  
	  var calendar = $('#notice_calendar');
				
				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'today prev,next'
					},
					
					//defaultView: 'basicWeek',
					
					editable: true,
					firstDay: 1,
					height: 530,
					droppable: false,
					
					events: [
						<?php 
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						{
							title: "<?php echo $row['notice_title'];?>",
							start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
							end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>) 
						},
						<?php 
						endforeach
						?>
						
					]
				});
	});
  </script>

  