<?php include "includes-blog/header.php"; ?>
<?php include "includes/navigation.php"; ?>


<?php

    //Query dos posts com destaque
    $query = "SELECT * FROM posts WHERE FEATURED IN('DP','D1','D2') ";
    $select_posts_featured = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_posts_featured)) {
        $post_id = $row['ID'];    
        $post_title = $row['TITLE'];
        $post_image = $row['IMAGE'];
        $post_featured = $row['FEATURED'];
        $post_content = $row['CONTENT']; ?>

    <?php if($post_featured == 'DP') { ?>
    <!-- Page Content -->
    <div class="container">
      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">
          <!--<img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">-->
          <img class="img-fluid rounded" src="img/novidades/<?php echo $post_image; ?>" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1><?php echo $post_title; ?></h1>
          <p><?php echo substr($post_content, 0, 200)."..."; ?></p>
          <a class="btn btn-primary btn-jcb btn-lg" href="blog-post.php?p_id=<?php echo $post_id; ?>" style="background-color: #FF9900; border-color: #FF9900;">Saber mais</a>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
     
     </div>
    <!-- /.container -->
    <?php } ?>



    <?php if($post_featured == 'D1') { ?>
     <div class="container">
      <!-- Content Row -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"><?php echo $post_title; ?></h2>
              <p class="card-text"><?php echo substr($post_content, 0, 200)."..."; ?></p>
            </div>
            <div class="card-footer">
              <a href="blog-post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary" style="background-color: #FF9900; border-color: #FF9900;">Saber mais</a>
            </div>
          </div>
        </div>

        <?php } ?>
        <!-- Fim do Destaque 1 -->




        <?php if($post_featured == 'D2') { ?>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"><?php echo $post_title; ?></h2>
              <p class="card-text"><?php echo substr($post_content, 0, 200)."..."; ?></p>
            </div>
            <div class="card-footer">
              <a href="blog-post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary" style="background-color: #FF9900; border-color: #FF9900;">Saber mais</a>
            </div>
          </div>
        </div>

        <?php } ?>
        <!-- Fim da condicional D2 -->
        <?php } ?>
         <!-- Fim do Loop -->




        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <h5 class="card-header">Pesquisar</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar notícia...">
                <span class="input-group-btn">
                  <button class="btn" type="button" style="background-color: #FF9900; border-color: #FF9900; font-size:16px;"><i class="material-icons" style="font-size: 26px; color: #fff;">search</i></button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categorias</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0 categorias" >

                    <?php
                    //Descrição da categoria
                    $query = "SELECT * FROM categories ";
                    $select_categories = mysqli_query($connection, $query); 
                      while($row = mysqli_fetch_assoc($select_categories)) { 
                      $cat_id = $row['ID'];
                      $cat_title = $row['TITLE']; ?> 

                    <li>
                      <a href="search-categorias.php?p_id=<?php echo $cat_id; ?>" style="color: #FF9900;"><?php echo $cat_title; ?></a>
                    </li>

                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->

              
    <!-- Page Content -->
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
        
        <?php
        //Query dos posts SEM DESTAQUE                            
          $query = "SELECT * FROM posts WHERE FEATURED = 'SD' ";
          $select_posts_not_featured = mysqli_query($connection, $query); 

          while($row = mysqli_fetch_assoc($select_posts_not_featured)) {
              $post_id = $row['ID'];    
              $post_title = $row['TITLE'];
              $post_image = $row['IMAGE'];
              $post_featured = $row['FEATURED'];
              $post_content = $row['CONTENT']; ?>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="img/novidades/<?php echo $post_image; ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $post_title; ?></h2>
              <p class="card-text"><?php echo substr($post_content, 0, 200)."..."; ?></p>
              <a href="blog-post.php?p_id=<?php echo $post_id; ?>" class="btn" style="background-color: #FF9900; border-color: #FF9900;">Saiba mais &rarr;</a>
            </div>
            <!--<div class="card-footer text-muted">
              Postado em 2 de março de 2018 por
              <a href="#" style="color: #FF9900;">Rogério</a>
            </div>-->
          </div>

          <?php } ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#" style="color: #FF9900;">&larr; Antigo</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Recente &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include "includes-blog/footer.php"; ?>
