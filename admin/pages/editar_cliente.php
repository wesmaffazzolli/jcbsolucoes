<?php

if(isset($_GET['source']) && isset($_GET['c_id'])) {
		
	$the_client_id = $_GET['c_id'];
	$clients_update_username = "adminjcb";
           
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

        $clients_group = $_POST['clients_grupo'];
        $clients_image = $_FILES['clients_image']['name'];
        $clients_image_temp = $_FILES['clients_image']['tmp_name'];
        $clients_position = $_POST['clients_position'];

	  	try {
	        
	        move_uploaded_file($clients_image_temp, "../img/clients/$clients_image");
	        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['clients_image']['error'] === UPLOAD_ERR_OK) {

	        	//Caso não haja inserção de nova imagem, busca a atual
				if(empty($clients_image)) {
			        $query = "SELECT * FROM clients WHERE CLIENTS_ID = $the_client_id ";
			        $select_image = mysqli_query($connection, $query);
			        
			        while($row = mysqli_fetch_array($select_image)) {
			            $client_img = $row['IMG_PATH'];
			        }
			    }

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
		        	echo "Cliente alterado com sucesso.";
		        }

	        } else { 
	            throw new UploadException($_FILES['clients_image']['error']); 
	        }   
	    } catch (UploadException $e) {
	        echo $e->getMessage();
	    }

	} 
?>   

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
                            echo "<option value='{$grupo}'>{$grupo}</option>";
                        }  
                    ?>
                </select>
            </div>
		    
            <div class="form-group">
                <label for="clients_position">Ordem de exibição:</label>
                <select name="clients_position" id="">
                	<?php echo "<option value='{$clients_position}'>{$clients_position}</option>"; ?>
                    <?php
                        for($position = 1; $position <= 10 ; $position++) {
                            echo "<option value='{$position}'>{$position}</option>";
                        }  
                    ?>
                </select>
            </div>

            <img src="../img/clients/<?php echo $clients_image?>" width="200">
		    <div class="form-group">
		        <input type="file" name="clients_image" class="form-control">
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="update_client" value="Atualizar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

// Traz Página de Erro


} ?>