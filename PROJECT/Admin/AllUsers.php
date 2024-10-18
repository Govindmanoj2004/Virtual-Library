<?php
include("../Assets/Connection/connection.php");
include('Header.php');
$new="0";
$accept="1";
$reject="2";
if(isset($_GET['aid']))
 {
	 $acceptQry="update tbl_author set author_flag='".$accept."' where author_id='".$_GET["aid"]."'";
	 if ($con->query($acceptQry))
	 {
		 ?>
        	<script>
			alert('Author Accepted')
			window.location='NewAuthor.php'
			</script>
        <?php
		}
	}
if(isset($_GET['rid']))
 {
	 $acceptQry="update tbl_author set author_flag='".$reject."' where author_id='".$_GET["rid"]."'";
	 if ($con->query($acceptQry))
	 {
		 ?>
        	<script>
			alert('Author Rejected')
			window.location='NewAuthor.php'
			</script>
        <?php
		}
	}	 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All users</title>
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">New Author</h1>
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
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $authorsel = "SELECT * FROM tbl_user a 
                          INNER JOIN tbl_district d ON d.district_id = a.user_district 
                          INNER JOIN tbl_place p ON p.place_id = a.user_place";
            $result = $con->query($authorsel);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['user_name']; ?></td>
                    <td><?php echo $data['user_email']; ?></td>
                    <td><?php echo $data['user_contact']; ?></td>
                    <td><?php echo $data['district_name']; ?></td>
                    <td><?php echo $data['place_name']; ?></td>
                    <td><?php echo $data['user_address']; ?></td>
                    <td>
                        <img src="../Assets/Files/User/Photo/<?php echo $data['user_photo']; ?>" width="48" class="img-thumbnail">
                    </td>
                    <td>
                        <img src="../Assets/Files/User/Proof/<?php echo $data['user_proof']; ?>" width="49" class="img-thumbnail" alt="Could'nt load">
                    </td>
                    <!-- <td>
                        <a href="NewAuthor.php?aid=<?php echo $data['user_id']; ?>" class="btn btn-success btn-sm mb-2">Accept</a>
                        <a href="NewAuthor.php?rid=<?php echo $data['user_id']; ?>" class="btn btn-danger btn-sm">Reject</a>
                    </td> -->
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