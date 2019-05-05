<?php
	//Start session
	session_start();
	//Include database connection details

	include 'Includes.php';


	if(isset($_POST['subBtn']))
{
	//Sanitize the POST values against SQL Injection
	
	$login = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);
	$login = mysqli_real_escape_string($conn,$login);
    $password = mysqli_real_escape_string($conn,$password);
	
	
	
	//Check Season
	
 $getSeason=mysqli_query($conn,"SELECT * FROM `siteseason` WHERE `SeasonStatus`='OPEN'");	
 $rowSeason=mysqli_fetch_array($getSeason);
 $CurrYear=$rowSeason['Year'];	
	
	
	//Create query
	
	
	$getUsers=mysqli_query($conn,"SELECT * FROM cmembership WHERE `Username`='".$login."' AND Password='".md5($password)."' AND `UserAccountSuspended`='NO'");
	
//Check whether the query was successful or not

			if (mysqli_num_rows($getUsers) == 1) {
			
			$rowUsers = mysqli_fetch_array($getUsers);
						
			//$_SESSION['pjuserid'] = $rowUsers['pjuserid'];
			$_SESSION['Username'] = $rowUsers['UserName'];
			$_SESSION['Fullname']= $rowUsers['Fullname'];
			$_SESSION['SpecialAdminRoles']= $rowUsers['SpecialAdminRoles'];
			$_SESSION['UserLevel']= $rowUsers['Userlevel'];
			$_SESSION['UserID']= $rowUsers['UserID'];	
			//echo "Name ".$_SESSION['Username']." userlevel ".$_SESSION['UserLevel'];
			mysqli_query($conn,"UPDATE `cmembership` SET sessionID='".session_id()."',`ForcedLogOff`='NO' WHERE `Username`='".$login."' AND password='".md5($password)."'");
			
			header("location: production/index.php?Id=".$Id."&Year=".$CurrYear);
			exit();
		}
		else {
			
			header("location: login-failed.php?Id=".$Id);
			exit();
		}
		}
		
?>