<?php
include("../Assets/Connection/Connection.php");
$aname="";
$aemail="";
$apass="";
$aid="";
if(isset($_POST['btn_submit'])){
	$name= $_POST['txt_adminname'];
	$email= $_POST['txt_adminemail'];
	$pass= $_POST['txt_adminpass'];
	$id= $_POST['txt_id'];
	if($id == ''){
//Insert
	$adminIns="insert into tbl_admin (admin_name,admin_email,admin_pass) values ('$name','$email','$pass')";
	if($con->query($adminIns))
	{
		?>
        	<script>
			alert('Insertion:Successfull')
			window.location='Admin_reg.php'
			</script>
        <?php
	}
	else{
		?>
        	<script>
			alert('Insertion:Error')
			window.location='Admin_reg.php'
			</script>
        <?php
		}
//Update
}
else{
		$adminEdit="update tbl_admin set admin_name ='".$name."',admin_email='".$email."',admin_pass='".$pass."' where admin_id=".$id;
	if($con->query($adminEdit)){
		?>
        	<script>
			alert('Updated successfully')
			window.location='Admin_reg.php'
			</script>
        <?php
		}
		else{
			?>
        	<script>
			alert('Update:Error')
			window.location='Admin_reg.php'
			</script>
        <?php
		}
	}
}
	if(isset($_GET['did']))
 	{
	 $delQry="delete from tbl_admin where admin_id= '".$_GET["did"]."'";
	 if ($con->query($delQry)){
		 ?>
        	<script>
			alert('Deleted Successfully')
			window.location='Admin_reg.php'
			</script>
        <?php
		}
		else{
			?>
        	<script>
			alert('Delete:Error')
			window.location='Admin_reg.php'
			</script>
        <?php
		}
	}
if(isset($_GET['eid'])){
	$selEdit="select * from tbl_admin where admin_id=".$_GET['eid'];	
	$editRes=$con->query($selEdit);
	$editData=$editRes->fetch_assoc();
	$aname=$editData['admin_name'];
	$aemail=$editData['admin_email'];
	$apass=$editData['admin_pass'];
	$aid=$editData['admin_id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Reg</title>
</head>

<body><form action="" method="post"><table width="281" border="1" align="center">
<input type="hidden" name="txt_id" id="txt_cat" value="<?php echo $aid ?>" /></td>
  <tr>
    <td width="149">Admin_name</td>
    <td width="116"><label for="txt_adminname"></label>
      <input type="text" name="txt_adminname" id="txt_adminname" value="<?php echo $aname ?>" </td>
  </tr>
  <tr>
    <td>Admin_email</td>
    <td><label for="txt_adminemail"></label>
      <input type="email" name="txt_adminemail" id="txt_adminemail" value="<?php echo $aemail ?>" /></td>
  </tr>
  <tr>
    <td>Admin_password</td>
    <td><label for="txt_adminpass"></label>
      <input type="password" name="txt_adminpass" id="txt_adminpass" value="<?php echo $apass ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Reset" /></td>
    </tr>
</table>
  <p>&nbsp;</p>
  <table width="534" border="1">
  <tr>
    <th width="116" scope="col">Admin_id</th>
    <th width="137" scope="col">Admin_name</th>
    <th width="112" scope="col">Admin_email</th>
    <th width="141" scope="col">Admin_password</th>
    <th width="116" scope="col">Action</th>
  </tr>
  <?php
  	$adminsel="select * from tbl_admin";
	$result = $con->query($adminsel);
	$i=0;
	while($data = $result->fetch_assoc())
	{
		$i++;
	?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['admin_name'] ?></td>
    <td><?php echo $data['admin_email'] ?></td>
    <td><?php echo $data['admin_pass'] ?></td>
    <td><a href="Admin_reg.php?did=<?php echo $data["admin_id"] ?>">Delete</a>
    <br />
    <a href="Admin_reg.php?eid=<?php echo $data["admin_id"] ?>">Edit</a></td>
  </tr>
  <?php
	}
	?>
</table>
</form>
</body>
</html>