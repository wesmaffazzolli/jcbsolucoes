<?php

/*if(isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_comment_count = 4;
    $post_date = date('d-m-y');
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    try {
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        if ($_FILES['post_image']['error'] === UPLOAD_ERR_OK) { 
            $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
            $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_comment_count}','{$post_status}') ";

            $create_post_query = mysqli_query($connection, $query);

            confirmQuery($create_post_query);
            
            echo "Post inserido com sucesso.";
        } else { 
            throw new UploadException($_FILES['post_image']['error']); 
        }   
    } catch (UploadException $e) {
        echo $e->getMessage();
    }
    
}*/

?>
   
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar novidade
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		        <label for="post_title">Título</label>
		        <input type="text" name="post_title" class="form-control">
		    </div>
		    
		    <div class="form-group">
		        <select name="post_category" id="">
		            <?php /*
		                $query = "SELECT * FROM categories ";
		                $select_categories = mysqli_query($connection, $query); 
		                
		                confirmQuery($select_categories);

		                while($row = mysqli_fetch_assoc($select_categories)) { 
		                $cat_id = $row['cat_id'];
		                $cat_title = $row['cat_title']; 
		                    
		                echo "<option value='{$cat_id}'>{$cat_title}</option>";
		                    
		                }*/
		            ?>
		        </select>
		    </div>
		    
		    <div class="form-group">
		        <label for="post_author">Autor</label>
		        <input type="text" name="post_author" class="form-control">
		    </div>
		    
		    <div class="form-group">
		        <label for="post_status">Status</label>
		        <input type="text" name="post_status" class="form-control">
		    </div>

		    <div class="form-group">
		        <select name="post_featured" id="">
		            <?php /*
		                $query = "SELECT * FROM categories ";
		                $select_categories = mysqli_query($connection, $query); 
		                
		                confirmQuery($select_categories);

		                while($row = mysqli_fetch_assoc($select_categories)) { 
		                $cat_id = $row['cat_id'];
		                $cat_title = $row['cat_title']; 
		                    
		                echo "<option value='{$cat_id}'>{$cat_title}</option>";
		                    
		                }*/
		            ?>
		        </select>
		    </div>
		    
		    <div class="form-group">
		        <label for="post_image">Imagem</label>
		        <input type="file" name="post_image" class="form-control">
		    </div>
		    
		    <div class="form-group">
		        <label for="post_tags">Tags de pesquisa</label>
		        <input type="text" name="post_tags" class="form-control" placeholder="Exemplo: treinamentos, cursos, leis">
		    </div>
		    
		    <div class="form-group">
		        <label for="post_content">Conteúdo</label>
		        <textarea type="text" name="post_content" class="form-control" id="" cols="30" rows="10" placeholder="Escreva o conteúdo da novidade aqui..."></textarea>
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->