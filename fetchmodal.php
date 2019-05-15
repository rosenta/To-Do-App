<?php session_start();
if(isset($_SESSION['user']) && isset($_POST['editrecord']) && !isset($_POST['newtask']))
{
	require_once('connection.php');
	$sql1=mysqli_query($con,"select id,crdate,subject,subject1 from form where user_id='".$_SESSION['user']."' and id='".$_POST['editrecord']."'");
	$row=mysqli_fetch_assoc($sql1);
	echo '
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
		  <h4 class="modal-title">edit record</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			
		  </div>
		  <div class="modal-body">
			   
				<div class="form-group row">
								 <label for="subject1" class="col-sm-12 col-form-label">Description :</label><br>
										<div class="col-sm-12">
											<input type="text" class="form-control" name="subject1" id="edrec" value="'.$row['subject1'] .'" placeholder="I\'m Listening..">
											
										</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" onclick="editrecord(this,'.$_POST['editrecord'].')">submit</button>
		  </div>
		</div>

	  </div>';
}
else if(isset($_SESSION['user']) && !isset($_POST['editrecord']) && isset($_POST['newtask']))
{
	echo '
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
		  <h4 class="modal-title">new record</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			
		  </div>
		  <div style="padding:8px;">
		   <div class="form-group row">
                         <label for="subject" class="col-sm-12 col-form-label">Title :</label> <br>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="subject" id="titlerec" placeholder="Enter title">
                                    
                                </div>
				</div>
				<div class="form-group row">
								 <label for="subject1" class="col-sm-12 col-form-label">Description :</label><br>
										<div class="col-sm-12">
											<input type="text" class="form-control" name="subject1" id="edrec"  placeholder="I\'m Listening..">
											
										</div>
			</div>
			</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" onclick="newtask()">submit</button>
		  </div>
		</div>

	  </div>';
}


?>