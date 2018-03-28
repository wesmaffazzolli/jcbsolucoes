<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source'])) {
		
	$query = "SELECT HEADER_IMG FROM services ";
	$select_services = mysqli_query($connection, $query); 

	$row = mysqli_fetch_array($select_services);
	$services_header_img = $row['HEADER_IMG'];    
	

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['edit_header_service'])) {

		if(isset($_FILES['services_header_img']['name'])){$services_header_img = $_FILES['services_header_img']['name'];}else{$services_header_img = "";}
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
		        	echo "Cabeçalho atualizado com sucesso.";
		        }

	        } else { 
	            throw new UploadException($_FILES['services_header_img']['error']); 
	        }   
	    } catch (UploadException $e) {
	        echo $e->getMessage();
	    }

	} 
?>   

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Cabeçalho Serviços
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
		    <div class="form-group">
		    	<img src="../img/servicos/<?php if(isset($services_header_img) && !empty($services_header_img)){echo $services_header_img;}else{echo 'imagem-nao-disponivel.png';} ?>" width="200">
		        <input type="file" name="services_header_img" class="form-control">
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="edit_header_service" value="Atualizar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

// Traz Página de Erro


}?>