<?php 


session_start();
if(isset($_SESSION['user'])){
header("location: signup.php");
}





   
    require_once('connection.php');





//initialise variable

$username = $password = '';
$username_err = $password_err = '';


//process form when post submit
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    ///echo 'submitted';
    //sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $username = trim($_POST['userid']);
    $password = trim($_POST['pass']);
    
    //validate username
    if(empty($username))
    {
        $username_err = 'please enter  user name';
    }
    
    //validate password
    if(empty($password)){
        $password_err = 'please enter your password';
    }
    

    
    if(empty($username_err) && empty($password_err))
    {
        //prepare query
        $sql = 'SELECT  username, password,id FROM signup WHERE username = "'.$username.'" ';
        
        // prepare statement
        if($stmt = mysqli_query($con,$sql)){
                //check if username exists
                if(mysqli_num_rows($stmt) === 1){
                    if($row = mysqli_fetch_assoc($stmt) ){
                        $hashed_password = $row['password'];
                        if(password_verify($password, $hashed_password)){
                            //successful login
                            $_SESSION['username'] = $username;
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['user'] = $row['id'];
                          
                            
                                header('location: form.php');
                                exit;
                            
                            
                        }else{
                            //display wrong password message
                            $password_err = 'The password you entered is not valid';
                        }
                    }
                    
                } else {
                    $username_err = 'No account found for that username';
                }
            }else{
                die('something went wrong');
            }
        unset($stmt);
        

    }
    //close connection
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
 /*   .bg-danger {
    background-color: #794B2B;
}
        .navbar-dark .navbar-nav .nav-link {
    rgb(121,75,43);
}
*/
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
            <br><h2><font color="white">Login</font></h2>
            
            <div class="row">
                <div class="col">
                    <div class=" card card-body bg-light">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                            <div class="form-group row">
                                <label for="userid" class="col-sm-2 col-form-label">Username :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> " name="userid" id="username" placeholder="Enter your username" value="<?php echo $username; ?>">
                                    <span class="invalid-feedback"><?php echo $username_err; ?></span>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="pass" class="col-sm-2 col-form-label">Password :</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="pass" value="<?php echo $password; ?>" id="pass" placeholder="Enter your password" value="<?php echo $password; ?>" pattern=".{6,15}" required title="5 to 10 characters">

                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>

                                </div>
                            </div>




                            <input type="submit" class="btn btn-success " value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="signup.php">Create an account!</a>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>


   


</body>




 



</html>