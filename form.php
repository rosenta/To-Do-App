<?php session_start();
	error_reporting( ~E_NOTICE ); // avoid notice
	
//	require_once 'dbconfig.php';
	require_once('connection.php');
	if(isset($_POST['btnsave']))
	{
//		$username = $_POST['user_name'];// user name
//		$userjob = $_POST['user_job'];// user email
		
		/*$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];*/
        
     
        /*$crno = $_POST['crno'];*/
        $crdate = $_POST['crdate'];
        $subject = $_POST['subject'];
        $subject1 = $_POST['subject1'];
      /*  $rbeno = $_POST['rbeno'];
        $rbedate = $_POST['rbedate'];*/
//        $opt = $_POST['opt'];
        

		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $pdo->prepare('INSERT INTO form(crdate,subject,subject1) VALUES(:crdate, :subject, :subject1)');
//			$stmt->bindParam(':uname',$username);
//			$stmt->bindParam(':ujob',$userjob);
//			$stmt->bindParam(':upic',$userpic);
          
//            $stmt->bindParam(':crno',$crno);
            $stmt->bindParam(':crdate',$crdate);
            $stmt->bindParam(':subject',$subject);
            $stmt->bindParam(':subject1',$subject1);
//            $stmt->bindParam(':rbeno',$rbeno);
//            $stmt->bindParam(':rbedate',$rbedate);
//            $stmt->bindParam(':opt',$opt);
//			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("location: form.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
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
    height:500px !important;
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
       <nav class="navbar navbar-expand-sm bg-default navbar-dark">
  <ul class="navbar-nav mr-auto">
    <!--<li class="nav-item active">
      <a class="nav-link" >WELCOME</a>
    </li>-->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php"><b>HOME</b></a>
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
	    

    
    
                  <!--            <div class="form-group row">
                                <label for="crno" class="col-sm-2 col-form-label">CR_NO :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="crno" id="crno" placeholder="Enter number_format">
                                    
                                </div>
    </div>
                    -->            

                      
                        <div class="form-group row">
                            <label for="crdate" class="col-sm-2 col-form-label">Today's date :</label>

                            <div id="datepicker" class="input-group date col-sm-4" data-date-format="dd-mm-yyyy">
                                <input class="form-control  <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" type="text" name="crdate" value="<?php echo $date; ?>" placeholder="Select Date">
                                <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                            </div></div>

                       
<!--<div class="form-group row">
                            <label for="doj" class="col-sm-2 col-form-label">Date of journey :</label>

                            <div id="datepicker" class="input-group date col-sm-4" data-date-format="dd-mm-yyyy">
                                <input class="form-control  <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" type="text" name="doj" value="<?php echo $date; ?>" placeholder="Select Date">
                                <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                            </div>

                        </div>-->


                       <div class="form-group row">
                         <label for="subject" class="col-sm-2 col-form-label">Title :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter title">
                                    
                                </div>
    </div>
    
        <div class="form-group row">
                         <label for="subject1" class="col-sm-2 col-form-label">Description :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subject1" id="subject1" placeholder="I'm Listening..">
                                    
                                </div>
    </div>
                                
      <!--                          <div class="form-group row">
                        <label for="rbeno" class="col-sm-2 col-form-label">RBE NO :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="rbeno" id="rbeno" placeholder="Enter number_format">
                                    
                                </div>
    </div>-->
                                 
    
    <!--<div class="form-group row">
    
    	<label class="col-sm-2 col-form-label"> UPLOAD FILE :</label>
       <div class="col-sm-10">
           <input type="file" name="user_image" class="form-control"   /> </div></div>-->
    
<!--    class="input-group"-->
    <br>
        <button type="submit" name="btnsave" class="btn btn-success">
          Save
        </button>
        
    
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