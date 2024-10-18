<?php
// fetch_sales_data.php
session_start();
include("../Connection/Connection.php");

// Fetch top 5 selling books with total sales for each month
$query = "SELECT b.book_name, SUM(bo.booking_qty) AS total_sales, DATE_FORMAT(bo.booking_date, '%Y-%m') AS month
          FROM tbl_booking bo
          JOIN tbl_books b ON bo.book_id = b.book_id
          WHERE bo.booking_status = 5
          GROUP BY b.book_name, month
          ORDER BY total_sales DESC
          LIMIT 5";

$result = $con->query($query);
$data = [];

if($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'period' => $row['month'],
            'book_name' => $row['book_name'],
            'total_sales' => $row['total_sales']
        ];
    }
}

// Return data as JSON
echo json_encode($data);
?>
