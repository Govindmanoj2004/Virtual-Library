<!-- <option value="">--Genre--</option> -->
<?php
include("../Connection/connection.php");
$selQry="select * from tbl_genre where genre_cat=".$_GET['did'];
$result=$con->query($selQry);
while($data=$result->fetch_assoc())
{
?>
<option value="<?php echo $data['genre_id'] ?>">
    <?php echo $data['genre_name'] ?>
</option>
<?php
}
?>