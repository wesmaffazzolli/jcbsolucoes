<?php include "includes-blog/header.php"; ?>
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

         <?php

          if(isset($_GET['cat_id']) && isset($_GET['cat_title'])) {
            $the_cat_id = $_GET['cat_id'];
            $the_cat_title = $_GET['cat_title'];

            echo "<h1 class='my-4'>Categoria: {$the_cat_title}</h1>";

            $query = "SELECT * FROM posts WHERE CATEGORY_ID = $the_cat_id ";
            $select_posts_by_category = mysqli_query($connection, $query); 

            while($row = mysqli_fetch_assoc($select_posts_by_category)) {
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

          <?php } } ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
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
                      <a href="search-categorias.php?cat_id=<?php echo $cat_id; ?>&cat_title=<?php echo $cat_title; ?>" style="color: #FF9900;"><?php echo $cat_title; ?></a>
                    </li>

                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "includes-blog/footer.php"; ?>