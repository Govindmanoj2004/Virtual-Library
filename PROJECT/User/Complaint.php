<?php
include("../Assets/Connection/connection.php");
include("SessionValidation.php");
$id=$_SESSION['uid'];
$bid=$_GET['bid'];
$check="select * from tbl_complaint where book_id='".$bid."'";
$result1=$con->query($check);
if($result1->num_rows>0)
{
  ?>
  <script>
  alert('Complaint already posted')
  window.location = 'MyordersBuy.php'
  </script>
  <?php
 }
 else
 {
if(isset($_POST['btn_submit']))
{

    $title=$_POST['txt_title'];
    $des=$_POST['txt_des'];
    $insert="insert into tbl_complaint (complaint_title,complaint_des,complaint_date,user_id,book_id) values ('$title','$des','curdate()','$id','$bid')";
    if($con->query($insert))
    {
      ?>
      <script>
      alert('Complaint Posted')
      window.location = 'MyordersBuy.php'
      </script>
      <?php
    }
    else
    {
      ?>
      <script>
      alert('Error:complaint not posted')
      window.location = 'Complaint.php'
      </script>
      <?php
    }
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Complaint</title>
</head>

<body>
<h2 align="center">Post Complaint</h2>
<form action="" method="post">
<table width="200" border="1" align="center">
  <tr>
    <td align="center">Title</td>
    <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
  </tr>
  <tr>
    <td align="center">Description</td>
    <td><label for="txt_des"></label>
      <textarea name="txt_des" id="txt_des" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
</table>

</form>
</body>
</html>