<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source']) && isset($_GET['h_id'])) {
		
	$the_home_id = escape($_GET['h_id']); //id do conteúdo
	$home_update_username = "adminjcb";

    $query = "SELECT INICIO_ID, TITLE, DESCR, POSITION, IMG_PATH, URL ";
    $query .="FROM inicio WHERE INICIO_ID = $the_home_id ";
    $query .="ORDER BY POSITION ";

	$select_home_content_by_id = mysqli_query($connection, $query); 
	confirmQuery($select_home_content_by_id);

	while($row = mysqli_fetch_assoc($select_home_content_by_id)) { 
        $home_title = $row['TITLE'];
        $home_descr = $row['DESCR'];	
        $home_position = $row['POSITION'];
        $home_img = $row['IMG_PATH'];
        $home_url = $row['URL'];
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['edit_home_content'])) {

        if(isset($_POST['home_title'])){$home_title = escape($_POST['home_title']);}else{$home_title = "";}
        if(isset($_POST['home_descr'])){$home_descr = escape($_POST['home_descr']);}else{$home_descr = "";}
        if(isset($_POST['home_url'])){$home_url = escape($_POST['home_url']);}else{$home_url = "";}
		if(isset($_FILES['home_img']['name'])){$home_img = escape($_FILES['home_img']['name']);}else{$home_img = "";}
		if(isset($_FILES['home_img']['name'])){$home_img_temp = escape($_FILES['home_img']['tmp_name']);}else{$home_img_temp = "";}

	  	try {

	  		//Caso não haja inserção de nova imagem, busca a atual
  			if(empty($home_img)) {
				
		        $query = "SELECT * FROM inicio WHERE INICIO_ID = $the_home_id ";
		        $select_image = mysqli_query($connection, $query);
		        
		        while($row = mysqli_fetch_array($select_image)) {
		            $home_img = $row['IMG_PATH'];
		        }

			} else {
			    move_uploaded_file($home_img_temp, "../img/intro-carousel/$home_img");	
			}

			if(empty($home_descr)) {
				$bad_message = "Campo texto vazio. Preencha-o para prosseguir.";
			} else if(empty($home_title)) {
				$bad_message = "Campo título vazio. Preencha-o para prosseguir.";
			} 
				
				if(empty($bad_message)) {
					if($_FILES['home_img']['error'] === UPLOAD_ERR_OK || $_FILES['home_img']['error'] === UPLOAD_ERR_NO_FILE) {
						$query = "UPDATE inicio SET ";
				        $query .="IMG_PATH = '{$home_img}', ";
				        $query .="TITLE = '{$home_title}', ";
				        $query .="DESCR = '{$home_descr}', ";
				        $query .="URL = '{$home_url}', ";
				        $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
				        $query .="UPDATE_USERNAME = '{$home_update_username}' ";
				        $query .="WHERE INICIO_ID = '{$the_home_id}' ";    

				        $edit_home_carousel = mysqli_query($connection, $query);
				        if(!$edit_home_carousel) {
				            die('QUERY FAILED = ' . mysqli_error($connection));
				        } else {
				        	$good_message = "O conteúdo foi alterado.";
				        }

			        } else { 
			            throw new UploadException($_FILES['home_img']['error']); 
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
        Editar Conteúdo do Início	
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="home_title">Título: </label>
				<input type="text" class="form-control" name="home_title" value="<?php if(isset($home_title)){echo $home_title;}else{echo '';} ?>" maxlength="255">
				<p class="help-block">Máx 255 caracteres.</p>
			</div>
		    
		    <div class="form-group">
		    	<img id="myImg" src="../img/intro-carousel/<?php if(isset($home_img) && !empty($home_img)){echo $home_img;}else{echo 'imagem-nao-disponivel.png';} ?>" width="200">
		    	<p class="help-block">Clique na imagem para visualizá-la.</p>
		        <input type="file" name="home_img" class="form-control">
		        <p class="help-block">Resolução máxima indicada: 1920x1468 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>

		   	<div class="form-group">
				<label for="home_url">URL: </label>
				<input type="text" class="form-control" name="home_url" value="<?php if(isset($home_url)){echo $home_url;}else{echo '';} ?>">
				<p class="help-block">Esta URL direcionará o usuário quando clicar no botão "Saber Mais".</p>
			</div>

		    <div class="form-group">
		        <label for="home_descr">Texto:</label>
		        <textarea type="text" name="home_descr" class="form-control" cols="30" rows="10"><?php if(isset($home_descr)){echo $home_descr;}else{echo '';}?></textarea>
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="edit_home_content" value="Publicar">
		        <span><a class="link-voltar" href="imagens_inicio.php?source=listar">Voltar</a></span>
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

include "pages/nao_encontrado.php"; 

}?>