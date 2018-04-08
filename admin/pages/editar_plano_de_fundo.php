<?php

if(isset($_GET['source']) && isset($_GET['p_id'])) {

	$page_id = escape($_GET['p_id']);

	if($page_id == 'n' || $page_id == 's' || $page_id == 'i') {

		if($page_id == 'n') {
			$background_tbl = "nossos_numeros";
			$background_page_description = "Nossos Números";
		} else if($page_id == 's') {
			$background_tbl = "services";
			$background_page_description = "Serviços";
		} else {
			$background_tbl = "institucional";
			$background_page_description = "Sobre Nós";
		}

		$select_query = "SELECT BACKGROUND_IMG FROM ".$background_tbl." LIMIT 1 ";

		$select_image = mysqli_query($connection, $select_query);

		$row = mysqli_fetch_array($select_image);
		$background_img = $row['BACKGROUND_IMG'];


		if(isset($_POST['edit_background'])) { 

			if(isset($_FILES['background_img']['name'])){$background_img = escape($_FILES['background_img']['name']);}
			if(isset($_FILES['background_img']['tmp_name'])){$background_img_tmp = $_FILES['background_img']['tmp_name'];}

		  	try {

				//Caso não haja inserção de nova imagem, busca a atual
				if(empty($background_img)) {

			        $select_image = mysqli_query($connection, $select_query);
			        
			        while($row = mysqli_fetch_array($select_image)) {
			            $background_img = $row['BACKGROUND_IMG'];
			        }

			    } else {
			    	move_uploaded_file($background_img_tmp, "../img/backgrounds/$background_img");	
			    }      
		        
		        //Verificação de erros possíveis durante o upload das imagens
		        if ($_FILES['background_img']['error'] === UPLOAD_ERR_OK) {

			        $update_query = "UPDATE ".$background_tbl." SET ";
			        $update_query .="BACKGROUND_IMG = '{$background_img}' ";

			        $update_background_img = mysqli_query($connection, $update_query);
			        if(!$update_background_img) {
			            die('QUERY FAILED = ' . mysqli_error($connection));
			        } else {
			        	$good_message = "O plano de fundo foi atualizado.";
			        }

		        } else { 
		            throw new UploadException($_FILES['background_img']['error']); 
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
       	<?php if(isset($background_page_description)){echo "Plano de fundo da página: ".$background_page_description;} ?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
    	<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		    	<img id="myImg" class="myImg" src="../img/backgrounds/<?php if(isset($background_img) && !empty($background_img)){echo $background_img;}else{echo 'imagem-nao-disponivel.png';} ?>" width="400">
		    	<p class="help-block">Clique na imagem para visualizá-la.</p>	
		        <input type="file" name="background_img" class="form-control">
		        <p class="help-block">Resolução máxima indicada: 1920x1150 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="edit_background" value="Atualizar">
		    </div>
		    
		</form>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

	header("Location: planos_de_fundo.php?source=error");

} } ?>