<?php

	//Adicionar Serviço    
    if(isset($_POST['create_service'])) {

    $service_title = $_POST['service_title']; 
    $service_content = $_POST['service_content'];

        if($service_title == "" || empty($service_title)) {
            echo "Preencha o nome do serviço para prosseguir.";
        } else {
            $query = "INSERT INTO services(TITLE, CONTENT)";
            $query .= "VALUE('{$service_title}','{$service_content}')";

            $create_service_query = mysqli_query($connection, $query);
            if(!$create_service_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            } else {
                header("Location: servicos.php?source=listar");
            }
        }
    }
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar Serviço
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
		<form action="" method="post">
            
			<label for="service_title">Título</label>
		    <div class="form-group">
		        <input type="text" class="form-control" name="service_title" placeholder="Digite o nome do serviço...">
		    </div>

            <div class="form-group">
                <label for="service_content">Conteúdo</label>
                <textarea id="summernote" name="service_content" class="form-control" cols="30" rows="10"></textarea>
            </div>

		    <div class="form-group">
		        <input class="btn btn-primary" type="submit" name="create_service" value="Adicionar">
		    </div>
		</form>
	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->