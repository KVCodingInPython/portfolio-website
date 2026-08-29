<?php

session_start();
$logged_in = isset($_SESSION['email']);


$servername = "127.0.0.1";
$username = "root";
$db_password = "root";
$dbname = "posts";
$comments_dbname = "comments";

$conn = new mysqli($servername, $username, $db_password, $dbname);
$comments_conn = new mysqli($servername, $username, $db_password, $comments_dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if ($comments_conn->connect_error) {
	die("Connection failed: " . $comments_conn->connect_error);
}

/*
   SQL query to retrieve blog posts
*/

$sql = "SELECT ID, title, content, date FROM POSTS";

$result = mysqli_query($conn, $sql);

// Add comment if submit button is clicked and user is logged in
if (isset($_POST['submit_comment']) && $logged_in == true) {
	$post_id = $_POST['post_id'];
	$comment = trim($_POST['comment']);
	if (!empty($comment)) {

	if (isset($_POST['editing_comment_id']) && $_POST['editing_comment_id'] != '') {
		$editing_comment_id = $_POST['editing_comment_id'];
		$update_sql = "UPDATE COMMENTS SET comment = '$comment' WHERE ID = '$editing_comment_id'";
		$update_result = $comments_conn->query($update_sql);
	} else {

		$comment_sql = "INSERT INTO COMMENTS (post_id, comment) VALUES ('$post_id', '$comment')";
		$comment_result = $comments_conn->query($comment_sql);
	}
	
   }
}

// Delete comment if delete button is clicked and user is admin
if (isset($_POST['delete_comment']) && isset($_SESSION['email']) && $_SESSION['email'] == 'kaloyanvelikov8@gmail.comab') {
	$comment_id = $_POST['comment_id'];
	$delete_sql = "DELETE FROM COMMENTS WHERE ID = '$comment_id'";
	$delete_result = $comments_conn->query($delete_sql);
}

if (isset($_POST['delete_post']) && isset($_SESSION['email']) && $_SESSION['email'] == 'kaloyanvelikov8@gmail.comab') {

	$post_id = $_POST['post_id'];

	// Delete all comments linked to the post first
	$delete_comments_sql =
		"DELETE FROM COMMENTS WHERE post_id = '$post_id'";

	$comments_conn->query($delete_comments_sql);

	// Then delete the blog post
	$delete_post_sql =
		"DELETE FROM POSTS WHERE ID = '$post_id'";

	$conn->query($delete_post_sql);
}

// Edit comment if edit button is clicked and user is admin

$editing_comment = false;

$editing_comment_id = "";

$editing_text = "";

if (isset($_POST['edit_comment']) && isset($_SESSION['email']) && $_SESSION['email'] == 'kaloyanvelikov8@gmail.comab') {

    $editing_comment = true;

    $editing_comment_id =
        $_POST['comment_id'];

    $editing_text =
        $_POST['existing_comment'];
}


/*
   Store each database row inside the PHP array
*/

if ($result && mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
		$date = new DateTime($row['date']);
        $date->setTimezone(new DateTimeZone('UTC'));
	
        $blogs[] = [
			"ID" => $row['ID'],
            "title" => $row['title'],
            "content" => $row['content'],
            "date" => $date->format("jS F Y, H:i") . " UTC",

        ];
    }
}




$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/viewBlog.css" />

	<!-- Media queries/ responsive scaling for mobile devices 	-->
	<link rel = "stylesheet" href = "../css/viewBlog-mobile.css" media = "screen and (min-width:320px) and (max-width: 768px)" />
	
	<title>Blog Posts</title>
