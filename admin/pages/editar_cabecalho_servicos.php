<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source'])) {
		
	$query = "SELECT HEADER_IMG FROM services LIMIT 1";
	$select_services = mysqli_query($connection, $query); 

	$row = mysqli_fetch_array($select_services);
	$services_header_img = $row['HEADER_IMG'];    
	

	//Mecanismo de atualização da imagem do cabeçalho da tela de serviços
	if(isset($_POST['edit_header_service'])) {

		if(isset($_FILES['services_header_img']['name'])){$services_header_img = escape($_FILES['services_header_img']['name']);}else{$services_header_img = "";}
		if(isset($_FILES['services_header_img']['tmp_name'])){$services_header_img_temp = $_FILES['services_header_img']['tmp_name'];}else{$services_header_img_temp = "";}

	  	try {

  			//Caso não haja inserção de nova imagem, busca a atual
			if(empty($services_header_img)) {

		        $select_image = mysqli_query($connection, $query);
		        
		        while($row = mysqli_fetch_array($select_image)) {
		            $services_header_img = $row['HEADER_IMG'];
		        }
		    } else {
		    	move_uploaded_file($services_header_img_temp, "../img/servicos/$services_header_img");	
		    }      
	        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['services_header_img']['error'] === UPLOAD_ERR_OK) {

		        $query = "UPDATE services SET ";
		        $query .="HEADER_IMG = '{$services_header_img}' ";

		        $edit_services_header = mysqli_query($connection, $query);
		        if(!$edit_services_header) {
		            die('QUERY FAILED = ' . mysqli_error($connection));
		        } else {
		        	$good_message = "O cabeçalho foi atualizado.";
		        }

	        } else { 
	            throw new UploadException($_FILES['services_header_img']['error']); 
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
        Editar Cabeçalho Serviços
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		    	<img id="myImg" src="../img/servicos/<?php if(isset($services_header_img) && !empty($services_header_img)){echo $services_header_img;}else{echo 'imagem-nao-disponivel.png';} ?>" width="200">
		    	<p class="help-block">Clique na imagem para visualizá-la.</p>	
		        <input type="file" name="services_header_img" class="form-control">
		        <p class="help-block">Resolução máxima indicada: 1920x1468 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="edit_header_service" value="Atualizar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } ?>