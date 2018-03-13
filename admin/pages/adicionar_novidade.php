<?php

if(isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_featured = $_POST['post_featured'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_creation_date = date('d-m-y');
    
    try {
        
        move_uploaded_file($post_image_temp, "../img/novidades/$post_image");
        
        if ($_FILES['post_image']['error'] === UPLOAD_ERR_OK) { 
            $query = "INSERT INTO posts(TITLE, AUTHOR, CATEGORY_ID, STATUS, IMAGE, FEATURED, CONTENT, TAGS) ";
            $query .= "VALUES('{$post_title}','{$post_author}','{$post_category_id}','{$post_status}','{$post_image}','{$post_featured}','{$post_content}','{$post_tags}') ";

            $create_post_query = mysqli_query($connection, $query);

            confirmQuery($create_post_query);
            
            echo "Post inserido com sucesso.";

            header("Location: novidades.php");
        } else { 
            throw new UploadException($_FILES['post_image']['error']); 
        }   
    } catch (UploadException $e) {
        echo $e->getMessage();
    }
    
}

?>
   
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar Novidade
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		        <label for="post_title">Título</label>
		        <input type="text" name="post_title" class="form-control">
		    </div>

		    <div class="form-group">
		        <label for="post_author">Autor</label>
		        <input type="text" name="post_author" class="form-control">
		    </div>
		    
		    <div class="form-group">
		    	<label for="post_category">Categoria</label>
		        <select name="post_category" id="">
		            <?php
		                $query = "SELECT * FROM categories ";
		                $select_categories = mysqli_query($connection, $query); 
		                
		                confirmQuery($select_categories);

		                while($row = mysqli_fetch_assoc($select_categories)) { 
		                $cat_id = $row['ID'];
		                $cat_title = $row['TITLE']; 
		                    
		                echo "<option value='{$cat_id}'>{$cat_title}</option>";
		                    
		                }
		            ?>
		        </select>
		    </div>
		    
		    <div class="form-group">
		        <label for="post_status">Status</label>
		        <select name="post_status" id="">
					<option value="A">Ativo</option>
					<option value="I">Inativo</option>
		        </select>
		    </div>

		    <div class="form-group">
		    	<label for="post_featured">Destaque na Página de Novidades</label>
		        <select name="post_featured" id="">
		        	<option value="DP">Destaque Principal</option>
					<option value="D1">Destaque 1</option>
					<option value="D2">Destaque 2</option>
					<option value="SD">Sem destaque</option>
		        </select>
		    </div>
		    
		    <div class="form-group">
		        <label for="post_image">Imagem</label>
		        <input type="file" name="post_image" class="form-control">
		    </div>
		    
		    <div class="form-group">
		        <label for="post_tags">Tags de Pesquisa</label>
		        <input type="text" name="post_tags" class="form-control" placeholder="Exemplo: treinamentos, cursos, leis...">
		    </div>
		    
		    <div class="form-group">
		        <label for="post_content">Conteúdo</label>
		        <textarea type="text" name="post_content" class="form-control" id="" cols="30" rows="10" placeholder="Escreva o conteúdo da novidade aqui..."></textarea>
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="create_post" value="Publicar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->