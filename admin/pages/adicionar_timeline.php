<?php

	//Adicionar Timeline    
    if(isset($_POST['create_timeline'])) {

        if(isset($_POST['timelime_title'])) {$timeline_title = $_POST['timelime_title'];} else {$timeline_title = "";} 
        if(isset($_POST['timeline_year'])) {$timeline_year = $_POST['timeline_year'];} else {$timeline_year = "";}
        if(isset($_POST['timeline_content'])) {$timeline_content = $_POST['timeline_content'];} else {$timeline_content = "";}

        if($timeline_title == "" || empty($timeline_title)) {
            echo "Preencha o título para prosseguir.";
        } else if($timeline_year == "" || empty($timeline_year)) {
            echo "Preencha o ano para prosseguir.";
        } else if($timeline_content == "" || empty($timeline_content)) {
            echo "Preencha o texto para prosseguir.";
        } else {

            $query = "INSERT INTO timeline(TITLE, CONTENT, STATUS, YEAR, CREATION_DATE)";
            $query .= "VALUE('{$timeline_title}','{$timeline_content}','I','{$timeline_year}', CURRENT_TIMESTAMP)";

            $create_timeline_query = mysqli_query($connection, $query);
            if(!$create_timeline_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            } else {
                echo "História adicionada na Timeline com sucesso. Ative-a no menú listar.";
            }
        }
    }
?>

<div class="alert alert-success">
    <strong>Success!</strong> Indicates a successful or positive action.
</div>

<div class="alert alert-danger">
    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar história na Timeline
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
		<form action="" method="post">
            
			<label for="timelime_title">Título:</label>
		    <div class="form-group">
		        <input type="text" class="form-control" name="timelime_title">
		    </div>

            <div class="form-group">
                <label for="timeline_year">Ano:</label>
                <select name="timeline_year" id="">
                    <?php
                        for($year = 2040; $year >= 1960 ; $year--) {
                            echo "<option value='{$year}'>{$year}</option>";
                        }  
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="timeline_content">Conteúdo:</label>
                <textarea type="text" name="timeline_content" class="form-control" cols="30" rows="10" placeholder="Escreva a história aqui..."></textarea>
            </div>

		    <div class="form-group">
		        <input class="btn btn-primary" type="submit" name="create_timeline" value="Adicionar">
		    </div>
		</form>

	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->