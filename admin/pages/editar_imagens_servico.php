<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source']) && isset($_GET['s_id']) && isset($_GET['img_id'])) {
		
	$the_service_id = escape($_GET['s_id']); //id do serviço
	$the_image_service_id = escape($_GET['img_id']); //id da imagem do serviço

	$query = "SELECT A.ID, A.IMG_PATH, B.TITLE FROM services_images A, services B ";
    $query .="WHERE A.ID = $the_image_service_id ";
    $query .="AND A.SERVICES_ID = B.ID ";
    $query .="AND B.ID = $the_service_id ";

	$select_services_and_images_by_id = mysqli_query($connection, $query); 
	confirmQuery($select_services_and_images_by_id);

	while($row = mysqli_fetch_assoc($select_services_and_images_by_id)) { 
		$service_title = $row['TITLE'];
		$service_img_path = $row['IMG_PATH'];
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['edit_service_image'])) {

		if(isset($_FILES['service_img']['name'])){$service_img = escape($_FILES['service_img']['name']);}else{$service_img = "";}
		if(isset($_FILES['service_img']['name'])){$service_img_temp = $_FILES['service_img']['tmp_name'];}else{$service_img_temp = "";}

	  	try {

  			//Caso não haja inserção de nova imagem, busca a atual
			if(empty($service_img)) {
		        $query = "SELECT * FROM services_images WHERE ID = $the_image_service_id ";
		        $select_image = mysqli_query($connection, $query);
		        
		        while($row = mysqli_fetch_array($select_image)) {
		            $service_img = $row['IMG_PATH'];
		        }
		    } else {

		    	move_uploaded_file($service_img_temp, "../img/servicos/$service_img");
		    	
		    }

	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['service_img']['error'] === UPLOAD_ERR_OK) {

		        $query = "UPDATE services_images SET ";
		        $query .="IMG_PATH = '{$service_img}' ";
		        $query .="WHERE ID = '{$the_image_service_id}' ";    

		        $edit_image_service = mysqli_query($connection, $query);
		        if(!$edit_image_service) {
		            die('QUERY FAILED = ' . mysqli_error($connection));
		        } else {
		        	$good_message = "A imagem foi alterada.";
		        }

	        } else { 
	            throw new UploadException($_FILES['service_img']['error']); 
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
        Editar Imagem
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Serviço selecionado: </label>
                <span class="form-control-static"><?php if(isset($service_title)){echo $service_title;} else {echo "Deu ruim aqui";}?></span>
            </div>

		    <div class="form-group">
		    	<img id="myImg" src="../img/servicos/<?php if(isset($service_img_path)) {echo $service_img_path;} ?>" style="width: 150px;">
		    	<p class="help-block">Clique na imagem para visualizá-la.</p>
		        <input type="file" name="service_img" class="form-control">
		        <p class="help-block">Resolução máxima indicada: 1920x1468 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>
		    
		    <span class="form-group">
		        <input type="submit" class="btn botao-crud" name="edit_service_image" value="Atualizar">
		        <span><a class="link-voltar" href="imagens_servicos.php?source=listar&s_id=<?php echo $the_service_id; ?>">Voltar</a></span>
		    </span>
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } ?>