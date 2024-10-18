<?php
include("../Assets/Connection/Connection.php");
include('Header.php');
if(isset($_POST['btn_submit'])){
	$district = $_POST['txt_district'];
	
	$selDis="select * from tbl_district where district_name='".$district."'";
	$result1=$con->query($selDis);
	if($result1->num_rows>0)
	{
		?>
        	<script>
			alert('Duplicate')
			window.location='District.php'
			</script>
        <?php	
	}
	else
	{
			$distIns="insert into tbl_district (district_name) values('$district')";
		if($con->query($distIns))
		{
			?>
        	<script>
			alert('Inserted')
			window.location='District.php'
			</script>
        <?php
			}
			else
			{
				?>
        	<script>
			alert('Error')
			window.location='District.php'
			</script>
        <?php
			}
		}
	}
	if(isset($_GET['did']))
 	{
	 $delQry="delete from tbl_district where district_id= '".$_GET["did"]."'";
	 if ($con->query($delQry)){
		 ?>
        	<script>
			alert('Deleted')
			window.location='District.php'
			</script>
        <?php
		}
		else{
			?>
        	<script>
			alert('Failure in deletion')
			window.location='District.php'
			</script>
        <?php
		}
	}
	 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">Add District</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group row justify-content-center">
            <label for="txt_district" class="col-sm-2 col-form-label text-right">District</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="txt_district" id="txt_district" placeholder="Enter district">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col-sm-4 text-center">
                <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Add</button>
                <button type="reset" class="btn btn-secondary" name="btn_clear" id="btn_clear">Clear</button>
            </div>
        </div>
    </form>

    <h1 class="text-center mt-5">District List</h1>
    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">District</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $distSel = "SELECT * FROM tbl_district";
            $result = $con->query($distSel);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['district_name']; ?></td>
                    <td><a href="District.php?did=<?php echo $data['district_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
<?php
include('Footer.php');
?>
</html>