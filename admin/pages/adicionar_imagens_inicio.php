<?php 

if(isset($_POST['publish_home_image'])) {

	$home_id = $_GET['h_id'];

	if(isset($_POST['home_title'])){$home_title = $_POST['home_title'];}else{$home_title = "";}
	if(isset($_POST['home_descr'])){$home_descr = $_POST['home_descr'];}else{$home_descr = "";} 
	if(isset($_POST['home_url'])){$home_url = $_POST['home_url'];}else{$home_url = "";}
    if(isset($_FILES['home_img']['name'])){$home_img = $_FILES['home_img']['name'];}else{$home_img = "";}
    if(isset($_FILES['home_img']['tmp_name'])){$home_img_temp = $_FILES['home_img']['tmp_name'];}else{$home_img_temp = "";}

    if($home_title == "" || empty($home_title)) {
        echo "O título não foi preenchido. Favor preenchê-lo para prosseguir.";
    } else if($home_descr == "" || empty($home_descr)) {
    	echo "O texto não foi preenchido. Favor preenchê-lo para prosseguir.";
   	} else if($home_img == "" || empty($home_img)) {
    	echo "A imagem não foi selecionada. Favor selecioná-la para prosseguir.";
    } else if($home_url == "" || empty($home_url)) {
    	echo "A URL de direcionamento não foi adicionada. Favor adicioná-la para prosseguir.";
    } else {

    	try {

    		move_uploaded_file($home_img_temp, "../img/intro-carousel/$home_img");
        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['home_img']['error'] === UPLOAD_ERR_OK) {

	        	$query = "UPDATE inicio SET ";
	        	$query .= "TITLE = '{$home_title}', ";
	        	$query .= "STATUS = 'I', "; 
	        	$query .= "IMG_PATH = {$home_img}, ";
	        	$query .= "URL = {$home_url}, "; 
	        	$query .= "DESCR = '{$home_descr}' "; 
	            $query .= "WHERE INICIO_ID = '{$home_id}' ";

	           	$add_home_data = mysqli_query($connection, $query);

	           	if(!$add_home_data) {

	                die('Erro de inserção de dados: ' . mysqli_error($connection));

	            } else {

	            	echo "O conteúdo foi adicionado com sucesso.";
			    } 

			} else { 
		        throw new UploadException($_FILES['home_img']['error']); 
		    } 

		} catch (UploadException $e) {
		        echo $e->getMessage();
		}
	}
}

?>   

<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar Conteúdo no Início	
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="home_title">Título: </label>
				<input type="text" class="form-control" name="home_title">
			</div>
		    
		    <div class="form-group">
		    	<label for="home_img">Imagem: </label>
		        <input type="file" name="home_img" class="form-control">
		        <p class="help-block">Example block-level help text here.</p>
		    </div>

		    <div class="form-group">
				<label for="home_url">URL do Botão "Saiba Mais" redireciona para: </label>
				<input type="text" class="form-control" name="home_url">
			</div>

		    <div class="form-group">
		        <label for="home_descr">Texto:</label>
		        <textarea type="text" name="home_descr" class="form-control" id="" cols="30" rows="5" placeholder="Escreva o texto que aparecerá junto com a imagem na página inicial..."></textarea>
		    </div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="publish_home_image" value="Publicar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->