<?php // Busca o valor do campo que clicou em Edit e preenche dentro do campo do formulário
if(isset($_GET['source'])) {

    $cat_id = escape($_GET['p_id']);   

    $query = "SELECT * FROM categories WHERE ID = $cat_id ";
    $select_categories_id = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_categories_id)) { 
    $cat_id = $row['ID'];
    $cat_title = $row['TITLE'];

    }

    if(isset($_POST['update_category'])) {
        $the_cat_title = $_POST['cat_title'];
        $the_cat_id = $_GET['p_id'];
        $query = "UPDATE categories SET TITLE = '{$the_cat_title}' WHERE ID = {$the_cat_id} ";
        $update_query = mysqli_query($connection, $query);
        if(!$update_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            $good_message = "A categoria foi atualizada.";
        }
    } 
} 

?>

<?php if(isset($good_message) && !empty($good_message)) {?>
<div class="alert alert-success">
        <strong>Sucesso!</strong><?php echo " ".$good_message; ?>
</div>  
<?php } else if(isset($bad_message) && !empty($bad_message)) { ?>
<div class="alert alert-danger">
        <strong>Erro!</strong><?php echo " ".$bad_message; ?>
</div>  
<?php } ?>

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Categoria
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
        <form action="" method="post">
            <label for="cat_title">Nome</label>
            <div class="form-group">
                <input type="text" name="cat_title" class="form-control" value="<?php if(isset($cat_title)) {echo $cat_title;}?>" maxlength="100">
            </div>
            <p class="help-block">Máx 100 caracteres.</p>

            <div class="form-group">
                <input class="btn botao-crud" type="submit" name="update_category" value="Salvar">
                <span><a class="link-voltar" href="categorias.php?source=listar">Voltar</a></span>
            </div>
        </form>

    </div>
    <!-- Panel Body End -->

</div>
<!-- Panel Default End -->   
