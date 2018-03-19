<?php 

//Adicionar cliente
if(isset($_POST['publish_client'])) {

    if(isset($_POST['clients_grupo'])) {$clients_grupo = $_POST['clients_grupo'];} else {$clients_grupo = "";} 
    if(isset($_POST['clients_position'])) {$clients_position = $_POST['clients_position'];} else {$clients_position = "";}
    if(isset($_FILES['clients_image']['name'])) {$clients_image = $_FILES['clients_image']['name'];} else {$clients_image = "";}
    if(isset($_FILES['clients_image']['tmp_name'])) {$clients_image_temp = $_FILES['clients_image']['tmp_name'];} else {$clients_image_temp = "";}
    $username = "adminjcb";

    if($clients_grupo == "" || empty($clients_grupo)) {
        echo "O grupo não foi preenchido. Favor preenchê-lo para prosseguir.";
    } else if($clients_position == "" || empty($clients_position)) {
    	echo "A ordem de exibição não foi preenchida. Favor preenchê-la para prosseguir.";
   	} else if($clients_image == "" || empty($clients_image)) {
    	echo "A imagem não foi selecionada. Favor selecioná-la para prosseguir.";
    } else {

    	try {

    		move_uploaded_file($clients_image_temp, "../img/clients/$clients_image");
        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['clients_image']['error'] === UPLOAD_ERR_OK) {

            	$query = "INSERT INTO clients(IMG_PATH, POSITION, GRUPO, CREATION_DATE, UPDATE_USERNAME) ";
            	$query .= "VALUE('{$clients_image}','{$clients_position}','{$clients_grupo}', CURRENT_TIMESTAMP, '{$username}') ";	

	            $add_client = mysqli_query($connection, $query);

	            if(!$add_client) {
	                die('Erro de inserção de dados: ' . mysqli_error($connection));
	            } else {
	            	echo "O cliente foi adicionado.";
	            }
		    } else { 
		        throw new UploadException($_FILES['clients_image']['error']); 
		    } 

		} catch (UploadException $e) {
		        echo $e->getMessage();
		}
	}
}

?>   

<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar Cliente
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="clients_grupo">Grupo:</label>
                <select name="clients_grupo">
                    <?php
                        for($grupo = 1; $grupo <= 2 ; $grupo++) {
                            echo "<option value='{$grupo}'>{$grupo}</option>";
                        }  
                    ?>
                </select>
            </div>
		    
            <div class="form-group">
                <label for="clients_position">Ordem de exibição:</label>
                <select name="clients_position" id="">
                    <?php
                        for($position = 1; $position <= 10 ; $position++) {
                            echo "<option value='{$position}'>{$position}</option>";
                        }  
                    ?>
                </select>
            </div>

		    <div class="form-group">
		        <label for="clients_image">Imagem:</label>
		        <input type="file" name="clients_image" class="form-control">
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="publish_client" value="Adicionar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->