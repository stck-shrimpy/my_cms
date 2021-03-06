<?php



// Create Post Query
if (isset($_POST['create_post'])) {

	$user_name = $_POST['user_name'];
	$post_title = $_POST['post_title'];
	$post_tags = $_POST['hiddenTags'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_status = $_POST['post_status'];
	$post_content = $_POST['post_content'];
	

	$safe_image = rand(1, 10000) . round(microtime(true)) . '_' . $post_image;
	move_uploaded_file($post_image_temp, "../images/$safe_image");

	$query  = "INSERT INTO posts(post_user, post_title, post_content, post_image, post_tags, post_date, post_status) ";
	$query .= "VALUES('{$user_name}', '{$post_title}', '{$post_content}', '{$safe_image}', '{$post_tags}', now(), '{$post_status}')";

	$create_post = mysqli_query($connection, $query);
	if (!$create_post) {
		die("Query Failed " . mysqli_error($connection));
	}

	$message = "投稿が完了しました。";
	$status = "success";
}

?>
<div class="col-md-6 mx-auto post-form">

	<form action="" method="post" enctype="multipart/form-data">
		<!-- Warning & Success Message -->
		<?php if (!empty($message)) { ?>
			<div class="alert alert-<?php echo "$status" ?> alert-dismissible fade show" role="alert">
				<strong><?php echo $message ?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php } ?>
		<!-- END -->
		<h1 class="text-center mb-5">投稿を作成</h3>
			<div class="form-group">
				<label for="exampleInputEmail1">
					<h6>ユーザ名</h3>
				</label>
				<input name="user_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="えびふらい">
			</div>
			<div class="form-group">

				<label for="exampleInputEmail1">
					<h6>タイトル</h3>
				</label>
				<input name="post_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="今日のおかず">
			</div>

			<div class="form-inline w-25 mb-1">
				<label for="exampleInputEmail1">
					<h6>タグを追加</h3>
				</label>


				<div class="form-group">
					<input type="hidden" id="hiddenTags" name="hiddenTags">
					<input class="form-control" type="search" id="inputTag">
					<button class="btn" type="button" id="addButton"><i class="fas fa-plus-circle fa-2x"></i></button>
				</div>

			</div>
			<div class="form-group mx-2" id="addTag"></div>
			<div class="form-group">
				<label for="exampleFormControlFile1">
					<h6>画像をアップロード</h5>
				</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">公開状態</label>
				<select name="post_status" class="form-control" id="exampleFormControlSelect1">
					<option value="公開">公開</option>
					<option value="非公開">非公開</option>

				</select>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">内容</label>
				<textarea name="post_content" class="form-control" id="summernote" rows="15"></textarea>
			</div>

			<button name="create_post" type="submit" class="btn btn-primary">投稿</button>
	</form>

</div>