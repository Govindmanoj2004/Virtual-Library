<?php
include("../Assets/Connection/connection.php");
include("SessionValidation.php");
$id=$_SESSION['auid'];
//Insertion(Book)
if(isset($_POST['btn_save']))
{
	$name= $_POST['txt_name'];
	$des= $_POST['txt_des'];
	$type= $_POST['rbtn_type'];
	$isbn= $_POST['txt_isbn'];
	if($type=='0')
	{
		$rentPrice= $_POST['txt_rprice'];
		$sellPrice='0';
	}
	else if($type=='1')
	{
		$sellPrice= $_POST['txt_price'];
		$rentPrice='0';	
	}
	else if($type=='2')
	{
		$sellPrice= $_POST['txt_price'];
		$rentPrice= $_POST['txt_rprice'];
	}
  else if($type=='3')
  {
    $sellPrice='0';
    $rentPrice='0';
  }
	$genre=$_POST['lst_genre'];
  $cat=$_POST['lst_cat'];
	//cover
	$cover=$_FILES['fle_cover']['name'];
	$tempcover=$_FILES['fle_cover']['tmp_name'];
	move_uploaded_file($tempcover, '../Assets/Files/Author/BookCover/'.$cover);
	//file
	$book=$_FILES['fle_book']['name'];
	$tempbook=$_FILES['fle_book']['tmp_name'];
	move_uploaded_file($tempbook, '../Assets/Files/Author/Book/'.$book);
	//Insertion
	$stmt = $con->prepare("INSERT INTO tbl_books (book_author, book_name, book_des, book_sell, book_rent, book_type, book_file, book_genre, book_cover,book_isbn,book_cat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $id, $name, $des, $sellPrice, $rentPrice, $type, $book, $genre, $cover,$isbn,$cat);
    
    if ($stmt->execute()) {
        echo '<script>alert("Book listed successfully."); window.location = "Books.php";</script>';
    } else {
        echo '<script>alert("Insertion: Error"); window.location = "Books.php";</script>';
    }
    
    $stmt->close();
}
//Delete(Book)
if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_books where book_id= '".$_GET["did"]."'";
	 if ($con->query($delQry))
	 {
	?>
<script>
  alert('Deleted Successfull')
  window.location = 'Listings.php'
</script>
<?php
	 }
		else
		{
		?>
<script>
  alert('Deleted Unsuccessfull')
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
  <title>Books</title>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <h1 align="center">Books</h1>
    <table width="312" border="1" align="center">
      <tr>
        <td width="119">Name</td>
        <td width="177"><label for="txt_name"></label>
          <input requird type="text" name="txt_name" id="txt_name"
            title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter"
            pattern="^[A-Z]+[a-zA-Z ]*$" />
        </td>
      </tr>
      <tr>
        <td width="119">ISBN</td>
        <td width="177"><label for="txt_name"></label>
          <input requird type="text" name="txt_isbn" id="txt_isbn" />
        </td>
      </tr>
      <tr>
        <td>Description</td>
        <td><label for="txt_desc"></label>
          <textarea requird name="txt_des" cols="" rows=""></textarea>
        </td>
      </tr>
      <tr>
        <td>Selling Price</td>
        <td><label for="txt_price"></label>
          <input type="text" name="txt_price" id="txt_price" />
        </td>
      </tr>
      <tr>
        <td>Rent Price</td>
        <td><label for="txt_rprice"></label>
          <input type="text" name="txt_rprice" id="txt_rprice" />
        </td>
      </tr>
      <tr>
        <td>Type</td>
        <td>
          <input type="radio" name="rbtn_type" id="rbtn_type" value="1" />
          Sell<br />
          <?php
		$slct="select * from tbl_subscription where author_id='".$id."'";
		$result1=$con->query($slct);
		if($result1->num_rows>0)
		{
		?>
          <input type="radio" name="rbtn_type" id="rbtn_type" value="0" />Rent<br />
          <?php
		}
		?>
          <input type="radio" name="rbtn_type" id="rbtn_type" value="2" />
          Both<br />
          <input type="radio" name="rbtn_type" id="rbtn_type" value="3" />Free<br />
        </td>
      </tr>
      <tr>
        <td>Book Cover</td>
        <td><input requird name="fle_cover" type="file" accept="image/png,image/jpeg" /></td>
      </tr>
      <tr>
        <td>File</td>
        <td><label for="fle_book"></label>
          <input requird type="file" name="fle_book" id="fle_book" accept=".pdf" />
        </td>
      </tr>
      <tr>
        <td>Category</td>
        <td><label for="lst_cat"></label>
          <select name="lst_cat" id="lst_cat" onChange="getGenre(this.value)" required>
            <option>---Category---</option>
            <?php
		          $dissel = "select * from tbl_category";
		          $result1=$con->query($dissel);
		          while($data1 = $result1->fetch_assoc()){
		          ?>
              <option value="<?php echo $data1['cat_id'] ?>">
              <?php echo $data1['cat_name'] ?>
            </option>
            <?php
		}
		?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Genre</td>
        <td><label for="lst_genre"></label>
          <select name="lst_genre" id="lst_genre">
            <option>---Genre---</option>

          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="ADD" /></td>
      </tr>
    </table>
  </form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getGenre(did) {
    console.log(did);
    $.ajax({
      url: "../Assets/AjaxPages/AjaxGenre.php?did=" + did,
      success: function (result) {

        $("#lst_genre").html(result);
        console.log(result);
      }
    });
  }
</script>

</html>