<?php
include("../Assets/Connection/connection.php");
include("SessionValidation.php");
if(isset($_POST["btn_submit"]))
{
  $reply=$_POST['txt_reply'];
  $cId=$_GET['reply'];
  $update="update tbl_complaint set complaint_status='1',complaint_reply='".$reply."' where complaint_id='".$cId."'";
  if($con->query($update))
  {
    ?>
      <script>
			alert('Reply Posted')
			window.location='ViewComplaiants.php'
			</script>
    <?php
  }
  else
  {
    ?>
      <script>
			alert('Error:Reply not posted')
      window.location='ViewComplaiants.php'
			</script>
    <?php
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply</title>
</head>

<body><form action="" method="post">
<h2 align="center">Reply to complaint</h2>
<table width="200" border="1" align="center">
  <tr>
    <td>Reply</td>
    <td><label for="txt_reply"></label>
      <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
</table>

</form>
</body>
</html>