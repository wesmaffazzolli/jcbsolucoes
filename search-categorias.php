<?php include "includes-blog/navigation.php"; ?>

    <section id="blog-search-categorias">
      <!-- Page Content -->
      <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">

           <?php

            if(isset($_GET['cat_id']) && isset($_GET['cat_title'])) {
              $the_cat_id = escape($_GET['cat_id']);
              $the_cat_title = escape($_GET['cat_title']);

              $post_query_count = "SELECT * FROM posts WHERE CATEGORY_ID = $the_cat_id ";
              $find_count = mysqli_query($connection, $post_query_count);
              $num_rows = mysqli_num_rows($find_count); 

              if($num_rows > 0) {

                if($num_rows == 1) {
                  echo "<div class='alert alert-info'>
                    <strong>{$num_rows} resultado</strong> foi encontrado para a categoria: <strong>{$the_cat_title}.</strong> Confira abaixo: 
                    </div>";    
                } else {
                  echo "<div class='alert alert-info'>
                    <strong>{$num_rows} resultados</strong> foram encontrados para a categoria: <strong>{$the_cat_title}.</strong> Confira abaixo: 
                    </div>"; 
                }

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

                $count = mysqli_num_rows($find_count);
                $count = ceil($count / $per_page);
                //Pagination System configuration end

                $query = "SELECT * FROM posts WHERE CATEGORY_ID = $the_cat_id LIMIT {$page_1}, $per_page ";
                $select_posts_by_category = mysqli_query($connection, $query); 

                while($row = mysqli_fetch_assoc($select_posts_by_category)) {
                    $post_id = $row['ID'];

                    if(strlen($row['TITLE']) >= 70) {
                      $post_title = substr($row['TITLE'], 0, 70)."...";
                    } else {
                      $post_title = $row['TITLE'];
                    }

                    if(strlen($row['CONTENT']) >= 300) {
                      $post_content = substr($row['CONTENT'], 0, 300)."...";
                    } else {
                      $post_content = $row['CONTENT'];
                    } 

                    $post_image = $row['IMAGE'];
                    $post_featured = $row['FEATURED']; ?>
      
                    <?php include "includes-blog/blog-post-card.php"; ?>
                    <?php } ?>

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center mb-4">
                      <?php 
                      for($i = 1; $i <= $count; $i++) {
                        echo "<li class='page-item'>";
                        if($i  == $page) { 
                          echo "<a class='page-link activ_link' href='search-categorias.php?page={$i}' style='color: #fff; background-color: #ff9900;'>{$i}</a>";
                        } else {
                          echo "<a class='page-link' href='search-categorias.php?page={$i}' style='color: #FF9900;'>{$i}</a>";
                        }
                        echo "</li>"; } ?>
                    </ul>              

            <?php } else {

            echo "<div class='alert alert-danger'>
                  <strong>Nenhum resultado</strong> foi encontrado para a categoria: <strong>{$the_cat_title}.</strong> <a href='blog-main-page.php'><span class='link-search-fail'>Voltar para o Blog.</span></a>
                  </div>"; 

            }

          } ?>

          </div>

          <?php include "includes-blog/sidebar.php"; ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->
    </section>

    <!-- Footer -->
    <?php include "includes-blog/footer.php"; ?>