<?php

if(isset($_POST['create_post'])) {

    if(isset($_POST['post_title'])) {$post_title = escape($_POST['post_title']);}else{$post_title="";}
    if(isset($_POST['post_author'])) {$post_author = escape($_POST['post_author']);}else{$post_author="";}
    if(isset($_POST['post_category'])) {$post_category_id = escape($_POST['post_category']);}else{$post_category_id="";}
    if(isset($_POST['post_status'])) {$post_status = escape($_POST['post_status']);}else{$post_status="";}
    if(isset($_POST['post_featured'])) {$post_featured = escape($_POST['post_featured']);}else{$post_featured="";}
    if(isset($_FILES['post_image']['name'])) {$post_image = escape($_FILES['post_image']['name']);}else{$post_image="";}
    if(isset($_FILES['post_image']['tmp_name'])) {$post_image_tmp = $_FILES['post_image']['tmp_name'];} {$post_image_tmp="";}
    if(isset($_POST['post_content'])) {$post_content = escape($_POST['post_content']);}else{$post_content="";}

    $post_update_username = $_SESSION['username'];
    
    try {

		if(empty($post_title) || $post_title == "") {
			$bad_message = "Campo título vazio. Preencha-o para prosseguir.";
		} else if(empty($post_author) || $post_author == "") {
			$bad_message = "Campo autor está vazio. Preencha-o para prosseguir.";
		} else if(empty($post_category_id) || $post_category_id == "") {
			$bad_message = "Campo categoria vazio. Preencha-o para prosseguir.";
		} else if(empty($post_status) || $post_status == "") {
			$bad_message = "Campo status vazio. Preencha-o para prosseguir.";
		} else if(empty($post_featured) || $post_featured == "") {
			$bad_message = "Campo destaque vazio. Preencha-o para prosseguir.";
		} else if(empty($post_content) || $post_content == "") {
			$bad_message = "Campo conteúdo vazio. Preencha-o para prosseguir.";
		} else if(empty($post_image) || $post_image == "") {
			$bad_message = "Nenhuma imagem foi inserida. Favor inserir para prosseguir.";
		} else {

			move_uploaded_file($post_image_tmp, "../img/novidades/$post_image");
        
	        if ($_FILES['post_image']['error'] === UPLOAD_ERR_OK) { 
	            $query = "INSERT INTO posts(TITLE, AUTHOR, CATEGORY_ID, STATUS, IMAGE, FEATURED, CONTENT, CREATION_DATE) ";
	            $query .= "VALUES('{$post_title}','{$post_author}','{$post_category_id}','{$post_status}','{$post_image}','{$post_featured}','{$post_content}', CURRENT_TIMESTAMP) ";
	 
	            $create_post_query = mysqli_query($connection, $query);
	            if(!$create_post_query) {
	            	die("Query Failed = ". mysqli_error($connection));
	            } else  {
	            	$good_message = "O Post foi inserido.";
	            }

	        } else { 
	            throw new UploadException($_FILES['post_image']['error']); 
	        }   
		}

    } catch (UploadException $e) {
        $bad_message = $e->message;
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
        Adicionar Novidade
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		        <label for="post_title">Título</label>
		        <input type="text" maxlength="100" name="post_title" class="form-control">
		        <p class="help-block">Máx 100 caracteres.</p>
		    </div>

		    <div class="form-group">
		        <label for="post_author">Autor</label>
		        <input type="text" maxlength="100" name="post_author" class="form-control">
		        <p class="help-block">Máx 100 caracteres.</p>
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
		        <select name="post_featured">

		        	<?php

		        		$select_featured_posts_query = "SELECT FEATURED FROM posts WHERE FEATURED IN('DP', 'D1', 'D2') AND STATUS = 'A' ";
		            	$selected_featured_posts = mysqli_query($connection, $select_featured_posts_query); 

		            	while($row = mysqli_fetch_assoc($selected_featured_posts)) { 
							if($row['FEATURED'] == 'DP') {
								$dp_post = $row['FEATURED'];
							} else if($row['FEATURED'] == 'D1') {
								$d1_post = $row['FEATURED'];
							} else if($row['FEATURED'] == 'D2') {
								$d2_post = $row['FEATURED'];
							}
						}

						if(!isset($dp_post)) {
							echo "<option value='DP'>Destaque Principal</option>";	
						}

						if(!isset($d1_post)) {
							echo "<option value='D1'>Destaque 1</option>";		
						}

						if(!isset($d2_post)) {
							echo "<option value='D2'>Destaque 2</option>";			
						}

						echo "<option value='SD'>Sem destaque</option>";

		        	?>

		        </select>
		    </div>
		    
		    <div class="form-group">
		        <label for="post_image">Imagem</label>
		        <input type="file" name="post_image" class="form-control">
		        <p class="help-block">Resolução máxima indicada: 1024x768 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>
		    
		    <div class="form-group">
		        <label for="post_content">Conteúdo</label>
		        <textarea type="text" id="summernote" name="post_content" class="form-control" id="" cols="30" rows="10" placeholder="Escreva o conteúdo da novidade aqui..."></textarea>
		        <p class="help-block">Aumente a caixa de texto arrastando sua borda inferior para baixo. Use somente esta caixa para edição de texto. Aviso: imagens, vídeos e outros conteúdos que forem adicionados poderão afetar a estrutura da página e danificá-la.</p>
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="create_post" value="Publicar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->