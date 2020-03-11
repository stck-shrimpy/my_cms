<?php
// Update Post View Count
update_post_views($post_id);

// Select Post By Post ID
$query = "SELECT * FROM posts WHERE post_id = {$post_id}";
$selected_post = mysqli_query($connection, $query);
if (!$selected_post) {
	die("Connection Failed " . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($selected_post)) {
	$db_post_id = $row['post_id'];
	$db_post_user = $row['post_user'];
	$db_post_title = $row['post_title'];
	$db_post_tags = $row['post_tags'];
	$db_post_image = $row['post_image'];
	$db_post_status = $row['post_status'];
	$db_post_date = $row['post_date'];
	$db_post_content = $row['post_content'];
}
?>

<div class="col-md-8 offset-2 pt-5 mt-2">
	<div class="card-wrapper" style="width: 70%">
		<div class="d-flex">
			<h1><?php echo $db_post_title ?></h1>
			<p class="ml-auto pt-4">作成：<?php echo $db_post_date ?></p>
		</div>

		<hr class="solid mb-3">
		<h5 class="mb-4">投稿者：<?php echo $db_post_user ?></h5>
		<div class="card view-post">

			<img class="card-img-top" src="../images/<?php echo $db_post_image ?>" alt="Card image cap">
			<div class="card-body">
				<p class="card-text"><?php echo $db_post_content ?></p>

			</div>

		</div>
		<div class="button-group mt-4">
			<a role='button' class='btn btn-dark mr-3' href='posts.php?source=view_all_posts'><i class="fas fa-undo-alt fa-sm pr-2"></i>戻る</a>
			<a role='button' class='btn btn-info mr-3' href='posts.php?source=edit_post&p_id=<?php echo $post_id ?>'><i class="fas fa-edit fa-sm pr-2"></i>修正</a>
			<button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt fa-sm pr-2"></i>削除</button>
		</div>
		<!-- Button trigger modal -->



	</div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">本当に削除しますか？</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">閉じる</button>
				<a role="button" class="btn btn-danger" href='posts.php?source=delete_post&p_id=<?php echo $post_id ?>'>削除する</a>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END -->