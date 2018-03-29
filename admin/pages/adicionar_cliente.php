<?php 

//Adicionar cliente
if(isset($_POST['create_client'])) {

    if(isset($_POST['clients_grupo'])) {$clients_grupo = escape($_POST['clients_grupo']);} else {$clients_grupo = "";} 
    if(isset($_POST['clients_position'])) {$clients_position = escape($_POST['clients_position']);} else {$clients_position = "";}
    if(isset($_FILES['clients_image']['name'])) {$clients_image = escape($_FILES['clients_image']['name']);} else {$clients_image = "";}
    if(isset($_FILES['clients_image']['tmp_name'])) {$clients_image_temp = escape($_FILES['clients_image']['tmp_name']);} else {$clients_image_temp = "";}
    
    $clients_username = $_SESSION['username'];

    if($clients_grupo == "" || empty($clients_grupo)) {
        $bad_message = "O grupo não foi preenchido. Favor preenchê-lo para prosseguir.";
    } else if($clients_position == "" || empty($clients_position)) {
    	$bad_message = "A ordem de exibição não foi preenchida. Favor preenchê-la para prosseguir.";
   	} else if($clients_image == "" || empty($clients_image)) {
    	$bad_message = "A imagem não foi selecionada. Favor selecioná-la para prosseguir.";
    } else {

    	try {

    		move_uploaded_file($clients_image_temp, "../img/clients/$clients_image");
        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['clients_image']['error'] === UPLOAD_ERR_OK) {

            	$query = "INSERT INTO clients(IMG_PATH, POSITION, GRUPO, CREATION_DATE) ";
            	$query .= "VALUE('{$clients_image}','{$clients_position}','{$clients_grupo}', CURRENT_TIMESTAMP) ";	

	            $add_client = mysqli_query($connection, $query);

	            if(!$add_client) {
	                die('Erro de inserção de dados: ' . mysqli_error($connection));
	            } else {
	            	$good_message = "O cliente foi adicionado.";
	            }
		    } else { 
		        throw new UploadException($_FILES['clients_image']['error']); 
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
                <p class="help-block">O grupo é a linha das imagens em que o cliente ficará na página inicial.</p>
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
                <p class="help-block">Resolução máxima indicada: 300x70 pixels. Formatos de imagens aceitos: jpg/jpeg. Tamanho Máximo: 1MB.</p>
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="create_client" value="Adicionar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->