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

						while($row=mysqli_fetch_array($result))
						{

					?>


	<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" id="submit_form" >
			<h2>Edit The Data</h2>
         
			<div class="form-group">
			<input type="text" name="description1" id="description1" value="<?php echo $row[1]; ?>" placeholder="<?php echo $row[1]; ?>" class="form-control">
			
		</div>
		<div class="form-group">
			<input type="text" name="description2" id="description2"  value="<?php echo $row[2]; ?>"placeholder="<?php echo $row[2]; ?>" class="form-control" >
		</div>
		<div class="form-group">
			<input type="text" name="description3" id="description3"  value="<?php echo $row[3]; ?>" placeholder="<?php echo $row[3]; ?>" class="form-control" >
		</div>
		<div class="form-group">
			<input type="text" name="description4" id="description4"  value="<?php echo $row[4]; ?>"placeholder="<?php echo $row[4]; ?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" name="our_code1" id="our_code1"  value="<?php echo $row[5]; ?>"placeholder="<?php echo $row[5]; ?>" class="form-control" >
		</div>
		<div class="form-group">
			<input type="text" name="our_code2" id="our_code2"  value="<?php echo $row[6]; ?>"placeholder="<?php echo $row[6]; ?>" class="form-control" >
		</div>
		<div class="form-group">
			<input type="text" name="about_us" id="about_us"  value="<?php echo $row[7]; ?>"placeholder="<?php echo $row[6]; ?>" class="form-control" >
		</div>
		<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
		<a href="../index.php"  name="" class="effect6 btn btn-danger" >Go back to main panel</a>  
                     <span id="error_message" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span>  

		<?php }?>
     
	</div>
</div>


			                












<script >
	$(document).ready(function(){  
      $('#submit').click(function(){  
           var description_1 = $('#description1').val();  
           var description_2 = $('#description2').val();  
           var description_3=$('#description3').val(); 
           var description_4=$('#description4').val(); 
           var our_code_1=$('#our_code1').val(); 
           var our_code_2=$('#our_code2').val(); 
           var about_us=$('#about_us').val(); 
           if(description_1 == '' || description2== '' )  
           {  
                $('#error_message').html("All Fields are required");  
           }  
           else  
           {  
                $('#error_message').html('');  
                $.ajax({  
                     url:"update.php",  
                     method:"POST",  
                     data:{description_1:description_1, description_2:description_2,
                     	description_3:description_3,
                     	description_4:description_4,
                     	our_code_1:our_code_1,
                     	our_code_2:our_code_2,
                     	about_us:about_us},  
                     success:function(data){  
                          $("form").trigger("reset");  
                          $('#success_message').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#success_message').fadeOut("Slow");  
                          }, 4000);  
                     }  
                });  
           }  
      });  
 });  

</script>






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