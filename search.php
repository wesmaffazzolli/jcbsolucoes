<?php include "includes-blog/header.php"; ?>
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

         <?php


          if(isset($_GET['search'])) {
            $the_search = $_GET['search'];

            echo "<h1 class='my-4'>Pesquisa: {$the_search}</h1>";

              //Pagination System configuration begin
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

              
              $post_query_count = "SELECT * FROM posts WHERE TITLE LIKE '%{$the_search}%' ";
              $find_count = mysqli_query($connection, $post_query_count);
              $count = mysqli_num_rows($find_count);
              $count = ceil($count / $per_page);
              //Pagination System configuration end

              $query = "SELECT * FROM posts WHERE TITLE LIKE '%{$the_search}%' LIMIT {$page_1}, $per_page";
              $select_posts_by_search = mysqli_query($connection, $query); 

              while($row = mysqli_fetch_assoc($select_posts_by_search)) {
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
            <?php 
            for($i = 1; $i <= $count; $i++) {
              echo "<li class='page-item'>";
              if($i  == $page) { 
                echo "<a class='page-link activ_link' href='search.php?page={$i}' style='color: #fff; background-color: #ff9900;'>{$i}</a>";
              } else {
                echo "<a class='page-link' href='search.php?page={$i}' style='color: #FF9900;'>{$i}</a>";
              }
              echo "</li>"; } ?>
          </ul>

        <?php } ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

        <!-- /.col-md-4 -->
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

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "includes-blog/footer.php"; ?>