<?php 

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source'])) {

    $query = "SELECT * FROM nossos_numeros ";

	$select_nossos_numeros = mysqli_query($connection, $query); 
	confirmQuery($select_nossos_numeros);

	while($row = mysqli_fetch_assoc($select_nossos_numeros)) { 
		$nossos_numeros_text_main = $row['TEXT_MAIN'];
        $nossos_numeros_num1 = $row['NUM1'];
        $nossos_numeros_num2 = $row['NUM2'];
        $nossos_numeros_num3 = $row['NUM3'];
        $nossos_numeros_num4 = $row['NUM4'];
        $nossos_numeros_text1 = $row['TEXT1'];
        $nossos_numeros_text2 = $row['TEXT2'];
        $nossos_numeros_text3 = $row['TEXT3'];
        $nossos_numeros_text4 = $row['TEXT4'];
        $nossos_numeros_creation_date = $row['CREATION_DATE'];

        $date = new DateTime($row['UPDATE_DATE']);
        $nossos_numeros_update_date = $date->format('d/m/Y H:i');

        $nossos_numeros_update_username = $row['UPDATE_USERNAME'];
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['update_nossos_numeros1']) || isset($_POST['update_nossos_numeros2']) || isset($_POST['update_nossos_numeros3']) || isset($_POST['update_nossos_numeros4']) || isset($_POST['update_nossos_numeros_text_main'])) {

        if(isset($_POST['num1'])){$nossos_numeros_num1 = escape($_POST['num1']);}else{$nossos_numeros_num1 = "";};
        if(isset($_POST['num2'])){$nossos_numeros_num2 = escape($_POST['num2']);}else{$nossos_numeros_num2 = "";};
        if(isset($_POST['num3'])){$nossos_numeros_num3 = escape($_POST['num3']);}else{$nossos_numeros_num3 = "";};
        if(isset($_POST['num4'])){$nossos_numeros_num4 = escape($_POST['num4']);}else{$nossos_numeros_num4 = "";};
        if(isset($_POST['text1'])){$nossos_numeros_text1 = escape($_POST['text1']);}else{$nossos_numeros_text1 = "";};
        if(isset($_POST['text2'])){$nossos_numeros_text2 = escape($_POST['text2']);}else{$nossos_numeros_text2 = "";};
        if(isset($_POST['text3'])){$nossos_numeros_text3 = escape($_POST['text3']);}else{$nossos_numeros_text3 = "";};
        if(isset($_POST['text4'])){$nossos_numeros_text4 = escape($_POST['text4']);}else{$nossos_numeros_text4 = "";};
       	if(isset($_POST['text_main'])){$nossos_numeros_text_main = escape($_POST['text_main']);}else{$nossos_numeros_text_main = "";};

       	$nossos_numeros_update_username = $_SESSION['username'];

        if(isset($_POST['update_nossos_numeros1'])){

	        $query = "UPDATE nossos_numeros SET ";
		    $query .="NUM1 = '{$nossos_numeros_num1}', ";
		    $query .="TEXT1 = '{$nossos_numeros_text1}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";

        } else if(isset($_POST['update_nossos_numeros2'])){

        	$query = "UPDATE nossos_numeros SET ";
		    $query .="NUM2 = '{$nossos_numeros_num2}', ";
		    $query .="TEXT2 = '{$nossos_numeros_text2}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";

        	} else if(isset($_POST['update_nossos_numeros3'])){

        		$query = "UPDATE nossos_numeros SET ";
			    $query .="NUM3 = '{$nossos_numeros_num3}', ";
			    $query .="TEXT3 = '{$nossos_numeros_text3}', ";
			    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
			    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";

        		} else if(isset($_POST['update_nossos_numeros4'])){

		    		$query = "UPDATE nossos_numeros SET ";
				    $query .="NUM4 = '{$nossos_numeros_num4}', ";
				    $query .="TEXT4 = '{$nossos_numeros_text4}', ";
				    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
				    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";

        			} else if(isset($_POST['update_nossos_numeros_text_main'])) {
			    		$query = "UPDATE nossos_numeros SET ";
					    $query .="TEXT_MAIN = '{$nossos_numeros_text_main}', ";
					    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
					    $query .="UPDATE_USERNAME = '{$nossos_numeros_update_username}' ";
        			}

        $update_nossos_numeros = mysqli_query($connection, $query);
        if(!$update_nossos_numeros) {
            die('QUERY FAILED = ' . mysqli_error($connection));
        } else {
        	header("Location: nossos_numeros.php?source=atualizar_numeros");
        }
    }

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
		<div class="panel panel-default"> <!--Painel Texto Principal: INÍCIO -->
			    <div class="panel-heading"> 
			        Texto da Seção dos Nossos Números
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="text_main">Texto:</label>
					    <div class="form-group">
					        <textarea type="text" name="text_main" class="form-control" cols="30" rows="3"><?php if(isset($nossos_numeros_text_main)){echo $nossos_numeros_text_main;}else{echo "Uma história fundada em competência e dedicação: ";} ?></textarea>
					    </div>
					    <div class="form-group">
					        <input class="btn botao-crud" type="submit" name="update_nossos_numeros_text_main" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div> <!--Painel Texto Principal: FIM -->
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
					        <input type="text" class="form-control" name="text1" value="<?php if(isset($nossos_numeros_text1)){echo $nossos_numeros_text1;} else {echo '';}?>" maxlength="100">
					        <p class="help-block">Max 100 caracteres.</p>
					    </div>
					    <div class="form-group">
					        <input class="btn botao-crud" type="submit" name="update_nossos_numeros1" value="Atualizar">
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
					        <input type="text" class="form-control" name="text2" value="<?php if(isset($nossos_numeros_text2)){echo $nossos_numeros_text2;} else {echo '';}?>" maxlength="100">
					         <p class="help-block">Max 100 caracteres.</p>
					    </div>
					    <div class="form-group">
					        <input class="btn botao-crud" type="submit" name="update_nossos_numeros2" value="Atualizar">
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
					        <input type="text" class="form-control" name="text3" value="<?php if(isset($nossos_numeros_text3)){echo $nossos_numeros_text3;} else {echo '';}?>" maxlength="100">
					        <p class="help-block">Max 100 caracteres.</p>
					    </div>
					    <div class="form-group">
					        <input class="btn botao-crud" type="submit" name="update_nossos_numeros3" value="Atualizar">
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
					        <input type="text" class="form-control" name="text4" value="<?php if(isset($nossos_numeros_text4)){echo $nossos_numeros_text4;} else {echo '';}?>" maxlength="100">
					        <p class="help-block">Max 100 caracteres.</p>
					    </div>
					    <div class="form-group">
					        <input class="btn botao-crud" type="submit" name="update_nossos_numeros4" value="Atualizar">
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