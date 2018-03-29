<?php

	//Adicionar Categoria     
    if(isset($_POST['create_category'])) {

    $cat_title = escape($_POST['cat_title']); 

        if($cat_title == "" || empty($cat_title)) {
            echo "Preencha o nome da categoria para prosseguir.";
        } else {
            $query = "INSERT INTO categories(TITLE)";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);
            if(!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            } else {
                $good_message = "A categoria foi inserida.";
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
        Adicionar Categoria
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
		<form action="" method="post">
			<label for="cat_title">Nome</label>
		    <div class="form-group">
		        <input type="text" class="form-control" name="cat_title" placeholder="Digite o nome da categoria...">
		    </div>
		    <div class="form-group">
		        <input class="btn botao-crud" type="submit" name="create_category" value="Adicionar">
		    </div>
		</form>

	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->