<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>


<div class="container-fluid bg-light">
	<div class="row">

		<!-- Include Side Nav -->
		<?php include("includes/side_nav.php") ?>
		<!-- END -->


		<!-- Include Post Form -->
		<?php
		if (isset($_GET['source'])) {
			$source = $_GET['source'];
			$post_id = $_GET['p_id'];
		}

		switch ($source) {

			case 'add_post';
				include 'includes/add_post.php';
				break;

			case 'edit_post';
				include 'includes/edit_post.php';
				break;

			case 'view_all_posts';
				include 'includes/view_all_posts.php';
				break;

			case 'delete_post';
				include 'includes/delete_post.php';
				break;

			case 'view_post';
				include 'includes/view_post.php';
				break;
		}

		?>
		<!-- END -->


	</div>
</div>



<?php include("includes/footer.php") ?>