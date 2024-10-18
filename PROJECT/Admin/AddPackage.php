<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	$title= $_POST['txt_title'];
	$des= $_POST['txt_des'];
	$amt= $_POST['txt_amt'];
	$dur= $_POST['txt_dur'];
	$packageIns="insert into tbl_package (package_title,package_des,package_amount,package_days) values ('$title','$des','$amt','$dur')";
	if($con->query($packageIns))
	{
		?>
      <script>
			alert('Package Added')
			window.location='Homepage.php'
			</script>
        <?php
	}
	else{
		?>
		<script>
		alert('Error:Package not added')
		window.location='AddPackage.php'
		</script>
		<?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Package</title>
</head>

<body>
<form action="" method="post">
<h2 align="center">Add Package</h2>
<table width="301" border="1" align="center">
  <tr>
    <th width="175" scope="row">Title</th>
    <td width="110"><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
  </tr>
  <tr>
    <th scope="row">Description</th>
    <td><label for="txt_des"></label>
      <input type="text" name="txt_des" id="txt_des" /></td>
  </tr>
  <tr>
    <th scope="row">Amount</th>
    <td><label for="txt_amt"></label>
      <input type="text" name="txt_amt" id="txt_amt" /></td>
  </tr>
  <tr>
    <th scope="row">Days/Duration</th>
    <td><label for="txt_dur"></label>
      <input type="text" name="txt_dur" id="txt_dur" /></td>
  </tr>
  <tr>
    <td colspan="2" scope="row" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
</table>

</form>
</body>
<?php
include("Footer.php");
?>
</html>