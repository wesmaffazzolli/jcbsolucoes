<?php

	//Adicionar Categoria     
    if(isset($_POST['create_category'])) {
    $cat_title = $_POST['cat_title']; 
        if($cat_title == "" || empty($cat_title)) {
            echo "Preencha o nome da categoria para prosseguir.";
        } else {
            $query = "INSERT INTO categories(TITLE)";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);
            if(!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            } else {
                header("Location: categorias.php?source=listar");
            }
        }
    }
?>

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
		        <input class="btn btn-primary" type="submit" name="create_category" value="Adicionar">
		    </div>
		</form>

	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->