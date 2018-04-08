<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source']) && isset($_GET['img_id'])) {
		
	$the_nossos_numeros_imagens_id = escape($_GET['img_id']); 

    $query = "SELECT IMG_PATH ";
    $query .="FROM nossos_numeros_imagens WHERE ID = $the_nossos_numeros_imagens_id ";
    $query .="ORDER BY POSITION ";

	$select_nossos_numeros_imagens_by_id = mysqli_query($connection, $query); 
	confirmQuery($select_nossos_numeros_imagens_by_id);

	$row = mysqli_fetch_array($select_nossos_numeros_imagens_by_id);
    $nossos_numeros_imagens_img = $row['IMG_PATH'];
	

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['edit_nossos_numeros_imagens'])) {

		if(isset($_FILES['nossos_numeros_imagens_img']['name'])){$nossos_numeros_imagens_img = escape($_FILES['nossos_numeros_imagens_img']['name']);}else{$nossos_numeros_imagens_img = "";}
		if(isset($_FILES['nossos_numeros_imagens_img']['name'])){$nossos_numeros_imagens_img_temp = $_FILES['nossos_numeros_imagens_img']['tmp_name'];}else{$nossos_numeros_imagens_img_temp = "";}

		$nossos_numeros_imagens_update_username = $_SESSION['username'];

	  	try {

	  		//Caso não haja inserção de nova imagem, busca a atual
  			if(empty($nossos_numeros_imagens_img)) {
				
		        $query = "SELECT * FROM nossos_numeros_imagens WHERE ID = $the_nossos_numeros_imagens_id ";
		        $select_image = mysqli_query($connection, $query);
		        
		        while($row = mysqli_fetch_array($select_image)) {
		            $nossos_numeros_imagens_img = $row['IMG_PATH'];
		        }

			} else {
			    move_uploaded_file($nossos_numeros_imagens_img_temp, "../img/nossos-numeros/$nossos_numeros_imagens_img");	
			}
				
				if($_FILES['nossos_numeros_imagens_img']['error'] === UPLOAD_ERR_OK) {
					$query = "UPDATE nossos_numeros_imagens SET ";
			        $query .="IMG_PATH = '{$nossos_numeros_imagens_img}', ";
			        $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
			        $query .="UPDATE_USERNAME = '{$nossos_numeros_imagens_update_username}' ";
			        $query .="WHERE ID = '{$the_nossos_numeros_imagens_id}' ";    

			        $edit_nossos_numeros_imagens_carousel = mysqli_query($connection, $query);
			        if(!$edit_nossos_numeros_imagens_carousel) {
			            die('QUERY FAILED = ' . mysqli_error($connection));
			        } else {
			        	$good_message = "A imagem foi alterada.";
			        }

		        } else { 
		            throw new UploadException($_FILES['nossos_numeros_imagens_img']['error']); 
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
		    	<img id="myImg" class="myImg" src="../img/nossos-numeros/<?php if(isset($nossos_numeros_imagens_img) && !empty($nossos_numeros_imagens_img)){echo $nossos_numeros_imagens_img;}else{echo 'imagem-nao-disponivel.png';} ?>" width="400">
		    	<p class="help-block">Clique na imagem para visualizá-la.</p>
		        <input type="file" name="nossos_numeros_imagens_img" class="form-control">
		        <p class="help-block">Resoluções indicadas: (Mínima: 1024x768px / Máxima: 1920x1150px). Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="edit_nossos_numeros_imagens" value="Atualizar">
		        <span><a class="link-voltar" href="nossos_numeros.php?source=listar">Voltar</a></span>
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

include "pages/nao_encontrado.php"; 

}?>