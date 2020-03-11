<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>

<?php 
    if(isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        update_post_views($post_id);
        $title = id_to_title('posts', 'post_id', $post_id );
        echo "<h1>$title</h1>";
        // Post Query By Post ID
        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $find_post = mysqli_query($connection, $query);
        if(!$find_post) {
            die("Connection Failed " . mysqli_error($connection));
        }
        
        
        while($row = mysqli_fetch_assoc($find_post)) {
            $db_post_id = $row['post_id'];
            $db_post_user = $row['post_user'];
            $db_post_title = $row['post_title'];
            $db_post_tags = $row['post_tags'];
            $db_post_image = $row['post_image'];
            $db_post_status = $row['post_status'];
            $db_post_date = $row['post_date'];
            $db_post_content = $row['post_content'];
        }
        // Find Comment Query
        $query = "SELECT * FROM comments WHERE post_id = $post_id ORDER BY comment_id DESC";
        $find_comments = mysqli_query($connection, $query);
        if(!$find_comments) {
            die("Connection Failed " . mysqli_error($connection));
        }

        
       
    }

    // Add Comment Query
    if(isset($_POST['add_comment'])) {
        $comment_content = $_POST['comment_content'];
        $query = "INSERT INTO comments(post_id, user_id, user_name, comment_content) VALUES($post_id, $user_id, '{$user_name}', '{$comment_content}') ";
        $add_comment = mysqli_query($connection, $query);
        if(!$add_comment) {
            die("Connection Failed " . mysqli_error($connection));
        }

        header("Location: view_post.php?p_id={$post_id}");
    }
       
    


?>

<div class="container post">
    <div class="col-md-12 offset-2 pt-5 mt-2">
        <div class="card-wrapper" style="width: 70%">
            <div class="d-flex">
                <h1><?php echo $db_post_title ?></h1>
                <p class="ml-auto pt-4">作成：<?php echo $db_post_date ?></p>
            </div>

            <hr class="solid mb-3">
            <?php echo "<h1> $user_id </h1>" ?>
            <h5 class="mb-4">投稿者：<?php echo $db_post_user ?></h5>
            <div class="card view-post">

                <img class="card-img-top" src="<?php echo post_image($db_post_image) ?>" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?php echo $db_post_content ?></p>

                </div>

            </div>
            <hr class="solid mt-4">

            <?php if($_SESSION['user_status'] == 'login') { ?>
            <div class="card mt-5">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">コメント</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button name="add_comment" type="submit" class="btn btn-primary">投稿</button>
                    </form>
                </div>
            </div>
            <?php } ?>

            <!-- Display Comments -->
            <?php  while($row = mysqli_fetch_assoc($find_comments)) { 
            $db_comment_id = $row['comment_id'];
            $db_comment_content = $row['comment_content'];
            $db_user_id = $row['user_id'];
            $db_user_name = $row['user_name'];

            ?> 
            <div class="media mt-4">
                <img class="mr-4" src="http://placehold.jp/50x50.png" alt="">
                <div class="media-body">
                    <p class="mt-0"><?php echo $db_user_name ?></p>
                    <?php echo $db_comment_content ?>
                </div>
            </div>
            <hr class="solid">
            <?php } ?> 
            <div class="button-group my-4">
                

                <a role='button' class='btn btn-dark mr-3' href='index.php'><i
                        class="fas fa-undo-alt fa-sm pr-2"></i>戻る</a>
            </div>




        </div>
    </div>
</div>

<?php  include("includes/footer.php")?>