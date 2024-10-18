<?php
include("../Assets/Connection/connection.php");
include('Header.php');
$verify="1";
$unverify="2";
if(isset($_GET['aid']))
 {
	 $acceptQry="update tbl_author set author_flag='".$verify."' where author_id='".$_GET["aid"]."'";
	 if ($con->query($acceptQry))
	 {
		 ?>
        	<script>
			alert('Author status changed from rejected to verified.')
			window.location='VerifiedAuthors.php'
			</script>
        <?php
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rejected Authors</title>
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">Rejected Authors</h1>
    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Sl.no</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">District</th>
                <th scope="col">Place</th>
                <th scope="col">Address</th>
                <th scope="col">Photo</th>
                <th scope="col">Proof</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $authorsel = "SELECT * FROM tbl_author a 
                          INNER JOIN tbl_district d ON d.district_id = a.author_district 
                          INNER JOIN tbl_place p ON p.place_id = a.author_place 
                          WHERE author_flag='" . $unverify . "'";
            $result = $con->query($authorsel);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['author_name']; ?></td>
                    <td><?php echo $data['author_email']; ?></td>
                    <td><?php echo $data['author_contact']; ?></td>
                    <td><?php echo $data['district_name']; ?></td>
                    <td><?php echo $data['place_name']; ?></td>
                    <td><?php echo $data['author_address']; ?></td>
                    <td>
                        <img src="../Assets/Files/Author/Photo/<?php echo $data['author_photo']; ?>" width="48" class="img-thumbnail">
                    </td>
                    <td>
                        <img src="../Assets/Files/Author/Proof/<?php echo $data['author_proof']; ?>" width="49" class="img-thumbnail">
                    </td>
                    <td>
                        <a href="RejectedAuthors.php?aid=<?php echo $data['author_id']; ?>" class="btn btn-primary btn-sm">Verify</a>
                    </td>
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