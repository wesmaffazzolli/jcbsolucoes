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