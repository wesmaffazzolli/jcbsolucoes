<?php

  //Query dos posts com destaque
  $query = "SELECT * FROM posts WHERE FEATURED = 'DP' AND STATUS = 'A' ";
  $select_posts_featured_dp = mysqli_query($connection, $query); 

  $row = mysqli_fetch_array($select_posts_featured_dp);
  
  if(!is_null($row)) {
    $post_id_dp = $row['ID'];    

    if(strlen($row['TITLE']) >= 80) {
      $post_title_dp = substr($row['TITLE'], 0, 80)."...";
    } else {
      $post_title_dp = $row['TITLE'];
    }

    if(strlen($row['CONTENT']) >= 190) {
      $post_content_dp = substr($row['CONTENT'], 0, 200)."...";
    } else {
      $post_content_dp = $row['CONTENT'];
    }

    $post_image_dp = $row['IMAGE'];
  } 
  
?>

<div class="container">
  
  <!-- Heading Row -->
  <div class="row my-4">
    <div class="col-lg-8">
      <!--<img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">-->
      <img class="img-fluid rounded" src="img/novidades/<?php if(isset($post_image_dp)){echo $post_image_dp;}else{echo 'imagem-nao-disponivel.png';}?>">
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
      <h1 class="titulo-destaque-principal"><?php if(isset($post_title_dp)){echo $post_title_dp;}else{echo "Novidade em construção.";} ?></h1>
      <p><?php if(isset($post_content_dp)){echo $post_content_dp;} ?></p>
      <?php if(isset($post_id_dp)) { ?>
      <a class="btn btn-primary btn-jcb" href="blog-post.php?p_id=<?php echo $post_id_dp; ?>">Saiba mais &rarr;</a>
      <?php } ?>
    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->
 
 </div>
<!-- /.container -->
<!-- Fim do Destaque Principal -->