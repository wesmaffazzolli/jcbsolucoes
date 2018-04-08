  <?php
  //Query do post destaque 1
  $query = "SELECT * FROM posts WHERE FEATURED = 'D1' AND STATUS = 'A' ";
  $select_posts_featured_d1 = mysqli_query($connection, $query); 

  $row = mysqli_fetch_array($select_posts_featured_d1);

  if(!is_null($row)) {
    $post_id_d1 = $row['ID'];    

    if(strlen($row['TITLE']) >= 80) {
      $post_title_d1 = substr($row['TITLE'], 0, 80)."...";
    } else {
      $post_title_d1 = $row['TITLE'];
    }

    if(strlen($row['CONTENT']) >= 200) {
      $post_content_d1 = substr($row['CONTENT'], 0, 200)."...";
    } else {
      $post_content_d1 = $row['CONTENT'];
    }

  } ?>

  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <h2 class="card-title"><?php if(isset($post_title_d1)){echo $post_title_d1;}else{echo "Novidade em construção.";} ?></h2>
        <p class="card-text"><?php if(isset($post_content_d1)){echo $post_content_d1;} ?></p>
      </div>
      <div class="card-footer">
        <?php if(isset($post_id_d1)) { ?>
        <a class="btn btn-primary btn-jcb" href="blog-post.php?p_id=<?php echo $post_id_d1; ?>">Saiba mais &rarr;</a>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Fim do Destaque 1 -->

  <?php
  //Query do post destaque 2
  $query = "SELECT * FROM posts WHERE FEATURED = 'D2' AND STATUS = 'A' ";
  $select_posts_featured_d2 = mysqli_query($connection, $query); 

  $row = mysqli_fetch_array($select_posts_featured_d2);

  if(!is_null($row)) {
    $post_id_d2 = $row['ID'];    

    if(strlen($row['TITLE']) >= 80) {
      $post_title_d2 = substr($row['TITLE'], 0, 80)."...";
    } else {
      $post_title_d2 = $row['TITLE'];
    }

    if(strlen($row['CONTENT']) >= 200) {
      $post_content_d2 = substr($row['CONTENT'], 0, 200)."...";
    } else {
      $post_content_d2 = $row['CONTENT'];
    }

  } ?>

  <!-- /.col-md-4 -->
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <h2 class="card-title"><?php if(isset($post_title_d2)){echo $post_title_d2;}else{echo "Novidade em construção.";} ?></h2>
        <p class="card-text"><?php if(isset($post_content_d2)){echo $post_content_d2;} ?></p>
      </div>
      <div class="card-footer">
        <?php if(isset($post_id_d2)) { ?>
        <a class="btn btn-primary btn-jcb" href="blog-post.php?p_id=<?php echo $post_id_d2; ?>">Saiba mais &rarr;</a>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Fim da condicional D2 -->