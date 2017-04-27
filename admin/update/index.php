<?php

ob_start();

include('../login/session.php');
include('../session.php');
?>
<html>
<head><title>i ADMIN</title>
<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap core CSS -->

	<link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/main.css" rel="stylesheet">
	<link href="../assets/css/v.css" rel="stylesheet">
	

<style>
table a:hover{background:aqua;text-decoration:none;}
</style>
	<script src="../assets/js/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('tr th:nth-child(1)').hide();
    			$('tr td:nth-child(1)').hide();
		});


	</script>

	<script language="javascript" type="text/javascript">
	      <!--
            	//Browser Support Code
	            function ajaxFunction(current_row,current_val,current_col)
			{



			if ($(".nonepty").val()=='') {
    alert("please enter anything");
}else{


	            	var ajaxRequest;  // The variable that makes Ajax possible!
               		try
				{
		                  // Opera 8.0+, Firefox, Safari
            		      ajaxRequest = new XMLHttpRequest();
               		}
  		            catch (e)
				{
		                  // Internet Explorer Browsers
            		      try
					{
				            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  		}
                              catch (e) 
					{
				            try
						{
		 	                       ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     			}
                                    catch (e)
						{
			                        // Something went wrong
			                        alert("Your browser broke!");
                   				return false;
			                  }
		                  }
		            }
             		// Create a function that will receive data 
               		// sent from the server and will update
               		// div section in the same page.
				ajaxRequest.onreadystatechange = function()
				{
		                  if(ajaxRequest.readyState == 4){
            		      var ajaxDisplay = document.getElementById('ajaxDiv');
                     		ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  	}
               	}
               	// Now get the value from user and pass it to
              	// server script.
			var total_len=document.getElementById('imp_ref_len').value;	
			/*	alert(current_row);alert(current_val);alert(current_col);*/
			var queryString = "?wrecord=" + current_row ;
                  queryString +=  "&wcolumn=" + current_col + "&wvalue=" + current_val;
			
	            ajaxRequest.open("GET", "updateoperation.php" + queryString, true);
      	      ajaxRequest.send(null); 

            }
         	}//-->
      </script>
</head>
<body>
	<div class="row affix-row">
		<?php require('../side.php');?>
		<div class="col-sm-9 col-md-10 affix-content">
			<div class="container">
				<div class="page-header">
					<?php
						$num_rec_per_page=5;
						include('../connection.php');
						$connection = new createConnection(); 			//created a new object
						$connection_ref = $connection->connectToDatabase();
						// $connection->selectDatabase();				//selecting db
						$selected_table_name=$_SESSION["tblname"];
						$sql="select * from content_edit";
						$result=mysqli_query($connection_ref,$sql);

					?><br>
					
				</div>


	<table class="table table-bordered">
				
					<tr>
						<th>name</th>
						<th>view</th>
						<th>edit</th>
					</tr>

					<?php
						while($row=mysqli_fetch_array($result))
						{
					?>
					<tr>
						<td></td>
						<td><?php echo $row["0"];?></td>
						<a href="edit.php" class="btn btn-danger">edit</a>
						<td>
						<a href="edit.php" class="btn btn-danger">edit</a>
						</td>


					</tr>



					 <?php  
                               }  
                               ?> 

				</table>


						<!-- add data moda; -->

						
									
				<div id="data_Modal" class="modal fade">  
			      <div class="modal-dialog">  
			           <div class="modal-content">  
			                <div class="modal-header">  
			                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
			                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
			                </div>  
			                <div class="modal-body">  
			                     <form method="post" id="insert_form">  
			                        <label>Enter dec2</label>
			                        <input type="text" name="description1" id="description1" placeholder="dec2"> </input>

			                         <label>Enter dec3</label>
			                        <input type="text" name="description2" id="description2" placeholder="dec3"> </input>

			                         <label>Enter dec4</label>
			                        <input type="text" name="description3" id="description3" placeholder="dec4"> </input>

			                         <label>Enter dec6</label>
			                        <input type="text" name="description4" id="description4" placeholder="de55"> </input>

			                         <label>Enter dec7</label>
			                        <input type="text" name="our_code1" id="our_code1" placeholder="dec7"> </input>

			                         <label>Enter dec8</label>
			                        <input type="text" name="our_code2" id="our_code2" placeholder="dec8"> </input>

			                         <label>Enter dec9</label>
			                        <input type="text" name="about_us" id="about_us" placeholder="dec9"> </input>

			                     </form>  
			                    </div> 
			                </div>  
			                <div class="modal-footer">  
			                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
			                </div>  
			           </div>  
			      </div>


							<?php 
								$sql = "SELECT * FROM ".$selected_table_name; 
								$rs_result = mysqli_query($connection_ref,$sql); //run the query
								$total_records = mysqli_num_rows($rs_result);  //count number of records
								$total_pages = ceil($total_records / $num_rec_per_page); 
							?>
							<button class="btn btn-warning disabled" type="button" style="background:#ec971f;"><?php echo $selected_table_name; ?> has <span class="badge"><?php echo $total_records; ?></span> entries</button>
							<ul class="pagination pagination-sm pull-right">
								<?php
									echo "<li><a href='index.php?page=1'>".'|'."<span class='glyphicon glyphicon-chevron-left'></span></a></li> "; // Goto 1st page
									for ($i=1; $i<=$total_pages; $i++)
									{ 
            								echo "<li><a href='index.php?page=".$i."'>".$i."</a></li> "; 
									} 
									echo "<li><a href='index.php?page=$total_pages'><span class='glyphicon glyphicon-chevron-right'></span>".'|'."</a> </li>"; // Goto last page
								?>
							</ul>
						</div>
					</div>
				</p>
			</div>
		</div>
	</div></

	<script src="../assets/js/bootstrap.js"></script>
<script>
$(document).ready(function() {
    $("#MyModal").modal();
  });

</script>
<script type="text/javascript">
	
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("index");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{idx:idx},  
                dataType:"json",  
                success:function(data){  
                     $('#description1').val(data.description1);  
                     $('#description2').val(data.description2);  
                     $('#description4').val(data.description3);  
                     $('#description4').val(data.description4);  
                     $('#our_code1').val(data.our_code1);  
                     $('#our_code2').val(data.our_code2);  
                     $('#about_us').val(data.obout_us);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });
</script>
</body>
</html>