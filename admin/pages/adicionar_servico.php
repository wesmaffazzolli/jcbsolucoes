<?php

	//Adicionar Serviço    
    if(isset($_POST['create_service'])) {

    if(isset($_POST['service_title'])){$service_title = escape($_POST['service_title']);}else{$service_title = "";}
    if(isset($_POST['service_content'])){$service_content = escape($_POST['service_content']);}else{$service_content = "";}

    if(empty($service_content) || $service_content = "") {
       $bad_message = "Campo conteúdo vazio. Preencha-o para prosseguir.";
    } else if(empty($service_title) || $service_title = "") {
        $bad_message = "Campo título vazio. Preencha-o para prosseguir.";
    } else {

            $query = "INSERT INTO services(TITLE, CONTENT)";
            $query .= "VALUE('{$service_title}','{$service_content}')";

            $create_service_query = mysqli_query($connection, $query);
            if(!$create_service_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            } else {
                $good_message = "O serviço foi adicionado.";
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
        Adicionar Serviço
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
		<form action="" method="post">
            
			<label for="service_title">Título</label>
		    <div class="form-group">
		        <input type="text" class="form-control" name="service_title" placeholder="Digite o nome do serviço..." maxlength="150">
                <p class="help-block">Máx 150 caracteres.</p>
		    </div>

            <div class="form-group">
                <label for="service_content">Conteúdo</label>
                <textarea id="summernote" name="service_content" class="form-control" cols="30" rows="10" maxlength="3000"></textarea>
                <p class="help-block">Máx 3000 caracteres. Aumente a caixa de texto arrastando sua borda inferior para baixo. Use somente esta caixa para edição de texto. Aviso: imagens, vídeos e outros conteúdos que forem adicionados poderão afetar a estrutura da página e danificá-la.</p>
            </div>

		    <div class="form-group">
		        <input class="btn botao-crud" type="submit" name="create_service" value="Adicionar">
		    </div>
		</form>
	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->