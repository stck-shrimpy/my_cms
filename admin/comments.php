<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>


<div class="container-fluid bg-light">
	<div class="row">

		<!-- Include Side Nav -->
		<?php include("includes/side_nav.php") ?>
		<!-- END -->


		<!-- Include Comment Form -->
		<?php
		if (isset($_GET['source'])) {
			$source = $_GET['source'];
		}

		switch ($source) {

			case 'view_all_comments';
				include 'includes/view_all_comments.php';
				break;

			case 'delete_comment';
				include 'includes/delete_comment.php';
				break;
		}

		?>
		<!-- END -->


	</div>
</div>



<?php include("includes/footer.php") ?>