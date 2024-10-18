<?php
include("../Assets/Connection/Connection.php");
include('Header.php');
if(isset($_POST['btn_submit']))
{
	$cat = $_POST['txt_cat'];

	$selDis="select * from tbl_category where cat_name='".$cat."'";
	$result1=$con->query($selDis);
	if($result1->num_rows>0)
	{
		?>
        	<script>
			alert('Duplicate')
			window.location='Category.php'
			</script>
        <?php	
	}
	else
	{
			$distIns="insert into tbl_category (cat_name) values ('$cat')";
		if($con->query($distIns))
		{
			?>
        	<script>
			alert('Inserted')
			window.location='Category.php'
			</script>
        <?php
			}
			else
			{
				?>
        	<script>
			alert('Error')
			window.location='Category.php'
			</script>
        <?php
			}
		}
	}
	if(isset($_GET['did']))
 	{
	 $delQry="delete from tbl_category where cat_id= '".$_GET["did"]."'";
	 if ($con->query($delQry)){
		 ?>
        	<script>
			alert('Deleted..')
			window.location='Category.php'
			</script>
        <?php
		}
		else{
			?>
        	<script>
			alert('Error:Record not deleted.')
			window.location='Category.php'
			</script>
        <?php
		}
	}
	 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">Add Category</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group row justify-content-center">
            <label for="txt_cat" class="col-sm-3 col-form-label text-right">Category</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="txt_cat" id="txt_cat" placeholder="Enter category name">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col-sm-8 text-center">
                <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Add</button>
                <button type="reset" class="btn btn-secondary" name="btn_clear" id="btn_clear">Clear</button>
            </div>
        </div>
    </form>

    <h1 class="text-center mt-5">Category List</h1>
    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Genre Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $distSel = "SELECT * FROM tbl_category";
            $result = $con->query($distSel);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['cat_name']; ?></td>
                    <td><a href="Category.php?did=<?php echo $data['cat_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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