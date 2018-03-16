<?php 

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source'])) {

    $query = "SELECT * FROM nossos_numeros ";

	$select_nossos_numeros = mysqli_query($connection, $query); 
	confirmQuery($select_nossos_numeros);

	while($row = mysqli_fetch_assoc($select_nossos_numeros)) { 
		$nossos_numeros_id = $row['NOSSOS_NUMEROS_ID'];
        $nossos_numeros_num1 = $row['NUM1'];
        $nossos_numeros_num2 = $row['NUM2'];
        $nossos_numeros_num3 = $row['NUM3'];
        $nossos_numeros_num4 = $row['NUM4'];
        $nossos_numeros_text1 = $row['TEXT1'];
        $nossos_numeros_text2 = $row['TEXT2'];
        $nossos_numeros_text3 = $row['TEXT3'];
        $nossos_numeros_text4 = $row['TEXT4'];
        $nossos_numeros_creation_date = $row['CREATION_DATE'];
        $nossos_numeros_update_date = $row['UPDATE_DATE'];
        $nossos_numeros_update_username = "adminjcb";
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['update_nossos_numeros1']) || isset($_POST['update_nossos_numeros2']) || isset($_POST['update_nossos_numeros3']) || isset($_POST['update_nossos_numeros4'])) {

        if(isset($_POST['num1'])){$nossos_numeros_num1 = $_POST['num1'];}else{$nossos_numeros_num1 = "";};
        if(isset($_POST['num2'])){$nossos_numeros_num2 = $_POST['num2'];}else{$nossos_numeros_num2 = "";};
        if(isset($_POST['num3'])){$nossos_numeros_num3 = $_POST['num3'];}else{$nossos_numeros_num3 = "";};
        if(isset($_POST['num4'])){$nossos_numeros_num4 = $_POST['num4'];}else{$nossos_numeros_num4 = "";};
        if(isset($_POST['text1'])){$nossos_numeros_text1 = $_POST['text1'];}else{$nossos_numeros_text1 = "";};
        if(isset($_POST['text2'])){$nossos_numeros_text2 = $_POST['text2'];}else{$nossos_numeros_text2 = "";};
        if(isset($_POST['text3'])){$nossos_numeros_text3 = $_POST['text3'];}else{$nossos_numeros_text3 = "";};
        if(isset($_POST['text4'])){$nossos_numeros_text4 = $_POST['text4'];}else{$nossos_numeros_text4 = "";};

        if(isset($_POST['update_nossos_numeros1'])){

	        $query = "UPDATE nossos_numeros SET ";
		    $query .="NUM1 = '{$nossos_numeros_num1}', ";
		    $query .="TEXT1 = '{$nossos_numeros_text1}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";
		    $query .="WHERE NOSSOS_NUMEROS_ID = '{$nossos_numeros_id}' ";

        } else if(isset($_POST['update_nossos_numeros2'])){

        	$query = "UPDATE nossos_numeros SET ";
		    $query .="NUM2 = '{$nossos_numeros_num2}', ";
		    $query .="TEXT2 = '{$nossos_numeros_text2}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";
		    $query .="WHERE NOSSOS_NUMEROS_ID = '{$nossos_numeros_id}' ";

        	} else if(isset($_POST['update_nossos_numeros3'])){

        		$query = "UPDATE nossos_numeros SET ";
			    $query .="NUM3 = '{$nossos_numeros_num3}', ";
			    $query .="TEXT3 = '{$nossos_numeros_text3}', ";
			    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
			    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";
			    $query .="WHERE NOSSOS_NUMEROS_ID = '{$nossos_numeros_id}' ";

        		} else if(isset($_POST['update_nossos_numeros4'])){

		    		$query = "UPDATE nossos_numeros SET ";
				    $query .="NUM4 = '{$nossos_numeros_num4}', ";
				    $query .="TEXT4 = '{$nossos_numeros_text4}', ";
				    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
				    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";
				    $query .="WHERE NOSSOS_NUMEROS_ID = '{$nossos_numeros_id}' ";

        			}

        $update_nossos_numeros = mysqli_query($connection, $query);
        if(!$update_nossos_numeros) {
            die('QUERY FAILED = ' . mysqli_error($connection));
        } else {
        	header("Location: sobre.php?source=nossos_numeros");
        }
    }

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-success">
  				<strong>Success!</strong> Indicates a successful or positive action.
			</div>	

			<div class="alert alert-danger">
  				<strong>Danger!</strong> Indicates a dangerous or potentially negative action.
			</div>		
		</div>

		<div class="col-sm-6"> <!--Painel Institucional: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Número 1
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="num1">Número:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="num1" value="<?php if(isset($nossos_numeros_num1)){echo $nossos_numeros_num1;} else {echo '';}?>">
					    </div>
						<label for="text1">Texto:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="text1" value="<?php if(isset($nossos_numeros_text1)){echo $nossos_numeros_text1;} else {echo '';}?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_nossos_numeros1" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Painel Institucional: FIM -->

		<div class="col-sm-6"> <!--Coluna 2 Painel Missão: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Número 2
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="num2">Número:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="num2" value="<?php if(isset($nossos_numeros_num2)){echo $nossos_numeros_num2;} else {echo '';}?>">
					    </div>
						<label for="text2">Texto:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="text2" value="<?php if(isset($nossos_numeros_text2)){echo $nossos_numeros_text2;} else {echo '';}?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_nossos_numeros2" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 1 Painel Missão: FIM -->


	</div>

	<div class="row">
		<div class="col-sm-6"> <!--Coluna 2 Painel Visão: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Número 3
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="num3">Número:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="num3" value="<?php if(isset($nossos_numeros_num3)){echo $nossos_numeros_num3;} else {echo '';}?>">
					    </div>
						<label for="text3">Texto:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="text3" value="<?php if(isset($nossos_numeros_text3)){echo $nossos_numeros_text3;} else {echo '';}?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_nossos_numeros3" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 2 Painel Visão: FIM -->

		<div class="col-sm-6"> <!--Coluna 3 Painel Objetivos: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Número 4
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="num4">Número:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="num4" value="<?php if(isset($nossos_numeros_num4)){echo $nossos_numeros_num4;} else {echo '';}?>">
					    </div>
						<label for="text4">Texto:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="text4" value="<?php if(isset($nossos_numeros_text4)){echo $nossos_numeros_text4;} else {echo '';}?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_nossos_numeros4" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 3 Painel Objetivos: FIM -->

	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="well"><?php echo "Última atualização realizada em $nossos_numeros_update_date por $nossos_numeros_update_username."?></div>
		</div>
	</div>

</div>

<?php } ?>   