<?php    

if(isset($_GET['source'])) {
	$the_post_id = $_GET['p_id'];

	$query = "SELECT * FROM posts WHERE ID = '{$the_post_id}' ";
	$select_posts_by_id = mysqli_query($connection, $query); 

	while($row = mysqli_fetch_assoc($select_posts_by_id)) {
	    $post_id = $row['ID'];    
	    $post_title = $row['TITLE'];
	    $post_author = $row['AUTHOR'];
	    $post_category_id = $row['CATEGORY_ID'];    
	    $post_status = $row['STATUS'];
	    $post_image = $row['IMAGE'];
	    $post_featured = $row['FEATURED'];
	    $post_content = $row['CONTENT'];
	    $post_tags = $row['TAGS'];    
	    $post_creation_date = $row['CREATION_DATE'];
	    $post_update_date = $row['UPDATE_DATE'];
	    $post_update_username = $row['UPDATE_USERNAME'];

	} } 

if(isset($_POST['update_post'])) {
	    $post_title = $_POST['post_title'];
	    $post_author = $_POST['post_author'];
	    $post_category_id = $_POST['post_category'];    
	    $post_status = $_POST['post_status'];
	    $post_image = $_FILES['post_image']['name'];
	    $post_image_temp = $_FILES['post_image']['tmp_name'];
	    $post_featured = $_POST['post_featured'];
	    $post_content = $_POST['post_content'];
	    $post_tags = $_POST['post_tags'];  
	    $post_update_date = date('d-m-y');
	    $post_update_username = "adminjcb";

        move_uploaded_file($post_image_temp, "../img/novidades/$post_image");
        
        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE ID = $the_post_id ";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_array($select_image)) {
                $post_image = $row['IMAGE'];
            }
        }
        
        $query = "UPDATE posts SET ";
        $query .="TITLE = '{$post_title}', ";
        $query .="AUTHOR = '{$post_author}', ";
        $query .="CATEGORY_ID = '{$post_category_id}', ";
        $query .="STATUS = '{$post_status}', ";
        $query .="FEATURED = '{$post_featured}', ";
        $query .="TAGS = '{$post_tags}', ";
        $query .="CONTENT = '{$post_content}', ";
        $query .="IMAGE = '{$post_image}', ";
        $query .="UPDATE_DATE = '{$post_update_date}', ";
		$query .="UPDATE_USERNAME = '{$post_update_username}' ";
        $query .="WHERE ID = '{$the_post_id}' ";    
        
        $update_post = mysqli_query($connection, $query);
        
        confirmQuery($update_post);
	}; ?>

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Novidade
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		        <label for="post_title">Título</label>
		        <input type="text" name="post_title" class="form-control" value="<?php if(isset($post_id)) {echo $post_title;} ?>">
		    </div>

		    <div class="form-group">
		        <label for="post_author">Autor</label>
		        <input type="text" name="post_author" class="form-control" value="<?php if(isset($post_id)) {echo $post_author;} ?>">
		    </div>
		    
		    <div class="form-group">
		    	<label for="post_category">Categoria</label>
		        <select name="post_category" id="">
		            <?php

		            //Selecionar a categoria do id por primeiro
		            	$my_query = "SELECT * FROM categories WHERE ID = $post_category_id ";
		            	$select_my_category = mysqli_query($connection, $my_query); 
		            	confirmQuery($select_my_category);
		            	while($row = mysqli_fetch_assoc($select_my_category)) { 
		                	$my_cat_id = $row['ID'];
		                	$my_cat_title = $row['TITLE'];

		                	echo "<option value='{$my_cat_id}'>{$my_cat_title}</option>";
		                } 

		            //Selecionar as categorias restantes
		                $query = "SELECT * FROM categories WHERE ID != $post_category_id ";
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
		        	<?php 
		        	//Busca o status desta postagem e deixa ativo no select input
		        	if($post_status == 'A') {
		        		echo "<option value='A'>Ativo</option>";
		        		echo "<option value='I'>Inativo</option>";
		        	} else {
		        		echo "<option value='I'>Inativo</option>";
		        		echo "<option value='A'>Ativo</option>";
		        	} ?>
		        </select>
		    </div>

		    <div class="form-group">
		    	<label for="post_featured">Destaque na Página de Novidades</label>
		        <select name="post_featured" id="">
		        	<?php 

		        	if($post_featured == 'DP') {
		        		echo "<option value='DP'>Destaque Principal</option>";
		        		echo "<option value='D1'>Destaque 1</option>";
		        		echo "<option value='D2'>Destaque 2</option>";
		        		echo "<option value='SD'>Sem destaque</option>";
		        		
		        	} else if($post_featured == 'D1') {
		        		echo "<option value='D1'>Destaque 1</option>";
		        		echo "<option value='D2'>Destaque 2</option>";
		        		echo "<option value='DP'>Destaque Principal</option>";
		        		echo "<option value='SD'>Sem destaque</option>";
		        	} else if($post_featured == 'D2') {
						echo "<option value='D2'>Destaque 2</option>";
		        		echo "<option value='D1'>Destaque 1</option>";
		        		echo "<option value='DP'>Destaque Principal</option>";
		        		echo "<option value='SD'>Sem destaque</option>";
		        	} else {
		        		echo "<option value='SD'>Sem destaque</option>";
		        		echo "<option value='DP'>Destaque Principal</option>";
		        		echo "<option value='D1'>Destaque 1</option>";
		        		echo "<option value='D2'>Destaque 2</option>";
		        	} ?>
		        </select>
		    </div>
		    
		    <div class="form-group">
		    	<img width="150" src="../img/novidades/<?php echo $post_image; ?>" alt="">
		        <input type="file" name="post_image" class="form-control">
		    </div>
		    
		    <div class="form-group">
		        <label for="post_tags">Tags de Pesquisa</label>
		        <input type="text" name="post_tags" class="form-control" value="<?php if(isset($post_tags)) {echo $post_tags;} ?>">
		    </div>
		    
		    <div class="form-group">
		        <label for="post_content">Conteúdo</label>
		        <textarea type="text" name="post_content" class="form-control" cols="30" rows="10"><?php if(isset($post_content)) {echo $post_content;} ?></textarea>
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="update_post" value="Salvar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->