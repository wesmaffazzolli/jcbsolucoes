<?php include "includes-blog/navigation.php"; ?>

  <section id="novidades">
    <!-- Page Content -->

    <?php include "includes-blog/destaque-principal.php"; ?>

     <div class="container">

      <!-- Content Row -->
      <div class="row">

        <?php include "includes-blog/destaques.php"; ?>

        <?php include "includes-blog/sidebar.php"; ?>
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
              
              if(strlen($row['TITLE']) >= 70) {
                $post_title = substr($row['TITLE'], 0, 70)."...";
              } else {
                $post_title = $row['TITLE'];
              }

              $post_image = $row['IMAGE'];
              $post_featured = $row['FEATURED'];

              if(strlen($row['CONTENT']) >= 300) {
                $post_content = substr($row['CONTENT'], 0, 300)."...";
              } else {
                $post_content = $row['CONTENT'];
              } ?>

              <?php include "includes-blog/blog-post-card.php"; ?>

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
  </section>

  <?php include "includes-blog/footer.php"; ?>
