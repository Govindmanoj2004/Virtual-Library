<?php
include("../Connection/connection.php");
?>
<div class="bricks-wrapper">

	<?php
		$slctQury="select * from tbl_books b INNER JOIN tbl_genre g on g.genre_id=b.book_genre INNER JOIN tbl_author a on a.author_id=b.book_author where TRUE";
		if($_GET['genre']!="")
		{		
			$genre=$_GET['genre'];
			$slctQury=$slctQury." and b.book_genre in(".$genre.")";
		}
		if($_GET['category']!="")
		{		
			$category=$_GET['category'];
			$slctQury=$slctQury." and b.book_cat in(".$category.")";
		}
		if($_GET['book']!="")
		{		
			$book=$_GET['book'];
			$slctQury=$slctQury." and b.book_name like '%$book%' or a.author_name like '%$book%' or b.book_isbn like '%$book%'";
		}
		$result=$con->query($slctQury);
		while($data=$result->fetch_assoc())
		{
		?>
	<article class="brick entry">

<div class="entry__thumb">
	<a href="Viewmore.php?bookid=<?php echo $data['book_id'] ?>" class="thumb-link">
		<img src="../Assets/Files/Author/BookCover/<?php echo $data['book_cover'] ?>" alt="">
	</a>
</div> 

<div class="entry__text">
	<div class="entry__header">
		<div class="entry__meta">
			<span class="cat-links">
				<a href="#">Genre:
					<?php echo $data['genre_name'] ?>
				</a>
			</span>
			<span class="byline">
				By:
				<a href="#0">
					<?php echo $data['author_name'] ?>
				</a>
			</span>
		</div>
		<h1 class="entry__title"><a href="">
				<?php echo $data['book_name'] ?>.
			</a></h1>
	</div>
	<div class="entry__except">
		<p>
			<?php 
				$max_length = 150; // Set the maximum length of the paragraph
				$book_des = $data['book_des'];
				if(strlen($book_des) > $max_length) {
					$book_des = substr($book_des, 0, $max_length) . '...'; // Truncate and add ellipsis
				}
				echo $book_des; 
			?>
		</p>
	</div>
	<div>
		<a class="entry__more-link" href="Viewmore.php?bookid=<?php echo $data['book_id'] ?>">View More</a>
	</div>
</div> 

</article>
<!-- end article -->
	<?php
		}
		?>
</div> <!-- end bricks-wrapper -->
