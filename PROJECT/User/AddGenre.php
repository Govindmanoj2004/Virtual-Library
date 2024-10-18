<?php
session_start();
include("../Assets/Connection/connection.php");
$id=$_SESSION['uid'];
$i="";
$l="";
//Add user fav
if(isset($_POST['btn_submit']))
{
	$genre=$_POST['chk_genre'];
	$l=count($genre);
	$deleQry="delete from tbl_mygenre where user_id='".$id."'";
	
	$con->query($deleQry);
	foreach ($genre as $key => $g)
	{
		
			$mygenreIns="insert into tbl_mygenre (user_id,genre_id) values ('$id','$g')";
			if($con->query($mygenreIns))
			{
                $i++;
			}
	}
	if($i==$l)
	{
		//Change status of user.
		$updateStatus="update tbl_user set user_flag ='1' where user_id='".$id."'";
		$change=$con->query($updateStatus);
		?>
<script>
	alert('Your favourite genre added.')
	window.location = 'Homepage.php'
</script>
<?php
	}
	else
	{
		$diff=$l-$i;
		?>
<script>
	alert(' <?php $diff ?> genre not Added')
	window.location = 'AddGenre.php'
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
	<title>Genre</title>

	<!-- Font Icon -->
	<link rel="stylesheet"
		href="../Assets/Templates/Registeration/fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="../Assets/Templates/Registeration/css/style.css">

	<!-- Toaster css -->
	<link rel="stylesheet" href="../Assets/Templates/Registeration/css/ani.css">

	<style>
		.signin-content{
			padding-top: 10px !important;
			padding-bottom: 10px !important;
			
		}
		body{
			background:  !important;
		}
	</style>

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
									<div class="ani">
										<div class="modal">
											<p>
												Select your favourite gener from the list.
												<br />
												Hurry up! You're going to burn it!.
											</p>

											<button class="close--modal">
												Toast Again!
											</button>
										</div>

										<!-- button allowing to show the modal, and describing the toaster icon -->
										<button class="open--modal">

											<svg viewBox="0 0 200 150" width="200" height="150">
												<g class="toaster">
													<g class="pegs">
														<g class="peg" transform="translate(25 140)">
															<rect rx="1" x="0" y="0" width="22" height="10"
																fill="#B7CFFF" stroke="#0054FF" stroke-width="2">
															</rect>

															<line x1="16" x2="16" y1="0" y2="10" stroke="#0054FF"
																stroke-width="2">
															</line>
														</g>

														<g class="peg" transform="translate(75 140)">
															<rect rx="1" x="0" y="0" width="22" height="10"
																fill="#B7CFFF" stroke="#0054FF" stroke-width="2">
															</rect>

															<line x1="16" x2="16" y1="0" y2="10" stroke="#0054FF"
																stroke-width="2">
															</line>
														</g>

														<g class="peg" transform="translate(125 140)">
															<rect rx="1" x="0" y="0" width="22" height="10"
																fill="#B7CFFF" stroke="#0054FF" stroke-width="2">
															</rect>

															<line x1="16" x2="16" y1="0" y2="10" stroke="#0054FF"
																stroke-width="2">
															</line>
														</g>

														<g class="peg" transform="translate(155 140)">
															<rect rx="1" x="0" y="0" width="22" height="10"
																fill="#B7CFFF" stroke="#0054FF" stroke-width="2">
															</rect>

															<line x1="16" x2="16" y1="0" y2="10" stroke="#0054FF"
																stroke-width="2">
															</line>
														</g>
													</g>

													<g class="body">
														<path
															d="M 15 140 h 170 a 5 5 0 0 0 5 -5 v -70 a 30 30 0 0 0 -30 -30 h -120 a 30 30 0 0 0 -30 30 v 70 a 5 5 0 0 0 5 5"
															fill="#fff" stroke="#0054FF" stroke-width="2">
														</path>

														<g class="reflections">
															<path
																d="M 80 60 a 10 10 0 0 1 10 -10 l 30 80 h -15 l -25 -70"
																fill="#B5F1FF">
															</path>

															<path
																d="M 100 50 h 40 l 30 80 h -45 l -25 -75 a 5 5 0 0 1 5 -5"
																fill="#B5F1FF">
															</path>
														</g>

														<g class="buttons">
															<rect rx="2" x="140" y="117.5" width="13" height="4.5"
																fill="#fff" stroke="#0054FF" stroke-width="2">
															</rect>

															<rect rx="2" x="159" y="117.5" width="13" height="4.5"
																fill="#fff" stroke="#0054FF" stroke-width="2">
															</rect>
														</g>

														<g class="side">
															<path
																d="M 65 140 v -75 a 30 30 0 0 1 30 -30 h -55 a 30 30 0 0 0 -30 30 v 70 a 5 5 0 0 0 5 5 h 50"
																fill="#B7CFFF" stroke="#0054FF" stroke-width="2">
															</path>

															<line x1="37.5" x2="37.5" y1="65" y2="115" stroke="#0054FF"
																stroke-width="7" stroke-linecap="round">
															</line>

															<g class="lever">
																<rect rx="1" x="26.5" y="70" width="22" height="10"
																	fill="#F7FAFF" stroke="#0054FF" stroke-width="2">
																</rect>

																<line x1="42.2" x2="42.2" y1="70" y2="80"
																	stroke="#0054FF" stroke-width="2">
																</line>
															</g>
														</g>
													</g>
												</g>

												<line x1="0" x2="200" y1="149" y2="149" stroke="#0054FF"
													stroke-width="2">
												</line>
											</svg>

										</button>
									</div>
									<!-- <figure>
										<img src="../Assets/Templates/REgisteration/images/signin-image.jpg"
											alt="sing up image">
									</figure> -->
								</div>

								<div class="signin-form">
									<h2 class="form-title">Genre</h2>
									<form method="post" class="register-form" id="login-form">
										<!-- Orginal text box -->
										<!-- <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
									<label for="remember-me" class="label-agree-term"><span><span></span></span>hehe</label> -->
										<?php
										$selQry="select * from tbl_genre g inner join tbl_category c on c.cat_id=g.genre_cat order by g.genre_cat";
										$result = $con->query($selQry);
										while($data = $result->fetch_assoc())
										{
										?>
										<input type="checkbox" 
										<?php
										$select="select * from tbl_mygenre where user_id='".$id."' and genre_id='".$data['genre_id']."'";
										$sel=$con->query($select);
										if($sel->num_rows>0){
										echo "checked";
										}
										?>
										name="chk_genre[]"
										value="<?php echo $data['genre_id'] ?>" 
										id="<?php echo $data['genre_id'] ?>" 
										/>
										<label for="<?php echo $data['genre_id'] ?>"
										 class="label-agree-term"><span><span></span></span>
											<?php 
											echo $data['cat_name'].":".$data['genre_name'];
											?>
										</label>
										<br />
										<?php
										}
										?>
										<div class="form-group form-button">
											<input type="submit" name="btn_submit" id="signin" class="form-submit"
												value="Add Genre" />
										</div>
									</form>
								</div>
							</div>
						</div>
					</section>
					<br />
					<br />
					
				</article>
			</diV>
		</div>
	</div>
	<!-- JS -->
	<script src="../Assets/Templates/Registeration/vendor/jquery/jquery.min.js"></script>
	<script src="../Assets/Templates/Registeration/js/main.js"></script>

	<!-- Toaster animation -->
	<script>
		const buttonOpen = document.querySelector('button.open--modal');
// target the modal
const modal = document.querySelector('.modal');

// function used to show the modal, by adding the class of .active to the necessary elements
function showModal() {
  // add a class of .active to the button, animating the SVG icon
  buttonOpen.classList.add('active');
  // once an animationend event is registered. add the class of .active to the modal as well
  // ! this event is registered for every animation occurring in the button
  // in the project at hand, it is registered thrice
  buttonOpen.addEventListener('animationend', () => {
    modal.classList.add('active');
  });
}

// when the button with the SVG icon is clicked call the show modal function
buttonOpen.addEventListener('click', showModal);


// identify the close button
const buttonClose = document.querySelector('button.close--modal');
// when the button is clicked remove the class of .active from both the modal and the button
buttonClose.addEventListener('click', () => {
  modal.classList.remove('active');
  // from the button to have the animation play once more as the class is re-introduced
  buttonOpen.classList.remove('active');
  // after a brief delay call the function showing the modal
  const timeoutID = setTimeout(() => {
    document.querySelector('p').innerHTML = 'Quite delightful, isn\'t it?<br/>And yes, I\'ve toasted more than once as well.';
    showModal();
    clearTimeout(timeoutID);
  }, 150);
});

	// Checklist
	
	</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>