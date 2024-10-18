<?php
include("../Assets/Connection/connection.php");
include("Mail.php");
if(isset($_POST['btn_register']))
{
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	$district=$_POST['lst_district'];
	$place=$_POST['lst_place'];
	$pass=$_POST['txt_pass'];
	$cpass=$_POST['txt_confirmpass'];
	//Photo
	$photo=$_FILES['fle_photo']['name'];
	$tempphoto=$_FILES['fle_photo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Assets/Files/User/Photo/'.$photo);
	//Proof
	$proof=$_FILES['fle_proof']['name'];
	$tempproof=$_FILES['fle_proof']['tmp_name'];
	move_uploaded_file($tempproof, '../Assets/Files/User/Proof/'.$proof);
  //Checking
  $checkQuery="select * from tbl_user where user_email='".$email."' and user_pass='".$pass."'";
  // echo $checkQuery;
  $checkResult=$con->query($checkQuery);
  if($checkResult->num_rows>0)
  {
    ?>
      <script>
        alert("Password and email already equiped.Try a different email or password.");
      </script>
    <?php
  }
  else{
	//Insertion
	$UserIns="insert into tbl_user (user_name,user_email,user_contact,user_address,user_district,user_place,user_photo,user_proof,user_pass) values ('$name','$email','$contact','$address','$district','$place','$photo','$proof','$pass')";
	if($pass==$cpass)
	{
		if($con->query($UserIns))
			{
        VerifyEmail($email,$name);
				?>
          <script>
            alert('Registeration Successfull')
          </script>
        <?php
					header("location: Login.php");
			}
		else{
				?>
          <script>
            alert('Insertion:UNsuccessfull')
            window.location = 'User_reg.php';
          </script>
        <?php
			}
	}
	else{
				?>
          <script>
          alert('Password Mismatch');
        </script>
        <?php
			}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Registration</title>

  <!-- Font Icon -->
  <link rel="stylesheet"
    href="../Assets/Templates/Registeration/fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Main css -->
  <link rel="stylesheet" href="../Assets/Templates/Registeration/css/style.css">
  <style>
    /* CSS */
    .custom-file-upload {
      position: relative;
      display: inline-block;
      height: 50px;
    }

    .upload-btn {
      display: inline-block;
      padding: 10px 20px;
      cursor: pointer;
      background-color: #494a4b;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s ease;
      width: 200px;
    }

    .upload-btn:hover {
      background-color: #000000;
    }

    #fle_photo,
    #fle_proof {
      position: absolute;
      font-size: 100px;
      opacity: 0;
      right: 0;
      top: 0;
    }
    .main
    {
      padding:50px 0!important;
    }
  </style>
</head>

<body>

  <div class="main">

    <!-- Sign up form -->
    <section class="signup">
      <div class="container">
        <div class="signup-content">
          <div class="signup-form">
            <h2 class="form-title">Sign up as user</h2>
            <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input requird type="text" name="txt_name" id="txt_name" placeholder="Your Name"
                  title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter"
                  pattern="^[A-Z]+[a-zA-Z ]*$" />
              </div>
              <div class="form-group">
                <label for="email"><i class="zmdi zmdi-email"></i></label>
                <input requird type="email" name="txt_email" id="txt_email" placeholder="Your Email" />
              </div>
              <div class="form-group">
                <label for="name"><i class="zmdi zmdi-email"></i></label>
                <input requird type="textarea" name="txt_address" id="txt_address" placeholder="Your Address" />
              </div>
              <div class="form-group">
                <label for="contact"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="txt_contact" id="txt_contact" placeholder="Your Contact Number"
                  pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" />
              </div>
              <div class="form-group">
                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                <input requird type="password" name="txt_pass" id="txt_pass" placeholder="Your Password"
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
              </div>
              <div class="form-group">
                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                <input requird type="password" name="txt_confirmpass" id="txt_confirmpass"
                  placeholder="Repeat your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
              </div>
              <div class="form-group">

                <div class="custom-file-upload">
                  <label for="fle_photo" class="upload-btn" id="upload-label">Upload Profile Photo</label>
                  <input type="file" name="fle_photo" id="fle_photo" accept="image/png,image/jpeg"
                    onchange="updateLabel(this)" />
                  <br>
                  <br>
                  <p id="File"></p>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file-upload">
                  <label for="fle_proof" class="upload-btn" id="upload-label1">Upload Proof</label>
                  <input type="file" name="fle_proof" id="fle_proof" accept="image/png,image/jpeg"
                    onchange="updateLabel2(this)" />
                  <br>
                  <br>
                  <p id="File2"></p>
                </div>

              </div>
              <div class="form-group">
                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <select name="lst_district" id="lst_district" onChange="getPlace(this.value)" requird>
                  <option>---District---</option>
                  <?php
                                $dissel = "select * from tbl_district";
                                $result=$con->query($dissel);
                                while($data = $result->fetch_assoc()){
                                ?>
                  <option value="<?php echo $data['district_id'] ?>">
                    <?php echo $data['district_name'] ?>
                  </option>
                  <?php
                                }
                                ?>
                </select>
              </div>
              <div class="form-group">
                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <select name="lst_place" id="sel_place" requird>
                  <option>---Place---</option>

                </select>
              </div>
              <div class="form-group">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                  statements in <a href="#" class="term-service">Terms of service</a></label>
              </div>
              <div class="form-group form-button">
                <input type="submit" name="btn_register" id="btn_register" class="form-submit" value="Register" />
              </div>
            </form>
          </div>
          <div class="signup-image">
            <figure><img src="../Assets/Templates/Registeration/images/signup-image.jpg" alt="sing up image">
            </figure>
            <!--<a href="Login.php" class="signup-image-link">I am already member</a>-->
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS -->
  <script src="../Assets/Templates/Registeration/vendor/jquery/jquery.min.js"></script>
  <script src="../Assets/Templates/Registeration/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }

  // JavaScript
  function updateLabel(input2) {
    var label1 = document.getElementById('upload-label');
    var filelabel1 = document.getElementById('File');
    if (input2.files.length > 0) {
      label1.textContent = "Photo Selected";
      filelabel1.innerHTML = input2.files[0].name;
    } else {
      label1.textContent = 'Upload Profile Photo';
    }
  }

  function updateLabel2(input) {
    var label = document.getElementById('upload-label1');
    var filelabel = document.getElementById('File2');
    if (input.files.length > 0) {
      label.textContent = "Proof Selected";
      filelabel.innerHTML = input.files[0].name;
    } else {
      label.textContent = 'Upload Proof';
    }
  }

</script>

</html>