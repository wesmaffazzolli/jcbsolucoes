<?php

if(isset($_GET['source']) && isset($_GET['c_id'])) {
		
	$the_client_id = escape($_GET['c_id']);
	
    $query = "SELECT CLIENTS_ID, IMG_PATH, GRUPO, POSITION, CREATION_DATE, UPDATE_DATE, UPDATE_USERNAME FROM clients ";  
    $query .= "WHERE CLIENTS_ID = $the_client_id ";
    $query .= "ORDER BY GRUPO, POSITION ";

	$select_client_by_id = mysqli_query($connection, $query); 
	confirmQuery($select_client_by_id);

    $select_clients_by_id = mysqli_query($connection, $query); 
    while($row = mysqli_fetch_assoc($select_clients_by_id)) {
        $clients_image = $row['IMG_PATH'];
        $clients_group = $row['GRUPO'];
        $clients_position = $row['POSITION'];
        $clients_creation_date = $row['CREATION_DATE'];
        $clients_update_date = $row['UPDATE_DATE'];
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['update_client'])) {

        if(isset($_POST['clients_grupo'])){$clients_group = escape($_POST['clients_grupo']);}else{$clients_group="";}
        if(isset($_POST['clients_position'])){$clients_position = escape($_POST['clients_position']);}else{$clients_position="";}
        if(isset($_FILES['clients_image']['name'])){$clients_image = escape($_FILES['clients_image']['name']);}else{$clients_image="";}
        if(isset($_FILES['clients_image']['tmp_name'])){$clients_image_temp = $_FILES['clients_image']['tmp_name'];}else{$clients_image_temp="";}

        $clients_update_username = $_SESSION['username'];

	  	try {

  			//Caso não haja inserção de nova imagem, busca a atual
			if(empty($clients_image)) {
		        $query = "SELECT * FROM clients WHERE CLIENTS_ID = $the_client_id ";
		        $select_image = mysqli_query($connection, $query);
		        
		        while($row = mysqli_fetch_array($select_image)) {
		            $clients_image = $row['IMG_PATH'];
		        }
		    } else {
		    	move_uploaded_file($clients_image_temp, "../img/clients/$clients_image");
		    }

	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['clients_image']['error'] === UPLOAD_ERR_OK || $_FILES['clients_image']['error'] === UPLOAD_ERR_NO_FILE) {

		        $query = "UPDATE clients SET ";
		        $query .="IMG_PATH = '{$clients_image}', ";
		        $query .="GRUPO = '{$clients_group}', ";
		        $query .="POSITION = '{$clients_position}', ";
		        $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		        $query .="UPDATE_USERNAME = '{$clients_update_username}' ";
		        $query .="WHERE CLIENTS_ID = '{$the_client_id}' ";    

		        $edit_client = mysqli_query($connection, $query);
		        if(!$edit_client) {
		            die('QUERY FAILED = ' . mysqli_error($connection));
		        } else {
		        	$good_message = "O Cliente foi alterado.";
		        }

	        } else { 
	            throw new UploadException($_FILES['clients_image']['error']); 
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
        Editar Cliente
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="clients_grupo">Grupo:</label>
                <select name="clients_grupo">
                	<?php echo "<option value='{$clients_group}'>{$clients_group}</option>"; ?>
                    <?php
                        for($grupo = 1; $grupo <= 2 ; $grupo++) {
                        	if($grupo != $clients_group) {
                        		echo "<option value='{$grupo}'>{$grupo}</option>";
                        	}
                        }  
                    ?>
                </select>
                <p class="help-block">O grupo é a linha das imagens em que o cliente ficará na página inicial.</p>
            </div>
		    
            <div class="form-group">
                <label for="clients_position">Ordem de exibição:</label>
                <select name="clients_position">
                	<?php echo "<option value='{$clients_position}'>{$clients_position}</option>"; ?>
                    <?php
                        for($position = 1; $position <= 10 ; $position++) {
                        	if($position != $clients_position) {
                        		echo "<option value='{$position}'>{$position}</option>";
                        	}
                        }  
                    ?>
                </select>
            </div>

            <img id="myImg" class="myImg" src="../img/clients/<?php if(isset($clients_image) && !empty($clients_image)){echo $clients_image;}else{echo 'imagem-nao-disponivel.png'; }?>" width="200">
            <p class="help-block">Clique na imagem para visualizá-la.</p>
		    <div class="form-group">
		        <input type="file" name="clients_image" class="form-control">
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn botao-crud" name="update_client" value="Atualizar">
		        <span><a class="link-voltar" href="clientes.php?source=listar">Voltar</a></span>
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } ?>