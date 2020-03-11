<?php session_start() ?>
<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>


<?php if(isset($_POST['search_post'])) {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%{$keyword}%'";
    $search_post = mysqli_query($connection, $query);
    $num_rows = mysqli_num_rows($search_post);
    
    if(!$search_post) {
        die("Connection Failed " . mysqli_error($connection));
    }
    }
     
    if($num_rows < 1) { 
        echo "<div class='jumbotron'>";
        echo "<div class='container'>" ;
        echo "<h1 class='display-4 text-center'>検索結果が見つかりません！</h1>";
        echo "</div>";
        echo "</div>";
      
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php 
          

          while($row = mysqli_fetch_assoc($search_post)) {
          
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
                        <p class="text-dark"><?php echo $post_content ?></p>
                        <a href="#" class="btn btn-primary">詳細</a>
                    </div>

                </div>

            </div>

            <?php } ?>

        </div>


        <div class="col-md-4">
            <div class="card my-4 mt-5">
                <div class="card-body ">
                <form class="form-inline" action="search_post.php" method="post">
                    <label class="mb-3" for="keywoard-search"><h5>キーワードで検索</h5></label>
                    <input name="keyword" class="form-control mr-sm-2　" type="search" aria-label="Search">
                    <button name="search_post"class="btn btn-outline-success my-1 ml-3" type="submit">検索</button>
                </form>
                </div>
             </div>

        
            <div class="card bg-light float-right">
                <a class="weatherwidget-io  rounded" href="https://forecast7.com/ja/35d71139d73/tokyo/" style="width: 21.8rem" data-label_1="TOKYO" data-label_2="WEATHER" data-font="ヒラギノ角ゴ Pro W3" data-days="3" data-theme="weather_one" >東京の天気</a>
            </div>
        </div>

    </div>


    </div>

</div>

</div>

<?php include("includes/footer.php") ?>