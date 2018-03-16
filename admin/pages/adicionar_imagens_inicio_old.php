<?php 

if(isset($_POST['publish_home_image'])) {

	$home_title = $_POST['home_title'];
	$home_position = $_POST['home_position']; 
	$home_descr = $_POST['home_descr']; 
    $home_img = $_FILES['home_img']['name'];
    $home_img_temp = $_FILES['home_img']['tmp_name'];

    if($home_title == "" || empty($home_title)) {
        echo "O título não foi preenchido. Favor preenchê-lo para prosseguir.";
    } else if($home_position == "" || empty($home_position)) {
    	echo "A posição não foi selecionada. Favor selecioná-la para prosseguir.";
    } else if($home_descr == "" || empty($home_descr)) {
    	echo "O texto não foi preenchido. Favor preenchê-lo para prosseguir.";
   	} else if($home_img == "" || empty($home_img)) {
    	echo "A imagem não foi selecionada. Favor selecioná-la para prosseguir.";
    } else {

    	try {

    		move_uploaded_file($home_img_temp, "../img/intro-carousel/$home_img");
        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['home_img']['error'] === UPLOAD_ERR_OK) {

	        	$query = "INSERT INTO mainpage_data(TITLE, DESCR, STATUS, HTML_SECTION, POSITION) ";
	            $query .= "VALUE('{$home_title}','{$home_descr}','I', 'intro', '{$home_position}') ";

	           	$add_home_info = mysqli_query($connection, $query);

	           	if(!$add_home_info) {

	                die('Erro de inserção de dados: ' . mysqli_error($connection));

	            } else {

	            	$query = "SELECT ID FROM mainpage_data WHERE CREATION_DATE = (SELECT MAX(CREATION_DATE) FROM mainpage_data); "; 
					$most_recent_mainpage_data = mysqli_query($connection, $query);

					if(!$most_recent_mainpage_data) {

		                die('Erro de busca de dados: ' . mysqli_error($connection));

		            } else {

						while($row = mysqli_fetch_assoc($most_recent_mainpage_data)) { 
	                        $home_id = $row['ID'];
	                    } 

		            	$query_img = "INSERT INTO mainpage_images(IMG_PATH, MAINPAGE_DATA_ID) ";
		            	$query_img .= "VALUE('{$home_img}','{$home_id}') ";	

			            $add_home_img = mysqli_query($connection, $query_img);

			            if(!$add_home_img) {
			                die('Erro de inserção de dados: ' . mysqli_error($connection));
			            } else {
			            	echo "Conteúdo adicionado com sucesso.";
			            }
		            } 
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
		    	<label for="home_position">Posição da Publicação (Exemplo: 1 por primeiro, 2 por segundo, etc): </label>
		        <input type="number" class="form-control" name="home_position">
		    </div>
		    
		    <div class="form-group">
		    	<label for="home_img">Imagem: </label>
		        <input type="file" name="home_img" class="form-control">
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