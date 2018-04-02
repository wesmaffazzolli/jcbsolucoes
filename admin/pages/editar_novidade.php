<?php    

if(isset($_GET['source'])) {

	$the_post_id = escape($_GET['p_id']);

	$query = "SELECT * FROM posts WHERE ID = '{$the_post_id}' ";
	$select_posts_by_id = mysqli_query($connection, $query); 

	while($row = mysqli_fetch_assoc($select_posts_by_id)) {
	    $post_id = $row['ID'];    
	    $post_title = $row['TITLE'];
	    $post_category_id = $row['CATEGORY_ID'];    
	    $post_status = $row['STATUS'];
	    $post_image = $row['IMAGE'];
	    $post_featured = $row['FEATURED'];
	    $post_content = $row['CONTENT'];

	} } 

if(isset($_POST['update_post'])) {

    if(isset($_POST['post_title'])){$post_title = escape($_POST['post_title']);}else{$post_title = "";}
    if(isset($_POST['post_category'])){$post_category_id = escape($_POST['post_category']);}else{$post_category_id = "";}
    if(isset($_POST['post_status'])){$post_status = escape($_POST['post_status']);}else{$post_status = "";}
    if(isset($_FILES['post_image']['name'])){$post_image = escape($_FILES['post_image']['name']);}else{$post_image = "";}
    if(isset($_FILES['post_image']['tmp_name'])){$post_image_temp = $_FILES['post_image']['tmp_name'];}else{$post_image_temp = "";}
    if(isset($_POST['post_featured'])){$post_featured = escape($_POST['post_featured']);}else{$post_featured = "";}
    if(isset($_POST['post_content'])){$post_content = escape($_POST['post_content']);}else{$post_content = "";}

    $post_update_username = $_SESSION['username'];

  	try {

  		//Caso não haja inserção de nova imagem, busca a atual
	    if(empty($post_image)) {
	        $query = "SELECT * FROM posts WHERE ID = $the_post_id ";
	        $select_image = mysqli_query($connection, $query);
	        
	        while($row = mysqli_fetch_array($select_image)) {
	            $post_image = $row['IMAGE'];
	        }
	    } else {
		    move_uploaded_file($post_image_temp, "../img/novidades/$post_image");
		}

		if(empty($post_title) || $post_title == "") {
			$bad_message = "Campo texto vazio. Preencha-o para prosseguir.";
		} else if(empty($post_category_id) || $post_category_id == "") {
			$bad_message = "Campo categoria vazio. Preencha-o para prosseguir.";
		} else if(empty($post_status) || $post_status == "") {
			$bad_message = "Campo status vazio. Preencha-o para prosseguir.";
		} else if(empty($post_featured) || $post_featured == "") {
			$bad_message = "Campo destaque vazio. Preencha-o para prosseguir.";
		} else if(empty($post_content) || $post_content == "") {
			$bad_message = "Campo texto vazio. Preencha-o para prosseguir.";
		} 
			
			if(empty($bad_message)) {
				if($_FILES['post_image']['error'] === UPLOAD_ERR_OK || $_FILES['post_image']['error'] === UPLOAD_ERR_NO_FILE) {
				    $query = "UPDATE posts SET ";
				    $query .="TITLE = '{$post_title}', ";
				    $query .="CATEGORY_ID = '{$post_category_id}', ";
				    $query .="STATUS = '{$post_status}', ";
				    $query .="FEATURED = '{$post_featured}', ";
				    $query .="CONTENT = '{$post_content}', ";
				    $query .="IMAGE = '{$post_image}', ";
				    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
					$query .="UPDATE_USERNAME = '{$post_update_username}' ";
				    $query .="WHERE ID = '{$the_post_id}' ";    
	    
				    $update_post = mysqli_query($connection, $query);

			        $edit_post = mysqli_query($connection, $query);
			        if(!$edit_post) {
			            die('QUERY FAILED = ' . mysqli_error($connection));
			        } else {
			        	$good_message = "A novidade foi alterada.";
			        }

		        } else { 
		            throw new UploadException($_FILES['post_image']['error']); 
		        } 
			}

    } catch (UploadException $e) {
        $bad_message = $e->message;

    }
    
}; ?>

