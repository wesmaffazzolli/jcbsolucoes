<div class="panel panel-default">
    <div class="panel-heading">
        Editar Categoria
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
        <form action="" method="post">

            <?php // Busca o valor do campo que clicou em Edit e preenche dentro do campo do formulário
            if(isset($_GET['source'])) {
            $cat_id = $_GET['p_id'];   

            $query = "SELECT * FROM categories WHERE ID = $cat_id ";
            $select_categories_id = mysqli_query($connection, $query); 

            while($row = mysqli_fetch_assoc($select_categories_id)) { 
            $cat_id = $row['ID'];
            $cat_title = $row['TITLE']; ?>

            <label for="cat_title">Nome</label>
            <div class="form-group">
                <input type="text" name="cat_title" class="form-control" value="<?php if(isset($cat_title)) {echo $cat_title;}?>">
            </div>

            <?php }} ?> 

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_category" value="Salvar">
            </div>
        </form>

    </div>
    <!-- Panel Body End -->

</div>
<!-- Panel Default End -->   

<?php 
    if(isset($_POST['update_category'])) {
    $the_cat_title = $_POST['cat_title'];
    $the_cat_id = $_GET['p_id'];
    $query = "UPDATE categories SET TITLE = '{$the_cat_title}' WHERE ID = {$the_cat_id} ";
    $update_query = mysqli_query($connection, $query);
        if(!$update_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            header("Location: categorias.php");
        }
    } 
 ?>    

 