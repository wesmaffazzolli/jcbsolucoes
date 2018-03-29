<?php 

if(isset($_POST['publish_service_image'])) {

	if(isset($_POST['service'])){$service = escape($_POST['service']);}else{$service = "";}
    if(isset($_FILES['service_img']['name'])){$service_img = escape($_FILES['service_img']['name']);}else{$service_img = "";}
    if(isset($_FILES['service_img']['tmp_name'])){$service_img_tmp = $_FILES['service_img']['tmp_name'];}else{$service_img_tmp = "";}

    if($service_img == "" || empty($service_img)) {
        $bad_message = "Selecione uma imagem para prosseguir.";
    } else if($service == "" || empty($service)) {
    	$bad_message = "Selecione um serviço para prosseguir.";
    } else {

    	try {

    		move_uploaded_file($service_img_tmp, "../img/servicos/$service_img");
        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['service_img']['error'] === UPLOAD_ERR_OK) {
		
	            $query = "INSERT INTO services_images(IMG_PATH, SERVICES_ID) ";
	            $query .= "VALUE('{$service_img}','{$service}') ";

	            $add_image_service = mysqli_query($connection, $query);
	            if(!$add_image_service) {
	                die('QUERY FAILED' . mysqli_error($connection));
	            } else {
	                $good_message = "A imagem foi adicionada.";
	            }

	        } else { 
	            throw new UploadException($_FILES['service_img']['error']); 
	        } 
	    } catch (UploadException $e) {
	        $bad_message = $e->message;
	    }
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
        Adicionar Imagem no Serviço
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Procedimento: </label>
                <span class="form-control-static">Selecione o serviço e depois a imagem que deseja adicionar.</span>
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
		        <p class="help-block">Resolução máxima indicada: 1920x1468 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="publish_service_image" value="Publicar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->