<?php
include("../Connection/connection.php");  
$bid=$_GET['bid'];
$qty=$_GET['qty'];
$insQua="insert into tbl_stock (book_id,stock_quan) values ('$bid','$qty')";
if($con->query($insQua))
{
    echo "Stock Added.";
}
else
{
	echo "Error:Stock not added.";
}
?>