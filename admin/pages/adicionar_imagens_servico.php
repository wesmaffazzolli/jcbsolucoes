<?php 

if(isset($_POST['publish_service_image'])) {
	$service = $_POST['service']; 
    $service_img = $_FILES['service_img']['name'];
    $service_img_temp = $_FILES['service_img']['tmp_name'];

    if($service_img == "" || empty($service_img)) {
        echo "Selecione uma imagem para prosseguir.";
    } else if($service == "" || empty($service)) {
    	echo "Selecione um serviço para prosseguir.";
    } else {

    	try {

    		move_uploaded_file($service_img_temp, "../img/servicos/$service_img");
        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['service_img']['error'] === UPLOAD_ERR_OK) {
		
	            $query = "INSERT INTO services_images(IMG_PATH, SERVICES_ID) ";
	            $query .= "VALUE('{$service_img}','{$service}') ";

	            $add_image_service = mysqli_query($connection, $query);
	            if(!$add_image_service) {
	                die('QUERY FAILED' . mysqli_error($connection));
	            } else {
	                echo "Imagem adicionada com sucesso.";
	            }

	        } else { 
	            throw new UploadException($_FILES['service_img']['error']); 
	        } 
	    } catch (UploadException $e) {
	        echo $e->getMessage();
	    }
    }
}

?>   


<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar Imagem
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Procedimento: </label>
                <p class="form-control-static">Selecione o serviço e depois a imagem que deseja adicionar.</p>
            </div>

		    
		    <div class="form-group">
		    	<label for="service">Serviços: </label>
		        <select name="service" id="">
		        	<option value=""></option>

		            <?php

		            	if(isset($_GET['source'])) {
		            	$query = "SELECT * FROM services ORDER BY TITLE ";
		            	$select_services = mysqli_query($connection, $query); 
		            	confirmQuery($select_services);
			            	while($row = mysqli_fetch_assoc($select_services)) { 
			                	$service_id = $row['ID'];
			                	$service_title = $row['TITLE'];

			                	echo "<option value='{$service_id}'>{$service_title}</option>";
			                }
		            	}

		            ?>
		        </select>
		    </div>
		    
		    <div class="form-group">
		        <input type="file" name="service_img" class="form-control">
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="publish_service_image" value="Publicar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->