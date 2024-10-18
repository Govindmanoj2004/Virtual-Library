<?php
include("../Assets/Connection/Connection.php");
include("SessionValidation.php");
$auId=$_SESSION['auid'];
if(isset($_GET['pid']))
{
    $pId=$_GET['pid'];
        $up ="insert into tbl_subscription (author_id,package_id,sub_date) values ('".$auId."','".$pId."',curdate())";
        if($con->query($up))
        {
            header('location: Payment.php?action0='.print $data["package_id"]);
        }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buy Premium</title>
</head>

<body>
<h2 align="center">Premium Package List</h2>
<table width="200" border="1" align="center">
  <tr>
    <td>Sl.no</td>
    <td>Package Name</td>
    <td>Price</td>
    <td>Duration</td>
    <td>Action</td>
  </tr>
  <tr>
  <?php
	$packageSel="select * from tbl_package";
	$result = $con->query($packageSel);
	$i=0;
	while($data = $result->fetch_assoc())
	{
		$i++;
	?>
    <td><?php echo $i ?></td>
    <td><?php echo $data['package_title'] ?></td>
    <td><?php echo $data['package_amount'] ?></td>
    <td><?php echo $data['package_days'] ?></td>
    <td><a href="../Author/Premium.php?pid=<?php echo $data["package_id"] ?>">Buy Premium</a></td>
  </tr>
  <?php
	}
  ?>
</table>

</body>
</html>