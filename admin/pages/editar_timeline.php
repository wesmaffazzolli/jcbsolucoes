<?php    

if(isset($_GET['source'])) {

$the_timeline_id = $_GET['t_id'];

$query = "SELECT * FROM timeline WHERE TIMELINE_ID = $the_timeline_id ";

$select_timeline_by_id = mysqli_query($connection, $query); 
while($row = mysqli_fetch_assoc($select_timeline_by_id)) {
    $timeline_id = $row['TIMELINE_ID'];
    $timeline_title = $row['TITLE'];
    $timeline_year = $row['YEAR'];
    $timeline_status = $row['STATUS'];
    $timeline_content = $row['CONTENT'];
    $timeline_update_username = $row['UPDATE_USERNAME'];
}
 
if(isset($_POST['update_timeline'])) {

    if(isset($_POST['timelime_title'])) {$timeline_title = $_POST['timelime_title'];} else {$timeline_title = "";} 
    if(isset($_POST['timeline_year'])) {$timeline_year = $_POST['timeline_year'];} else {$timeline_year = "";}
    if(isset($_POST['timeline_content'])) {$timeline_content = $_POST['timeline_content'];} else {$timeline_content = "";}

    $timeline_update_username = $_SESSION['username'];

    if($timeline_title == "" || empty($timeline_title)) {
        $bad_message = "Preencha o título para prosseguir.";
    } else if($timeline_year == "" || empty($timeline_year)) {
        $bad_message = "Preencha o ano para prosseguir.";
    } else if($timeline_content == "" || empty($timeline_content)) {
        $bad_message = "Preencha o texto para prosseguir.";
    } else {

        $query = "UPDATE timeline SET ";
        $query .="TITLE = '{$timeline_title}', ";
        $query .="YEAR = '{$timeline_year}', ";
        $query .="CONTENT = '{$timeline_content}', ";
        $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
        $query .="UPDATE_USERNAME = '{$timeline_update_username}' ";
        $query .="WHERE TIMELINE_ID = '{$the_timeline_id}' "; 

        $update_timeline_query = mysqli_query($connection, $query);
        if(!$update_timeline_query) {
            die('QUERY FAILED = ' . mysqli_error($connection));
        } else {
            $good_message = "A história foi alterada.";
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
        Adicionar história na Timeline
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body">
		<form action="" method="post">
            
			<label for="timelime_title">Título:</label>
		    <div class="form-group">
		        <input type="text" class="form-control" name="timelime_title" maxlength="100" value="<?php if(isset($timeline_title)){echo $timeline_title;}else{echo '';} ?>">
                <p class="help-block">Máx 100 caracteres.</p>
		    </div>

            <div class="form-group">
                <label for="timeline_year">Ano:</label>
                <select name="timeline_year" id="">
                    <option value="<?php if(isset($timeline_year)){echo $timeline_year;}{echo '';}?>"><?php if(isset($timeline_year)){echo $timeline_year;}{echo "" ;}?></option>
                    <?php
                        for($year = 2040; $year >= 1960 ; $year--) {
                            echo "<option value='{$year}'>{$year}</option>";
                        }  
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="timeline_content">Conteúdo:</label>
                <textarea type="text" name="timeline_content" class="form-control" cols="30" rows="10" maxlength="300"><?php if(isset($timeline_content)){echo $timeline_content;}{echo "";}?></textarea>
                <p class="help-block">Máx 300 caracteres.</p>
            </div>

		    <div class="form-group">
		        <input class="btn botao-crud" type="submit" name="update_timeline" value="Atualizar">
                <span><a class="link-voltar" href="timeline.php?source=listar">Voltar</a></span>
		    </div>
		</form>

	</div>
	<!-- Panel Body End -->

</div>
<!-- Panel Default End -->

<?php } ?>