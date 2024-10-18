<?php
 include("../Assets/Connection/connection.php");
 include('Header.php');
 if(isset($_POST['btn_submit']))
 {
	$genre = $_POST['txt_cat'];
	$cat = $_POST['selct_cat'];
	$genreIns="insert into tbl_genre (genre_name,genre_cat) values ('$genre','$cat')";
	if($con->query($genreIns))
	//Insertion
	{
		?>
		<script>
			alert('Inserted Successfully')
			window.location = 'Genre.php'
		</script>
		<?php
	}
	else{
		?>
		<script>
			alert('Failure')
			window.location = 'Genre.php'
		</script>
		<?php
	}
}

//Delete
 if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_genre where genre_id= '".$_GET["did"]."'";
	 if ($con->query($delQry)){
		 ?>
<script>
	alert('Deleted Successfully')
	window.location = 'Genre.php'
</script>
<?php
		}
		else{
			?>
<script>
	alert('Delete:Error')
	window.location = 'Genre.php'
</script>
<?php
		}
	}
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Genre</title>
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">Add Genre</h1>
    <form action="" method="post">
        <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $gid; ?>" />

        <div class="form-group row justify-content-center">
            <label for="selct_cat" class="col-sm-3 col-form-label text-right">Category</label>
            <div class="col-sm-5">
                <select name="selct_cat" id="selct_cat" class="form-control">
                    <option>---Category---</option>
                    <?php
                    $catSlct = "SELECT * FROM tbl_category";
                    $catResult = $con->query($catSlct);
                    while ($catData = $catResult->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $catData['cat_id']; ?>">
                            <?php echo $catData['cat_name']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="txt_cat" class="col-sm-3 col-form-label text-right">Genre</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="txt_cat" id="txt_cat" placeholder="Enter genre name">
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-sm-8 text-center">
                <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Add</button>
                <button type="reset" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Reset</button>
            </div>
        </div>
    </form>

    <h1 class="text-center mt-5">Genre List</h1>
    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Category</th>
                <th scope="col">Genre</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $genreselect = "SELECT * FROM tbl_genre g INNER JOIN tbl_category c ON c.cat_id = g.genre_cat";
            $result = $con->query($genreselect);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['cat_name']; ?></td>
                    <td><?php echo $data['genre_name']; ?></td>
                    <td><a href="Genre.php?did=<?php echo $data['genre_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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