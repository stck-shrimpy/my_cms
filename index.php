<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>

<div class="container post">
	<div class="row">
		<div class="col-md-8">

			<?php


			// Pagination Logic

			$per_page  = 4;
			$num_rows  = num_rows('posts');
			$num_pages = ceil($num_rows / $per_page);
			$offset = 0;


			if ($_GET['page_val']) {
				$selected_page = $_GET['page_val'];

				if ($selected_page == 1) {
					$offset = 0;
				} else {
					$offset = ($selected_page - 1) * $per_page;
				}

				$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $offset, $per_page";
				$selected_post = mysqli_query($connection, $query);

				if (!$selected_post) {
					die("Connection Failed " . mysqli_error($connection));
				}
			} else {

				$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $offset, $per_page";
				$selected_post = mysqli_query($connection, $query);
				if (!$selected_post) {
					die("Connection Failed " . mysqli_error($connection));
				}
			}


			while ($row = mysqli_fetch_assoc($selected_post)) {

				$post_id = $row['post_id'];
				$post_user = $row['post_user'];
				$post_title = $row['post_title'];
				$post_tags = $row['post_tags'];
				$post_image = $row['post_image'];
				$post_status = $row['post_status'];
				$post_date = $row['post_date'];
				$post_content = $row['post_content'];


			?>
				<div class="card-wrapper my-5">
					<div class="d-flex">
						<h1><?php echo $post_title ?></h1>
						<p class="ml-auto pt-4">作成：<?php echo $post_date ?></p>
					</div>

					<hr class="solid mb-3">
					<h5 class="mb-4">投稿者：<?php echo $post_user ?></h5>

					<div class="card my-4 text-dark">
						<img src="<?php echo post_image($post_image) ?>" class="card-img-top" alt="...">
						<div class="card-body">
							<!-- Show Tags -->
							<?php
							$string = $post_tags;
							$token = strtok($string, ",");
							$color_array = array("primary", "secondary", "success", "info", "danger", "warning", "dark");

							while ($token !== false) {
								$rand_num = rand(0, 6);
								$rand_color = $color_array[$rand_num];
								echo "<h6 class='d-inline'><span class='badge badge-{$rand_color} mr-2'>{$token}</span></h6>";
								$token = strtok(",");
							}
							?>
							<!-- END -->
							<p class="card-text"><?php echo $post_content ?></p>
							<a href="view_post.php?p_id=<?php echo $post_id ?>" class="btn btn-info">詳細</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>


		<div class="col-md-4">
			<div class="card my-4 mt-5">
				<div class="card-body ">
					<form class="form-inline" action="search_post.php" method="post">
						<label class="mb-3" for="keywoard-search">
							<h5>キーワードで検索</h5>
						</label>
						<input name="keyword" class="form-control mr-sm-2　" type="search" aria-label="Search">
						<button name="search_post" class="btn btn-outline-success my-1 ml-3" type="submit">検索</button>
					</form>
				</div>
			</div>

			<div class="card bg-light float-right">
				<a class="weatherwidget-io rounded col-xs-12" href="https://forecast7.com/ja/35d71139d73/tokyo/" style="width: 21.8rem" data-label_1="TOKYO" data-label_2="WEATHER" data-font="ヒラギノ角ゴ Pro W3" data-days="3" data-theme="weather_one">東京の天気</a>
			</div>
		</div>

	</div>


	<?php if ($num_pages > 1) { ?>

		<div class="row">
			<div class="col-md-12">
				<nav class="justify-content-center " id="pagination" aria-label="pagination">
					<ul class="pagination justify-content-center">
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>

						<?php for ($i = 1; $i <= $num_pages; $i++) { ?>
							<li class="page-item"><a class="page-link" href="index.php?page_val=<?php echo $i ?>"><?php echo $i ?></a></li>
						<?php } ?>


						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>


	<?php } ?>
</div>
<?php include("includes/footer.php") ?>