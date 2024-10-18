<?php
session_start();
//submit_rating.php
include("../Connection/Connection.php");

if(isset($_POST["rating_data"]))
{

	$ins = "INSERT INTO tbl_review(user_id,review_rating,review_content,review_datetime,book_id) VALUES ('".$_SESSION["uid"]."','".$_POST["rating_data"]."','".$_POST["user_review"]."',NOW(),'".$_POST["book_id"]."')";
	
	if($con->query($ins))
{
	echo "Your Review & Rating Successfully Submitted";
}
else
{
	echo "Your Review & Rating Insertion Failed";
}

}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "SELECT * FROM tbl_review r inner join tbl_user u on r.user_id=u.user_id where book_id = '".$_POST["bid"]."' ORDER BY review_id DESC";

	$result = $con->query($query);

	while($row = $result->fetch_assoc())
	{
		$review_content[] = array(
			'user_id'		=>	$row["user_id"],
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["review_content"],
			'rating'		=>	$row["review_rating"],
			'datetime'		=>	$row["review_datetime"]
		);

		if($row["review_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["review_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["review_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["review_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["review_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["review_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>