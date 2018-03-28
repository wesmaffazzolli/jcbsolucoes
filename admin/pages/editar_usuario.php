<?php

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source'])) {

    $query = "SELECT * FROM user ";

	$select_user = mysqli_query($connection, $query); 
	$bad_message = confirmQuery($select_user);

	while($row = mysqli_fetch_assoc($select_user)) { 
        $username = $row['USERNAME'];
        $password = $row['PASSWORD'];	
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['edit_user'])) {

        if(isset($_POST['username'])){$username = $_POST['username'];}else{$username = "";}
        if(isset($_POST['password'])){$password = $_POST['password'];}else{$password = "";}

		$query = "SELECT RANDSALT FROM user";
		$select_randsalt_query = mysqli_query($connection, $query);

		if(!$select_randsalt_query) {
		    die("Query Failed" . mysqli_error($connection));
		}

		$row = mysqli_fetch_array($select_randsalt_query);

		$salt = $row['RANDSALT'];

		$password = crypt($password, $salt);

        $query = "UPDATE user SET ";
        $query .="USERNAME = '{$username}', ";
        $query .="PASSWORD = '{$password}' ";

        $edit_user_query = mysqli_query($connection, $query);
        if(!$edit_user_query) {
            die('QUERY FAILED = ' . mysqli_error($connection));
        } else {
        	$good_message = "O usuário foi alterado.";
        }

	} 
?>   

<?php if(isset($good_message) && !empty($good_message)) { ?>

<div class="alert alert-success">
	<strong>Sucesso!</strong><?php echo " ".$good_message; ?>
</div>	

<?php } else if(isset($bad_message) && !empty($bad_message)) {?>

<div class="alert alert-danger">
	<strong>Erro!</strong> <?php echo " ".$bad_message; ?>;
</div>

<?php } ?>	

<div class="panel panel-default">
    <div class="panel-heading">
        Editar Usuário
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="username">Usuário: </label>
				<input type="text" class="form-control" name="username" value="<?php if(isset($username)){echo $username;}else{echo '';} ?>">
			</div>

			<div class="form-group">
				<label for="password">Senha: </label>
				<input type="text" class="form-control" name="password" value="<?php if(isset($password)){echo $password;}else{echo '';} ?>">
			</div>
		    
		    <div class="form-group">
		        <input type="submit" class="btn btn-primary" name="edit_user" value="Atualizar">
		    </div>
		    
		</form>
    </div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } else {

// Traz Página de Erro


}?>