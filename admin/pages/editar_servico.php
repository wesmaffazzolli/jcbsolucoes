<?php

if(isset($_GET['source'])) {
$the_service_id = $_GET['p_id'];

$query = "SELECT * FROM services WHERE ID = $the_service_id ";
$select_services = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_services)) {
        $service_id = $row['ID'];    
        $service_title = $row['TITLE'];
        $service_content = $row['CONTENT'];
        $service_update_date = $row['UPDATE_DATE'];
        $service_update_username = "adminjcb";
    }

}

if(isset($_POST['edit_service'])) {    
    $service_title = $_POST['service_title'];
    $service_content = $_POST['service_content'];
    $service_update_username = "adminjcb";

    $query = "UPDATE services SET ";
    $query .="TITLE = '{$service_title}', ";
    $query .="CONTENT = '{$service_content}', ";
    $query .="UPDATE_DATE = now(), ";
    $query .="UPDATE_USERNAME = '{$service_update_username}' ";
    $query .="WHERE ID = '{$the_service_id}' "; 

    $update_service = mysqli_query($connection, $query);
        
    confirmQuery($update_service);  

} ?>

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Serviço
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
		<form action="" method="post">
            
			<label for="service_title">Título</label>
		    <div class="form-group">
		        <input type="text" class="form-control" name="service_title" value="<?php echo $service_title; ?>">
		    </div>

            <div class="form-group">
                <label for="service_content">Conteúdo</label>
                <textarea id="summernote" type="text" name="service_content" class="form-control" cols="30" rows="10"><?php echo $service_content; ?></textarea>
            </div>

		    <div class="form-group">
		        <input class="btn btn-primary" type="submit" name="edit_service" value="Salvar">
		    </div>
		</form>

	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->