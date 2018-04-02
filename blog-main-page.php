<?php include "includes-blog/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php

    //Query dos posts com destaque
    $query = "SELECT * FROM posts WHERE FEATURED = 'DP' AND STATUS = 'A' ";
    $select_posts_featured_dp = mysqli_query($connection, $query); 

    $row = mysqli_fetch_array($select_posts_featured_dp);
    
    if(!is_null($row)) {
      $post_id_dp = $row['ID'];    
      $post_title_dp = $row['TITLE'];
      $post_image_dp = $row['IMAGE'];
      $post_content_dp = $row['CONTENT'];
    } ?>


    <!-- Page Content -->
    <div class="container">
      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">
          <!--<img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">-->
          <img class="img-fluid rounded" src="img/novidades/<?php if(isset($post_image_dp)){echo $post_image_dp;}else{echo 'imagem-nao-disponivel.png';}?>">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1><?php if(isset($post_title_dp)){echo $post_title_dp;}else{echo "Novidade em construção.";} ?></h1>
          <p><?php if(isset($post_content_dp)){echo substr($post_content_dp, 0, 200)."...";}else{echo "Conteúdo da novidade em construção. Aguarde...";}?></p>
          <?php if(isset($post_id_dp)) { ?>
          <a class="btn btn-primary btn-jcb btn-lg" href="blog-post.php?p_id=<?php echo $post_id_dp; ?>" style="background-color: #FF9900; border-color: #FF9900;">Saber mais</a>
          <?php } ?>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
     
     </div>
    <!-- /.container -->
    <!-- Fim do Destaque Principal -->

    <?php
    //Query do post destaque 1
    $query = "SELECT * FROM posts WHERE FEATURED = 'D1' AND STATUS = 'A' ";
    $select_posts_featured_d1 = mysqli_query($connection, $query); 

    $row = mysqli_fetch_array($select_posts_featured_d1);

    if(!is_null($row)) {
      $post_id_d1 = $row['ID'];    
      $post_title_d1 = $row['TITLE'];
      $post_content_d1 = $row['CONTENT'];
    } ?>

     <div class="container">
      <!-- Content Row -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"><?php if(isset($post_title_d1)){echo $post_title_d1;}else{echo "Novidade em construção.";} ?></h2>
              <p class="card-text"><?php if(isset($post_content_d1)){echo substr($post_content_d1, 0, 200)."...";}else{echo "Conteúdo da novidade em construção. Aguarde...";} ?></p>
            </div>
            <div class="card-footer">
              <?php if(isset($post_id_d1)) { ?>
              <a class="btn btn-primary btn-jcb btn-lg" href="blog-post.php?p_id=<?php echo $post_id_d1; ?>" style="background-color: #FF9900; border-color: #FF9900;">Saber mais</a>
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
          $post_title_d2 = $row['TITLE'];
          $post_content_d2 = $row['CONTENT'];
        } ?>

        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"><?php if(isset($post_title_d2)){echo $post_title_d2;}else{echo "Novidade em construção.";} ?></h2>
              <p class="card-text"><?php if(isset($post_content_d2)){echo substr($post_content_d2, 0, 200)."...";}else{echo "Conteúdo da novidade em construção. Aguarde...";} ?></p>
            </div>
            <div class="card-footer">
              <?php if(isset($post_id_d2)) { ?>
              <a class="btn btn-primary btn-jcb btn-lg" href="blog-post.php?p_id=<?php echo $post_id_d2; ?>" style="background-color: #FF9900; border-color: #FF9900;">Saber mais</a>
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- Fim da condicional D2 -->


        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <h5 class="card-header">Pesquisar</h5>
            <div class="card-body">
              <form action="search.php" method="GET">
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Pesquisar notícia...">
                  <span class="input-group-btn">
                    <button class="btn" type="submit" style="background-color: #FF9900; border-color: #FF9900; font-size:16px;"><i class="material-icons" style="font-size: 26px; color: #fff; margin-top: 5px;">search</i></button>
                  </span>
                </div>
              </form>
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
                      <a href="search-categorias.php?cat_id=<?php echo $cat_id; ?>&cat_title=<?php echo $cat_title; ?>" style="color: #FF9900;"><?php echo $cat_title; ?></a>
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

          $per_page = 5;

          if(isset($_GET['page'])) {

              $per_page = 5;

              $page = $_GET['page'];
          } else {
              $page = "";
          }

          if($page == "" || $page == 1) {
              $page_1 = 0;
          } else {
              $page_1 = ($page * $per_page) - $per_page;
          }

          //Pagination System
          $post_query_count = "SELECT * FROM posts WHERE FEATURED = 'SD' AND STATUS = 'A' ";
          $find_count = mysqli_query($connection, $post_query_count);
          $count = mysqli_num_rows($find_count);
          $count = ceil($count / $per_page);


          //Query dos posts SEM DESTAQUE                            
          $query = "SELECT * FROM posts WHERE FEATURED = 'SD' AND STATUS = 'A' ORDER BY CREATION_DATE DESC LIMIT {$page_1}, $per_page";
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
          </div>

          <?php } ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <?php 
            for($i = 1; $i <= $count; $i++) {
              echo "<li class='page-item'>";
              if($i  == $page) { 
                echo "<a class='page-link activ_link' href='blog-main-page.php?page={$i}' style='color: #fff; background-color: #ff9900;'>{$i}</a>";
              } else {
                echo "<a class='page-link' href='blog-main-page.php?page={$i}' style='color: #FF9900;'>{$i}</a>";
              }
              echo "</li>"; } ?>
          </ul>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include "includes-blog/footer.php"; ?>
