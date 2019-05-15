<?php session_start();
    require_once('connection.php');
            
$date='';
    $date2='';
    
if(isset($_SESSION['user']))
{
	

?>


    <!doctype html>
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>upload</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

	


</head>
<style>
/*
        .wrapper {
            margin: 0 auto;
            width: 500px;
        }
*/
    .subject1
{
    height:1000px;
    font-size:14pt;
/*}
  .jumbotron{
    text-align: center;
    padding: 20px;
    color: whitesmoke;
    background-color: #8E24AA;
    border-radius: 0px;

    margin-bottom: 0px;

}*/
    .bg {
    background-color: #9370DB;
}
        .navbar-dark .navbar-nav .nav-link {
    rgb(147,112,219);
}

    </style>
<body background=whi.jpg>

        
 <div class="page-header">
       <nav class="navbar navbar-expand-sm bg-success navbar-dark">
  <ul class="navbar-nav mr-auto">
    <!--<li class="nav-item active">
      <a class="nav-link" >WELCOME</a>
    </li>-->
    <li class="nav-item" style="display:inherit">
        <a class="nav-link" href="dashboard.php"><b>HOME</b></a>
        <a class="nav-link newtask" ><b>+Add new task</b></a>
    </li>
    <!--<li class="nav-item">
      <a class="nav-link" href="leavereport.php"><b>LEAVE REPORT</b></a>
    </li>
      <li class="nav-item">
      <a class="nav-link" href="search.php"><b>SEARCH/PRINT REPORT</b></a>
    </li>-->
    

  </ul>
  
 <ul class="navbar-nav mr-auto"></ul>
  <ul class="nav navbar-nav navbar-right">
      <li>
      <a class="nav-link" href="logout.php"><b>LOGOUT</b></a>
    </li>
  </ul>

</nav>
      <br><br>
     
     
     
     
     
     <div class ="container"> 
     
         <div class="row">
                <div class="col">

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group row">
                            <label for="datepicker" class="col-sm-2 col-form-label">Select Date:</label>

                            <div id="datepicker" class="input-group date col-sm-3" data-date-format="dd-mm-yyyy">
                                <input class="form-control" name="searchdate" value="<?php echo $date; ?>">
                                <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <p>To</p>
                            <div id="datepicker2" class="input-group date col-sm-3" data-date-format="dd-mm-yyyy">
                                <input class="form-control" name="searchdate2" value="<?php echo $date2; ?>">
                                <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="submit" class="btn btn-success " value="Search">
                        </div>

                    </form>

                </div>
<!--                         <button  class="btn btn-default print_no" onclick="print_this('to_print')">Print..</button>  -->
                         <input type="button" class="btn btn-lg btn-default" onclick="print_this('to_print')" value="Print">    

            </div>
     
      <!--   <a href= "searchrecord.php" class="btn btn-info"  style="float:right" >Search Records / Print Records</a><br>
  </div>
    -->

        <br>





    	
<!--    	 <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a>-->
    </div>




        <div  class="container">

            
            
            
<!--          <button type="button" class="btn btn-lg btn-default print_no" onclick="print_this('to_print')">Print!</button>-->
       
   
       
<!--     <a href= "print.php"class="btn btn-primary" target="_blank" >PRINT.. </a>  -->
      
    
            
     
            
            
            <div  id="to_print" >

<?php
                require_once('connection.php');
   
        $sql1 = "SELECT * FROM form where user_id='".$_SESSION['user']."'";
        $result = mysqli_query($con,$sql1);
        if(mysqli_num_rows($result)> 0){
                
                echo "<table class='table'>";
                 echo "<thead class='thead-light newrec'>";
                    echo "<tr>";
//                      echo "<th>id</th>";
                        echo "<th>DATE</th>";
                        echo "<th>TITLE</th>";
                        echo "<th>DESCRIPTION</th>";
                        echo "<th colspan='3'>Operation</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_assoc($result)){
					if($row['status']==0)
					{
						echo "<tr data-rid=" . $row['id'] . ">";
							echo "<td>" . $row['crdate'] . "</td>";
							echo "<td>" . $row['subject'] . "</td>";
							echo "<td>" . $row['subject1'] . "</td>";
							echo "<td onclick='markasread(this)'> <i class='fas fa-check'></i> </td>";
							echo "<td onclick='deleterecord(this)'><i class='far fa-trash-alt'></i></td>";
							echo "<td onclick='openmodal(this)'><i class='far fa-edit'></i></td>";
						echo "</tr>";
					}	
					else if($row['status']==1)
					{
						echo "<tr data-rid=" . $row['id'] . " style='background:orange;'>";
							echo "<td><del>" . $row['crdate'] . "</del></td>";
							echo "<td><del>" . $row['subject'] . "</del></td>";
							echo "<td><del>" . $row['subject1'] . "</del></td>";
							echo "<td onclick='markasread(this)'> <i class='fas fa-check'></i> </td>";
							echo "<td onclick='deleterecord(this)'><i class='far fa-trash-alt'></i></td>";
							echo "<td onclick='openmodal(this)'><i class='far fa-edit'></i></td>";
						echo "</tr>";
					}
                    
                }
                echo "</tbody>";
                echo "</table>";
                // Free result set
                unset($result);
            } else{
                echo "No records were found on selected date.";
            }
    
    ?>

        </div>
       
        </div>
         <div id="openmodal" class="modal" ></div>
 </body>

    </html>        
    
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    <script type="text/javascript">
	$('.newtask').click(function(){
		$('#openmodal').modal("show");
		$.ajax({
			type:"post",
			url:"fetchmodal.php",
			data:{newtask:"123"},
			success:function(data){
				$('#openmodal').html(data);
				$('.modal-backdrop').remove();
				
				
			}
		})
	});
	function newtask(){
		var title = $('#titlerec').val();
		var rec=$('#edrec').val();
		$.ajax({
			type:"post",
			url:"markasread.php",
			data:{rec:rec,title:title},
			success:function(data){
				$('.newrec').append(data);
			}
		});
	}
	function markasread(z){
		var rid=$(z).parent('tr').attr('data-rid');
		$.ajax({
			type:"post",
			url:"markasread.php",
			data:{record:rid},
			success:function(data){
				$(z).parent('tr').replaceWith(data);
			}
		})
	}
	function openmodal(z){
		$('#openmodal').modal("show");
		var rid=$(z).parent('tr').attr('data-rid');
		$.ajax({
			type:"post",
			url:"fetchmodal.php",
			data:{editrecord:rid},
			success:function(data){
				$('#openmodal').html(data);
				
				$('.modal-backdrop').remove();
				
				
			}
		})
	}
	function editrecord(z,x){
		var rec=$('#edrec').val();
		$.ajax({
			type:"post",
			url:"markasread.php",
			data:{editrecord:x,rec:rec},
			success:function(data){
				$('tr').each(function(){
					if($(this).attr('data-rid')==x)
					{
						$(this).replaceWith(data);
						$('#openmodal').modal("hide");
						$('#openmodal').html("");
					}
					
				});
				
				
			}
		})
	}
	function deleterecord(z){
		var rid=$(z).parent('tr').attr('data-rid');
		$.ajax({
			type:"post",
			url:"markasread.php",
			data:{delrecord:rid},
			success:function(data){
				$(z).parent('tr').remove();
			}
		})
	}
  

    </script>    

<?php }
else{
	header("location: login.php");
}	?>
         
    

  
     








        
   
