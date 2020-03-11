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
			$user_id = $_GET['u_id'];
		}

		switch ($source) {

			case 'add_user';
				include 'includes/add_user.php';
				break;

			case 'edit_user';
				include 'includes/edit_user.php';
				break;

			case 'view_all_users';
				include 'includes/view_all_users.php';
				break;

			case 'delete_user';
				include 'includes/delete_user.php';
				break;
		}

		?>
		<!-- END -->


	</div>
</div>



<?php include("includes/footer.php") ?>