<?php if(isset($good_message) && !empty($good_message)) {?>
<div class="alert alert-success">
		<strong>Sucesso!</strong><?php echo " ".$good_message; ?>
</div>	
<?php } else if(isset($bad_message) && !empty($bad_message)) { ?>
<div class="alert alert-danger">
		<strong>Erro!</strong><?php echo " ".$bad_message; ?>
</div>	
<?php } ?>

<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- The Close Button -->
    <span class="close">&times;</span>
    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">
    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Novidade
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		        <label for="post_title">Título</label>
		        <input type="text" name="post_title" class="form-control" maxlength="100" value="<?php if(isset($post_title) && !empty($post_title)) {echo $post_title;} ?>">
		        <p class="help-block">Máx 100 caracteres.</p>
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
		        	if(isset($post_status) && !empty($post_status)) {
		        		if($post_status == 'A') {
		        			echo "<option value='A'>Ativo</option>";
		        			echo "<option value='I'>Inativo</option>";
		        		} else {
		        			echo "<option value='I'>Inativo</option>";
		        			echo "<option value='A'>Ativo</option>";
		        		}
		        	} ?>
		        </select>
		    </div>

		    <div class="form-group">
		    	<label for="post_featured">Destaque na Página de Novidades</label>
		        <select name="post_featured">
		        	<?php

		        		//Destaque do Post
		        		$select_my_feature_query = "SELECT DISTINCT FEATURED FROM posts WHERE ID = $the_post_id ";
		        		$my_feature_selected = mysqli_query($connection, $select_my_feature_query); 
		        		$my_feature_row = mysqli_fetch_array($my_feature_selected);
		        		$my_post_feature = $my_feature_row['FEATURED'];

		        		if($my_post_feature == 'DP') {
		        			echo "<option value='DP'>Destaque Principal</option>";	
		        		} else if($my_post_feature == 'D1') {
		        			echo "<option value='D1'>Destaque 1</option>";	
		        		} else if($my_post_feature == 'D2') {
		        			echo "<option value='D2'>Destaque 2</option>";	
		        		} else if($my_post_feature == 'SD') {
		        			echo "<option value='SD'>Sem Destaque</option>";	
		        		}	  

		        		//Outros destaques que já não estiverem ativos
		        		$select_featured_posts_query = "SELECT DISTINCT FEATURED FROM posts WHERE STATUS = 'A' ";
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

						//Sem destaque haverá de qualquer jeito, mas não pode repetir na lista
						if($my_post_feature != 'SD') {
							echo "<option value='SD'>Sem destaque</option>";			
						}

		        	?>
		        </select>
		    </div>
		    
		    <div class="form-group">
		   		<img id="myImg" src="../img/novidades/<?php if(isset($post_image) && !empty($post_image)){echo $post_image;}else{echo 'imagem-nao-disponivel.png';} ?>" width="200">
		    	<p class="help-block">Clique na imagem para visualizá-la.</p>
		        <input type="file" name="post_image" class="form-control">
		       	<p class="help-block">Resolução máxima indicada: 1024x768 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>
		    
		    <div class="form-group">
		        <label for="post_content">Conteúdo</label>
		        <textarea id="summernote" type="text" name="post_content" class="form-control" cols="30" rows="10"><?php if(isset($post_content) && !empty($post_content)) {echo $post_content;} ?></textarea>
		        <p class="help-block">Aumente a caixa de texto arrastando sua borda inferior para baixo. Use somente esta caixa para edição de texto. Aviso: imagens, vídeos e outros conteúdos que forem adicionados poderão afetar a estrutura da página e danificá-la.</p>
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="update_post" value="Atualizar">
		        <span><a class="link-voltar" href="novidades.php?source=listar">Voltar</a></span>
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->