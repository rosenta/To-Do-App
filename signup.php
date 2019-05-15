<?php session_start();
require_once('connection.php');
$name = $username = $password = '';
$name_err = $username_err = $password_err = '';
if(!isset($_SESSION['user']))
{
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
     $name = trim($_POST['name']);
     $username = trim($_POST['mobile']);
     $password = trim($_POST['password']);
  
   //validate name
     if(empty($name)){
            
        $name_err = 'please enter name';
    }
    
    //validate username
     if(empty($username)){
            
        $username_err = 'please enter username';
    
        }
    
    //validate password
    if(empty($password)){
            
        $password_err = 'please enter password';
    
        }
    if( empty($name_err) && empty($username_err) && empty($password_err) ){
        //HASH PASSWORD
        $password = password_hash($password, PASSWORD_DEFAULT);
         $sql = 'INSERT INTO signup(username,email,password) VALUES ("'.$name.'", "'.$username.'" , "'.$password.'" )';
        
        if($stmt = mysqli_query($con,$sql)){
			header('Location: login.php?alert=success');
			exit;
			//echo('records added successfully');
		} else {
			die('Something went wrong');
		}
        unset($stmt);
        
}
    unset($pdo);
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
    height:1000px;
    font-size:14pt;
}
  .jumbotron{
    text-align: center;
    padding: 20px;
    color: whitesmoke;
    background-color: #1E4070;
    border-radius: 0px;

    margin-bottom: 0px;

}
    .bg-danger {
    background-color: #794B2B;
}
        .navbar-dark .navbar-nav .nav-link {
    rgb(147,112,219);
}

    </style>
    <head><div class= "jumbotron">
        <h1>To Do List</h1>
    </div></head>
    
    
<body background=dia.jpg>

<!--<div class= "jumbotron" >
        <h1>Circular</h1>
    </div>-->





    

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
	
	
	
<body>
    
    <div class="wrapper">
        <div class="container">
            <br><h2><font color="white">Signup</font></h2>
            
            <div class="row">
            <div class="col">
                <div class="card card-body bg-light">


                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="form-group">
                        


                        <div class="form-group row">
                            <label for="=Name" class="col-sm-2 col-form-label">USERNAME :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" name="name" id="Department Name" placeholder="Name" value="<?php echo $name; ?>"><span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="User Name" class="col-sm-2 col-form-label">EMAIL:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" name="mobile" id="Department Name" placeholder="Enter your email" value="<?php echo $username; ?>"><span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="pass" class="col-sm-2 col-form-label">PASSWORD :</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="password" id="pass" placeholder="Enter minimum 6 character" pattern=".{6,15}" required title="5 to 10 characters" value="<?php echo $password; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                        </div>





                        <br>
                        <input type="submit" class="btn btn-success " value="Sign up">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="login.php">Already have an account ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

        </div>
    


   


</body>




 



</html>
<?php }
else
	header("location: form.php");
?>