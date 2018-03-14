<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source']) && isset($_GET['s_id']) && isset($_GET['img_id'])) {
		
	$the_service_id = $_GET['s_id']; //id do serviço
	$the_image_service_id = $_GET['img_id']; //id da imagem do serviço

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

		$service_img = $_FILES['service_img']['name'];
		$service_img_temp = $_FILES['service_img']['tmp_name'];

	  	try {
	        
	        move_uploaded_file($service_img_temp, "../img/servicos/$service_img");
	        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['service_img']['error'] === UPLOAD_ERR_OK) {

	        	//Caso não haja inserção de nova imagem, busca a atual
				if(empty($service_img)) {
			        $query = "SELECT * FROM services_images WHERE ID = $the_image_service_id ";
			        $select_image = mysqli_query($connection, $query);
			        
			        while($row = mysqli_fetch_array($select_image)) {
			            $service_img = $row['IMG_PATH'];
			        }
			    }

		        $query = "UPDATE services_images SET ";
		        $query .="IMG_PATH = '{$service_img}' ";
		        $query .="WHERE ID = '{$the_image_service_id}' ";    

		        $edit_image_service = mysqli_query($connection, $query);
		        if(!$edit_image_service) {
		            die('QUERY FAILED' . mysqli_error($connection));
		        } else {
		            header("Location: imagens_servicos.php?source=listar&s_id={$the_service_id}");
		        }

	        } else { 
	            throw new UploadException($_FILES['service_img']['error']); 
	        }   
	    } catch (UploadException $e) {
	        echo $e->getMessage();
	    }

	} 
?>   

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Imagem
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Serviço selecionado: </label>
                <p class="form-control-static"><?php if(isset($service_title)){echo $service_title;} else {echo "Deu ruim aqui";}?></p>
            </div>

		    <div class="form-group">
		    	<img src="../img/servicos/<?php if(isset($service_img_path)) {echo $service_img_path;} ?>" style="width: 150px;">
		        <input type="file" name="service_img" class="form-control">
		    </div>
		    
		    <span class="form-group">
		        <input type="submit" class="btn btn-primary" name="edit_service_image" value="Salvar">
		    </span>

		    <span class="link-voltar" style="margin-left: 15px;">
		    	<a href="imagens_servicos.php?source=listar">Voltar</a>
			</span>
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

// Traz Página de Erro


}?>