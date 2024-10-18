// get_genre_sales.php
<?php
include("../Connection/connection.php");

$currentYear = date('Y');

// Fetch data for genre sales
$sql = "SELECT g.genre_name, SUM(b.booking_qty) AS books_sold
        FROM tbl_booking b
        INNER JOIN tbl_books bk ON b.book_id = bk.book_id
        INNER JOIN tbl_genre g ON bk.book_genre = g.genre_id
        WHERE YEAR(b.booking_date) = ?
        AND b.booking_status = 5  -- Assuming 1 means 'completed' or 'paid' bookings
        GROUP BY g.genre_name";

$stmt = $con->prepare($sql);
$stmt->bind_param('i', $currentYear);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array($row['genre_name'], (int)$row['books_sold']);
}

echo json_encode($data);
?>
