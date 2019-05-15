
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>upload</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<!--	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    


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
    .bg-danger {
    background-color: #9370DB;
}
        .navbar-dark .navbar-nav .nav-link {
    rgb(147,112,219);
}

    </style>
<body background=him.jpg>

<!--<div class= "jumbotron" >
        <h1>Circular</h1>
    </div>-->




	<div class="page-header">
       <nav class="navbar navbar-expand-sm bg-danger navbar-dark">
  <ul class="navbar-nav mr-auto">
    <!--<li class="nav-item active">
      <a class="nav-link" >WELCOME</a>
    </li>-->
    <li class="nav-item">
        <a class="nav-link" href="leaveform.php"><b>HOME</b></a>
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

    	
<!--    	 <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a>-->
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   
	
	
	
<div class="container">
<h1><font color="white">what's on your mind today?</font></h1>
<!--<div class="wrapper">-->

<div class="card card-body bg-light">
<form method="post" enctype="multipart/form-data" class="form-group">
	    

    
    
    <!--            
    <br>
        <button type="submit" name="btnsave" class="btn btn-success">
          Upload
        </button>
        -->
    
<!--    </table>-->
    
</form>
    </div>


    </div>

<!--</div>-->


    <script type="text/javascript">
        $(function() {
            $('#datepicker,#datepicker2').datepicker({

                startDate: '-0m',
                //endDate: '+7d'
            }).on('changeDate', function(ev) {
                $('#sDate1').text($('#datepicker,#datepicker2').data('date'));
                $('#datepicker,#datepicker2').datepicker('hide');
            });

        });

    </script>
    



</body>
</html>