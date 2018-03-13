<?php include "includes-blog/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php 

if(isset($_GET['p_id'])) {

  $the_post_id = $_GET['p_id'];

  //Query dos posts com destaque
    $query = "SELECT * FROM posts WHERE ID = $the_post_id ";
    $select_posts_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['ID'];    
    $post_title = $row['TITLE'];
    $post_author = $row['AUTHOR'];
    $post_image = $row['IMAGE'];
    $post_featured = $row['FEATURED'];
    $post_content = $row['CONTENT']; 
    $post_cration_date = $row['CREATION_DATE']; ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $post_title; ?></h1>

          <!-- Author -->
          <p class="lead">
            por
            <a href="#" style="color: #FF9900;"><?php echo $post_author; ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Postado em: <?php echo $post_cration_date; ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="img/novidades/<?php echo $post_image; ?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class=""><?php echo $post_content; ?></p>

          <hr>

        </div>

        <?php }} ?>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
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

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include "includes-blog/footer.php"; ?>

