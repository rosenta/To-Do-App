<?php session_start();
	
	if(isset($_SESSION['user']))
	{
		require_once('connection.php');
		if(isset($_POST['record']))
		{
			$sql1=mysqli_query($con,"select id,crdate,subject,subject1,status from form where user_id='".$_SESSION['user']."' and id='".$_POST['record']."'");
			$row=mysqli_fetch_assoc($sql1);
			if($row['status']==0)
			{
				$sql=mysqli_query($con,"update form set status=1 where user_id='".$_SESSION['user']."' and id='".$_POST['record']."'");
				if($sql)
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
			else{
				$sql=mysqli_query($con,"update form set status=0 where user_id='".$_SESSION['user']."' and id='".$_POST['record']."'");
				if($sql)
				{
					
					
					echo "<tr data-rid=" . $row['id'] . " >";
						echo "<td>" . $row['crdate'] . "</td>";
						echo "<td>" . $row['subject'] . "</td>";
						echo "<td>" . $row['subject1'] . "</td>";
						echo "<td onclick='markasread(this)'> <i class='fas fa-check'></i> </td>";
						echo "<td onclick='deleterecord(this)'><i class='far fa-trash-alt'></i></td>";
						echo "<td onclick='openmodal(this)'><i class='far fa-edit'></i></td>";
					echo "</tr>";
				}
			}
			
		}
		else if(isset($_POST['editrecord']))
		{
			$date1=date("d-m-Y");
			$sql=mysqli_query($con,"update form set subject1='".$_POST['rec']."',crdate='".$date1."' where user_id='".$_SESSION['user']."' and id='".$_POST['editrecord']."'");
			if($sql)
			{
				$sql1=mysqli_query($con,"select id,crdate,subject,subject1 from form where user_id='".$_SESSION['user']."' and id='".$_POST['editrecord']."'");
				$row=mysqli_fetch_assoc($sql1);
				echo "<tr data-rid=" . $row['id'] . ">";
					echo "<td>" . $row['crdate'] . "</td>";
					echo "<td>" . $row['subject'] . "</td>";
					echo "<td>" . $row['subject1'] . "</td>";
					echo "<td onclick='markasread(this)'> <i class='fas fa-check'></i> </td>";
					echo "<td onclick='deleterecord(this)'><i class='far fa-trash-alt'></i></td>";
					echo "<td onclick='openmodal(this)'><i class='far fa-edit'></i></td>";
				echo "</tr>";
			}
		}
		else if(isset($_POST['delrecord']))
		{
			$sql=mysqli_query($con,"delete from form where user_id='".$_SESSION['user']."' and id='".$_POST['delrecord']."'");
		}
		else if(isset($_POST['rec']) && isset($_POST['title']) && !isset($_POST['delrecord']))
		{
			$date1=date("d-m-Y");
			$sql=mysqli_query($con,"insert into form (subject1,crdate,subject) values ('".$_POST['rec']."','".$date1."','".$_POST['title']."') ");
			if($sql)
			{
				 $last_id = $con->insert_id;
				echo "<tr data-rid=" . $last_id. ">";
					echo "<td>" . $date1. "</td>";
					echo "<td>" . $_POST['title'] . "</td>";
					echo "<td>" . $_POST['rec']. "</td>";
					echo "<td onclick='markasread(this)'> <i class='fas fa-check'></i> </td>";
					echo "<td onclick='deleterecord(this)'><i class='far fa-trash-alt'></i></td>";
					echo "<td onclick='openmodal(this)'><i class='far fa-edit'></i></td>";
				echo "</tr>";
			}
		}
	}
	else
	{
		header("location: login.php");
	}

?>