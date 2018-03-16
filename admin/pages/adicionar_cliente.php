<?php 

if(isset($_POST['publish_client'])) {

	$home_id = $_GET['h_id'];

	$home_title = $_POST['home_title'];
	$home_descr = $_POST['home_descr']; 
    $home_img = $_FILES['home_img']['name'];
    $home_img_temp = $_FILES['home_img']['tmp_name'];

    if($home_title == "" || empty($home_title)) {
        echo "O título não foi preenchido. Favor preenchê-lo para prosseguir.";
    } else if($home_descr == "" || empty($home_descr)) {
    	echo "O texto não foi preenchido. Favor preenchê-lo para prosseguir.";
   	} else if($home_img == "" || empty($home_img)) {
    	echo "A imagem não foi selecionada. Favor selecioná-la para prosseguir.";
    } else {

    	try {

    		move_uploaded_file($home_img_temp, "../img/intro-carousel/$home_img");
        
	        //Verificação de erros possíveis durante o upload das imagens
	        if ($_FILES['home_img']['error'] === UPLOAD_ERR_OK) {

	        	$query = "UPDATE mainpage_data SET ";
	        	$query .= "TITLE = '{$home_title}', ";
	        	$query .= "STATUS = 'A', "; 
	        	$query .= "DESCR = '{$home_descr}' "; 
	            $query .= "WHERE MAINPAGE_DATA_ID = '{$home_id}' ";

	           	$add_home_data = mysqli_query($connection, $query);

	           	if(!$add_home_data) {

	                die('Erro de inserção de dados: ' . mysqli_error($connection));

	            } else {

	            	$query_img = "INSERT INTO mainpage_images(IMG_PATH, MAINPAGE_DATA_ID) ";
	            	$query_img .= "VALUE('{$home_img}','{$home_id}') ";	

		            $add_home_img = mysqli_query($connection, $query_img);

		            if(!$add_home_img) {
		                die('Erro de inserção de dados: ' . mysqli_error($connection));
		            } else {
		            	header("Location: imagens_inicio.php?source=listar");
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
        Adicionar Cliente
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="clients_line">Linha:</label>
                <select name="clients_line">
                    <?php
                        for($line = 1; $line <= 2 ; $line++) {
                            echo "<option value='{$line}'>{$line}</option>";
                        }  
                    ?>
                </select>
            </div>
		    
            <div class="form-group">
                <label for="clients_order">Ordem de exibição:</label>
                <select name="clients_order" id="">
                    <?php
                        for($order = 1; $order <= 10 ; $order++) {
                            echo "<option value='{$order}'>{$order}</option>";
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