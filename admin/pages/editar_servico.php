<?php

if(isset($_GET['source'])) {

$the_service_id = escape($_GET['p_id']);

$query = "SELECT * FROM services WHERE ID = $the_service_id ";
$select_services = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_services)) {    
        $service_title = $row['TITLE'];
        $service_content = $row['CONTENT'];
    }

}

if(isset($_POST['edit_service'])) {

    if(isset($_POST['service_title'])){$service_title = escape($_POST['service_title']);}else{$service_title = "";}
    if(isset($_POST['service_content'])){$service_content = escape($_POST['service_content']);}else{$service_content = "";}
    
    $service_update_username = $_SESSION['username'];

    if(empty($service_content) || $service_content == "") {
       $bad_message = "Campo conteúdo vazio. Preencha-o para prosseguir.";
    } else if(empty($service_title) || $service_title == "") {
        $bad_message = "Campo título vazio. Preencha-o para prosseguir.";
    } else {

        $query = "UPDATE services SET ";
        $query .="TITLE = '{$service_title}', ";
        $query .="CONTENT = '{$service_content}', ";
        $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
        $query .="UPDATE_USERNAME = '{$service_update_username}' ";
        $query .="WHERE ID = '{$the_service_id}' "; 


        $update_service = mysqli_query($connection, $query);
            
        if(!$update_service) {
            die("Query Failed = ". mysqli_error($connection));
        } else {
            $good_message = "O serviço foi alterado.";
        }

    }

} ?>

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
        Editar Serviço
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
		<form action="" method="post">
            
			<label for="service_title">Título</label>
		    <div class="form-group">
		        <input type="text" class="form-control" name="service_title" value="<?php if(isset($service_title)) {echo $service_title;}else{$service_title="";} ?>" maxlength="150">
                <p class="help-block">Máx 150 caracteres.</p>
		    </div>

            <div class="form-group">
                <label for="service_content">Conteúdo</label>
                <textarea id="summernote" type="text" name="service_content" class="form-control" cols="30" rows="10" maxlength="3000"><?php if(isset($service_content)) {echo $service_content;}else{$service_content="";} ?></textarea>
                <p class="help-block">Máx 3000 caracteres. Aumente a caixa de texto arrastando sua borda inferior para baixo. Use somente esta caixa para edição de texto. Aviso: imagens, vídeos e outros conteúdos que forem adicionados poderão afetar a estrutura da página e danificá-la.</p>
            </div>

		    <div class="form-group">
		        <input class="btn botao-crud" type="submit" name="edit_service" value="Atualizar">
                <span><a class="link-voltar" href="servicos.php?source=listar">Voltar</a></span>
		    </div>
		</form>

	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->