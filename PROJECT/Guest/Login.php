<?php
session_start();
include("../Assets/Connection/Connection.php");
//Media alert
if(isset($_GET['media']))
{
	if($_GET['media']==1)
	{
		?>
			<script>
				alert("ERROR:Facebook not available")
				window.location='Login.php'
			</script>
		<?php
	}
	else if($_GET['media']==2)
	{
		?>
			<script>
				alert("ERROR:Twitter not available")
				window.location='Login.php'
			</script>
		<?php
	}
	else if($_GET['media']==3)
	{
		?>
			<script>
				alert("ERROR:Google not available")
				window.location='Login.php'
			</script>
		<?php
	}
}
if(isset($_POST['btn_login']))
{
	$email=$_POST['txt_email'];
	$password=$_POST['txt_passwrd'];
	//Admin Select Query
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_pass='".$password."'";
	$resAdmin=$con->query($selAdmin);
	//User Select Query
	$selUser="select * from tbl_user where user_email='".$email."' and user_pass='".$password."'";
	$resUser=$con->query($selUser);
	//Author Select Query
	$selauthor="select * from tbl_author where author_email='".$email."' and author_pass='".$password."'";
	$resauthor=$con->query($selauthor);
	if($adminData=$resAdmin->fetch_assoc())
	{
		//Admin
		$_SESSION['aid']=$adminData['admin_id'];
		$_SESSION['aname']=$adminData['admin_name'];
		header("location: ../Admin/Homepage.php");
	}
	else if($userData=$resUser->fetch_assoc())
	{
		//User
		$_SESSION['uid']=$userData['user_id'];
		$_SESSION['uname']=$userData['user_name'];
		$status=$userData['user_flag'];
		if($status=="0")
		{
			header("location: ../User/AddGenre.php");
		}
		else
		{
			//Books Rent Update
			$slctBookRent="select * from tbl_rent where user_id=".$userData['user_id'];
			$BookRentResult=$con->query($slctBookRent);
			while($BookRentData=$BookRentResult->fetch_assoc())
			{
				if($BookRentData['rent_exp']!="")
				{
					//Check date
					$CurrentDateRent=date("Y-m-d");//String
					$CurrentDateRentObj= new DateTime($CurrentDateRent);//Current date object
					//Date object of book expire date
					$RentExpireDate=new DateTime($BookRentData['rent_exp']);
					if($CurrentDateRentObj>$RentExpireDate)
					{
						$UpdateRentDate="update tbl_rent set rent_status='3' where user_id='".$userData['user_id']."'and book_id='".$BookRentData['book_id']."'";
						$con->query($UpdateRentDate);
					}
				}
			}
			//Premium Check
			$CheckPremium="select * from tbl_subscription where user_id='".$userData['user_id']."'";
			$result=$con->query($CheckPremium);
			$data=$result->fetch_assoc();
			$currentDateString=date("Y-m-d");
			//Two Date objects
			$expDate=new DateTime($data['sub_exp']);
			$CurrentDateObj= new Datetime($currentDateString);
			if($expDate<$CurrentDateObj)
			{
				$updateStatus="update tbl_subscription set sub_status='3' where user_id='".$userData['user_id']."'";
				$con->query($updateStatus);
				if($userData['user_flag']==0)
				{
					header("location: ../User/AddGenre.php");
				}
				else
				{
					header("location: ../User/Homepage.php");
				}
			}
			else
			{
				header("location: ../User/Homepage.php");
			}
		}
	}
	else if($authorData=$resauthor->fetch_assoc())
	{
		//Author
		if($authorData['author_flag']=="1")
		{
			$_SESSION['auid']=$authorData['author_id'];
			$_SESSION['auname']=$authorData['author_name'];
			header("location: ../Author/Homepage.php");

			//Premium check
			$CheckPremium="select * from tbl_subscription where author_id='".$authorData['author_id']."'";
			$result=$con->query($CheckPremium);
			$data=$result->fetch_assoc();
			$currentDateString=date("Y-m-d");
			//Two Date objects
			$expDate=new DateTime($data['sub_exp']);
			$CurrentDateObj= new Datetime($currentDateString);
			if($expDate<$CurrentDateObj)
			{
				$updateStatus="update tbl_subscription set sub_status='3' where author_id='".$authorData['author_id']."'";
				$con->query($updateStatus);
				header("location: ../Author/Homepage.php");
			}
			else
			{
				header("location: ../Author/Homepage.php");
			}
		}
		else
		{
		 ?>
<script>
	alert('You are not Verified.')
	window.location = 'Login.php'
</script>
<?php
		}
	}
	else{
		?>
<script>
	alert('Invalid Credentials')
</script>
<?php
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Log in</title>

	<!-- Font Icon -->
	<link rel="stylesheet"
		href="../Assets/Templates/Registeration/fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="../Assets/Templates/Registeration/css/style.css">

	 <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/Templates/Main/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/Templates/Main/favicon-16x16.png">
    <link rel="manifest" href="../Assets/Templates/Main/site.webmanifest">

</head>

<body>
	<h1>&nbsp;</h1>
	<div id="content" class="s-content s-content--page">

		<div class="row entry-wrap">
			<div class="column lg-12">

				<article class="entry">
					<section class="sign-in">
						<div class="container">
							<div class="signin-content">
								<div class="signin-image">
									<figure><img src="../Assets/Templates/REgisteration/images/signin-image.jpg"
											alt="sing up image"></figure>
									<!-- <a href="" class="signup-image-link">Create an account</a> -->
								</div>

								<div class="signin-form">
									<h2 class="form-title">Log in</h2>
									<form method="POST" class="register-form" id="login-form">
										<div class="form-group">
											<label for="your_name"><i
													class="zmdi zmdi-account material-icons-name"></i></label>
											<input type="text" name="txt_email" id="your_name"
												placeholder="Email" />
										</div>
										<div class="form-group">
											<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
											<input type="password" name="txt_passwrd" id="your_pass"
												placeholder="Password" />
										</div>
										<div class="form-group">
											<input type="checkbox" name="remember-me" id="remember-me"
												class="agree-term" />
											<label for="remember-me"
												class="label-agree-term"><span><span></span></span>Show password</label>
										</div>
										<div class="form-group form-button">
											<input type="submit" name="btn_login" id="signin" class="form-submit"
												value="Log in" />
										</div>
									</form>
									<div class="social-login">
										<span class="social-label">Or login with</span>
										<ul class="socials">
											<li><a href="Login.php?media=1"><i class="display-flex-center zmdi zmdi-facebook">
											</i></a>
											</li>
											<li><a href="Login.php?media=2"><i class="display-flex-center zmdi zmdi-twitter"></i></a>
											</li>
											<li><a href="Login.php?media=3"><i class="display-flex-center zmdi zmdi-google"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</section>

				</article>
			</diV>
		</div>
	</div>
	<!-- JS -->
    <script src="../Assets/Templates/Registeration/vendor/jquery/jquery.min.js"></script>
    <script src="../Assets/Templates/Registeration/js/main.js"></script>
	<script>
		//
// Variables
//

// Get the password toggle
const toggle = document.querySelector('#remember-me');
console.log(toggle.value);

// Get the password field
const password = document.querySelector('#your_pass');
console.log(password.value);


//
// Functions
//

/**
 * Toggle the visibility of a password field
 * based on a checkbox's current state
 * 
 * @param {HTMLInputElement} checkbox The checkbox
 * @param {HTMLInputElement} field The password field
 */
function togglePassword (checkbox, field) {
  field.type = checkbox.checked ? 'text' : 'password';
}

/**
 * Handle change events
 */
function handleChange () {
  togglePassword(this, password);
}


//
// Inits & Event Listeners
//

// Handle change events
toggle.addEventListener('change', handleChange);
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>