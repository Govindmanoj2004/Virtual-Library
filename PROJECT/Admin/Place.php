<?php
include("../Assets/Connection/connection.php");
include('Header.php');
if(isset($_POST['btn_submit'])){
	$place = $_POST['txt_place'];
	$district = $_POST['selct_dis'];
	$placeIns="insert into tbl_place (district_id,place_name) values ('$district','$place')";
	if($con->query($placeIns)){
		echo "Inserted Successfully";
		}
		else{
			echo "Failure";
		}
	}
	if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_place where place_id= '".$_GET["did"]."'";
	 if ($con->query($delQry)){
		 echo "Deleted";
		}
		else{
			echo "Failure";
		}
	}
	 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Add Place</h1>
    <form action="" method="post">
        <div class="form-group row justify-content-center">
            <label for="selct_dis" class="col-sm-3 col-form-label text-right">Select District:</label>
            <div class="col-sm-5">
                <select class="form-control" name="selct_dis" id="selct_dis">
                    <option>--- District ---</option>
                    <?php
                    $dissel = "SELECT * FROM tbl_district";
                    $result = $con->query($dissel);
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="txt_place" class="col-sm-3 col-form-label text-right">Place:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="txt_place" id="txt_place" placeholder="Enter place name">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col-sm-8 text-center">
                <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Add</button>
                <button type="reset" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
            </div>
        </div>
    </form>

    <h1 class="text-center mt-5">Place List</h1>
    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">District</th>
                <th scope="col">Place</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $placeSele = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON d.district_id = p.district_id";
            $result = $con->query($placeSele);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['district_name']; ?></td>
                    <td><?php echo $data['place_name']; ?></td>
                    <td><a href="Place.php?did=<?php echo $data['place_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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