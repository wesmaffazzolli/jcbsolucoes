<?php 

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source'])) {

    $query = "SELECT * FROM institucional ";

	$select_institucional = mysqli_query($connection, $query); 
	confirmQuery($select_institucional);

	while($row = mysqli_fetch_assoc($select_institucional)) { 
        $institucional_text = $row['INSTITUCIONAL_TEXT'];
        $institucional_missao_text = $row['MISSAO_TEXT'];
        $institucional_visao_text = $row['VISAO_TEXT'];
        $institucional_objetivos_text = $row['OBJETIVOS_TEXT'];
        $institucional_update_date = $row['UPDATE_DATE'];
        $institucional_update_username = "adminjcb";
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['update_institucional']) || isset($_POST['update_missao']) || isset($_POST['update_visao']) || isset($_POST['update_objetivos'])) {

        if(isset($_POST['institucional_text'])){$institucional_text = $_POST['institucional_text'];}else{$institucional_text = "";};
        if(isset($_POST['missao_text'])){$institucional_missao_text = $_POST['missao_text'];}else{$institucional_missao_text = "";};
        if(isset($_POST['visao_text'])){$institucional_visao_text = $_POST['visao_text'];}else{$institucional_visao_text = "";};
        if(isset($_POST['objetivos_text'])){$institucional_objetivos_text = $_POST['objetivos_text'];}else{$institucional_objetivos_text = "";};

        if(isset($_POST['update_institucional'])){

	        $query = "UPDATE institucional SET ";
		    $query .="INSTITUCIONAL_TEXT = '{$institucional_text}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$institucional_update_username}' ";

        } else if(isset($_POST['update_missao'])){

        	$query = "UPDATE institucional SET ";
		    $query .="MISSAO_TEXT = '{$institucional_missao_text}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$institucional_update_username}' ";

        	} else if(isset($_POST['update_visao'])){

        		$query = "UPDATE institucional SET ";
			    $query .="VISAO_TEXT = '{$institucional_visao_text}', ";
			    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
			    $query .="UPDATE_USERNAME = '{$institucional_update_username}' ";

        		} else if(isset($_POST['update_objetivos'])){

		    		$query = "UPDATE institucional SET ";
				    $query .="OBJETIVOS_TEXT = '{$institucional_objetivos_text}', ";
				    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
				    $query .="UPDATE_USERNAME = '{$institucional_update_username}' ";

        			}

        $update_institucional = mysqli_query($connection, $query);
        if(!$update_institucional) {
            die('QUERY FAILED = ' . mysqli_error($connection));
        } else {
        	header("Location: sobre.php?source=institucional");
        }
    }

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12"> <!--Painel Institucional: INÍCIO -->
			<div class="alert alert-success">
  				<strong>Success!</strong> Indicates a successful or positive action.
			</div>	

			<div class="alert alert-danger">
  				<strong>Danger!</strong> Indicates a dangerous or potentially negative action.
			</div>		

			<div class="panel panel-default">
			    <div class="panel-heading">
			        Institucional
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="institucional_text">Texto</label>
					    <div class="form-group">
					        <textarea type="text" name="institucional_text" class="form-control" cols="30" rows="5"><?php if(isset($institucional_text)){echo $institucional_text;}else{echo "Vazio.";} ?></textarea>
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_institucional" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Painel Institucional: FIM -->
	</div>

	<div class="row">
		<div class="col-sm-4" style="padding-left: 0px;"> <!--Coluna 1 Painel Missão: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Missão
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="missao_text">Texto</label>
					    <div class="form-group">
					        <textarea type="text" name="missao_text" class="form-control" cols="5" rows="5"><?php if(isset($institucional_missao_text)){echo $institucional_missao_text;}else{echo "Vazio.";} ?></textarea>
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_missao" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 1 Painel Missão: FIM -->

		<div class="col-sm-4"> <!--Coluna 2 Painel Visão: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Visão
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="visao_text">Texto</label>
					    <div class="form-group">
					        <textarea type="text" name="visao_text" class="form-control" cols="5" rows="5"><?php if(isset($institucional_visao_text)){echo $institucional_visao_text;}else{echo "Vazio.";} ?></textarea>
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_visao" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 2 Painel Visão: FIM -->

		<div class="col-sm-4" style="padding-right: 0px;"> <!--Coluna 3 Painel Objetivos: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Objetivos
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="objetivos_text">Texto</label>
					    <div class="form-group">
					        <textarea type="text" name="objetivos_text" class="form-control" cols="5" rows="5"><?php if(isset($institucional_objetivos_text)){echo $institucional_objetivos_text;}else{echo "Vazio.";} ?></textarea>
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_objetivos" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 3 Painel Objetivos: FIM -->

	</div>

</div>

<div class="row">
	<div class="col-sm-12">
		<div class="well"><?php echo "Última atualização realizada em $institucional_update_date por $institucional_update_username."?></div>
	</div>
</div>

<?php } ?>