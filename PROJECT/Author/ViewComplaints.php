<?php
include("../Assets/Connection/Connection.php");
include("SessionValidation.php");
$authorId=$_SESSION['auid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View complaints</title>
</head>

<body>
<h1 align="center">Complaints</h1>
<table width="200" border="1" align="center">
  <tr>
    <td>Sl.no</td>
    <td>User name</td>
    <td>Title</td>
    <td>Description</td>
    <td>Reply</td>
  </tr>
  <?php
    $bid=$_GET['comp'];
    $slctRqst="select * from tbl_complaint c inner join tbl_user u on u.user_id=c.user_id where book_id='".$bid."'";
    $result=$con->query($slctRqst);
    $i="";
    while($data=$result->fetch_assoc())
    {
      $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['user_name'] ?></td>
    <td><?php echo $data['complaint_title'] ?></td>
    <td><?php echo $data['complaint_des'] ?></td>
    <td>
      <?php
      if($data['complaint_status']==1)
      {
        ?>
        <p>Replay already posted</p>
        <?php
      }
      else if($data['complaint_status']==0)
      {
        ?>
        <a href="Reply.php?reply=<?php echo $data["complaint_id"] ?>">Reply</a>
        <?php
      }
      ?>
      </td>
    </tr>
  <?php
    }
  ?>
</table>

</body>
</html>