</head>
<body>
	<article class="grid-container">
		<section id="navbar">
			<div class="nav-container">
				<div><h1>Blog</h1></div>
				<nav>
					<ul>
						<?php if ($logged_in): ?>
                        	<div> <li> <a href = "../php/logout.php"> Logout </a> </li> </div>
						<?php else: ?>
							<div> <li> <a href = "../php/login.php"> Login </a> </li> </div>
						<?php endif; ?>
                        <div> <li> <a href = "../php/index.php"> Homepage </a> </li> </div>
                        <div> <li> <a href = "../php/education.php"> Education </a> </li> </div>
                        <div> <li> <a href = "../php/skills.php"> Skills </a> </li> </div>
                        <div> <li> <a href = "../php/portfolio.php"> Portfolio </a> </li> </div>
                        <div> <li> <a href = "../php/contact.php"> Contact </a> </li> </div>
					</ul>
				</nav>
			</div>
		</section>

		<div class = "welcome">
    		<?php if ($logged_in): ?>
        	  <p> <aside> <h2> Welcome User </h2> </aside> </p>
            <?php endif; ?>
        </div>


		<main id = "addEntry">
			<?php if (isset($_SESSION['email']) && $_SESSION['email'] == 'kaloyanvelikov8@gmail.comab'): ?>
				<div class="add-entry">
					<button> <a href="../php/addEntry.php">Add New Blog Post</a> </button>
				</div>
			<?php endif; ?>
		</main>

		<main id="blog_posts">
			<?php if ($result && $result->num_rows > 0): ?>
					<section>
						<?php
							for ($i = 0; $i < count($blogs) - 1; $i++) {

								for ($j = 0; $j < count($blogs) - $i - 1; $j++) {

									if (strtotime($blogs[$j]['date']) < strtotime($blogs[$j + 1]['date'])) {

										$temp = $blogs[$j];
										$blogs[$j] = $blogs[$j + 1];
										$blogs[$j + 1] = $temp;
									}
								}
							}

							$months = [];

							foreach ($blogs as $blog) {
								$month = date("F", strtotime($blog['date']));

								if (!in_array($month, $months)) {
									$months[] = $month;
								}
							}

							$selectedMonth = "";
							if (isset($_POST['month'])) {
								$selectedMonth = $_POST['month'];
							}

							?> <h1> Blog Archive </h1>
							   <form method = "post">
								<select name = "month">
									<option value = "">All Posts</option>
									<?php foreach ($months as $month): ?>
										<option value = "<?php echo $month; ?>"
											<?php if ($selectedMonth == $month) {
												echo "selected";
											      }  
											?>
										>
											<?php echo $month; ?>

										</option>

									<?php endforeach; ?>
								</select>
								<button type = "submit">Filter</button>
							   </form>

							


							<?php
							foreach ($blogs as $blog) {
								$post_id = $blog['ID'];

								$comment_sql = "SELECT ID, comment FROM COMMENTS WHERE post_id = $post_id";
								$comment_result = $comments_conn->query($comment_sql);

								$blogMonth = date("F", strtotime($blog['date']));
								?>
								<?php if ($selectedMonth == "" || $selectedMonth == $blogMonth) { ?>
								   <div class = "blog-post">
									<?php if (isset($_SESSION['email']) && $_SESSION['email'] == 'kaloyanvelikov8@gmail.com12') { ?>
										<form method="post">
											<input type="hidden" name="post_id" value="<?php echo $blog['ID']; ?>">
											<button type="submit" name="delete_post"> Delete Post </button>
										</form>
								<?php } ?>
							

									<div class = "post-date"> <?php
										echo "<p>" . ($blog['date']) . "</p>";
									?> </div>
									
									<div class = "post-header"> <?php
										echo "<h2>" . ($blog['title']) . "</h2>";
									?> </div> <?php

									?> <div class = "post-content"> <?php
										echo "<p>" . ($blog['content']) . "</p>";
								 	?> </div> 

									<form method = "post">

										<div class = "comments">
											<h3> Comments </h3>
											<?php while ($comment_row = $comment_result->fetch_assoc()) { ?>
												<p> 
													<strong>
														<?php echo $comment_row['comment']; ?>
													</strong>
												</p>

												<?php if (isset($_SESSION['email']) && $_SESSION['email'] == 'kaloyanvelikov8@gmail.com12') { ?>
													<form method = "post">
														
														<input type = "hidden" name = "comment_id" value = "<?php echo $comment_row['ID']; ?>">
														<input type = "hidden" name = "existing_comment" value = "<?php echo $comment_row['comment']; ?>">
														<button type = "submit" name = "delete_comment"> Delete Comment </button>
														<button type = "submit" name = "edit_comment"> Edit Comment </button>
													</form>
											<?php } ?>

											<?php if ($editing_comment == true && $editing_comment_id == $comment_row['ID']) { ?>
												<form method="post">

        										<input type = "hidden" name = "editing_comment_id" value="<?php echo $editing_comment_id; ?>">

												<input type = "hidden" name = "post_id" value="<?php echo $blog['ID']; ?>">

												<textarea name = "comment" placeholder = "Edit comment...">
													<?php

														echo $editing_text;

													?>
												</textarea>

												<button type = "submit" name = "submit_comment">Save Comment</button>
												</form>

										<?php } ?>
									<?php } ?>


									<form method = "post">
										<input type = "hidden" name = "post_id" value="<?php echo $blog['ID']; ?>">
										<textarea name = "comment" placeholder = "Add a comment..."></textarea>
										<button type="submit" name="submit_comment">Submit</button>
										</div>
									</div>
								   </form> <?php } ?>
											
								   </div> 
								</div> 
						<?php }
						?>



		

					</section>
			<?php else:
				header("Location:  ../php/login.php"); 
				exit();
				?>
				<section class="no-posts">
					<p>No blog posts have been added yet.</p>
				</section>
			<?php endif; ?>
		</main>
	</article>
</body>
</html>

<?php
$conn->close();
?>
