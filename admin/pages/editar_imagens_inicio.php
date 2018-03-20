<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source']) && isset($_GET['h_id'])) {
		
	$the_home_id = $_GET['h_id']; //id do conteúdo
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

        if(isset($_POST['home_title'])){$home_title = $_POST['home_title'];}else{$home_title = "";}
        if(isset($_POST['home_descr'])){$home_descr = $_POST['home_descr'];}else{$home_descr = "";}
        if(isset($_POST['home_url'])){$home_url = $_POST['home_url'];}else{$home_url = "";}
		if(isset($_FILES['home_img']['name'])){$home_img = $_FILES['home_img']['name'];}else{$home_img = "";}
		if(isset($_FILES['home_img']['name'])){$home_img_temp = $_FILES['home_img']['tmp_name'];}else{$home_img_temp = "";}

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
	        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['home_img']['error'] === UPLOAD_ERR_OK || $_FILES['home_img']['error'] === UPLOAD_ERR_NO_FILE) {

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
		        	echo "Conteúdo alterado com sucesso.";
		        }

	        } else { 
	            throw new UploadException($_FILES['home_img']['error']); 
	        }   
	    } catch (UploadException $e) {
	        echo $e->getMessage();
	    }

	} 
?>   

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Conteúdo do Início	
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="home_title">Título: </label>
				<input type="text" class="form-control" name="home_title" value="<?php if(isset($home_title)){echo $home_title;}else{echo '';} ?>">
			</div>
		    
		    <div class="form-group">
		    	<img src="../img/intro-carousel/<?php if(isset($home_img) && !empty($home_img)){echo $home_img;}else{echo 'imagem-nao-disponivel.png';} ?>" width="200">
		        <input type="file" name="home_img" class="form-control">
		    </div>

		   	<div class="form-group">
				<label for="home_url">URL do Botão "Saiba Mais" redireciona para: </label>
				<input type="text" class="form-control" name="home_url" value="<?php if(isset($home_url)){echo $home_url;}else{echo '';} ?>">
			</div>

		    <div class="form-group">
		        <label for="home_descr">Texto:</label>
		        <textarea type="text" name="home_descr" class="form-control" cols="30" rows="5"><?php if(isset($home_descr)){echo $home_descr;}else{echo '';}?></textarea>
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="edit_home_content" value="Publicar">
		        <span><a href="imagens_inicio.php?source=listar">Voltar</a></span>
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

// Traz Página de Erro


}?>