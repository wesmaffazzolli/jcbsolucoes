<?php 

//Mecanismo de busca e preenchimento dos campos
if(isset($_GET['source'])) {

    $query = "SELECT * FROM contact ";

	$select_contact = mysqli_query($connection, $query); 
	confirmQuery($select_contact);

	while($row = mysqli_fetch_assoc($select_contact)) { 
		$contact_address = $row['ADDRESS'];
        $contact_phone1 = $row['PHONE1'];
        $contact_phone2 = $row['PHONE2'];
        $contact_email = $row['EMAIL'];
        $contact_url_facebook = $row['URL_FACEBOOK'];
        $contact_url_instagram = $row['URL_INSTAGRAM'];
        $contact_url_linkedin = $row['URL_LINKEDIN'];
        $contact_update_date = $row['UPDATE_DATE'];
        $contact_update_username = "adminjcb";
	}

	//Mecanismo de atualização da imagem do serviço
	if(isset($_POST['update_contact_address']) || isset($_POST['update_contact_phone']) || isset($_POST['update_contact_email']) || isset($_POST['update_contact_url'])) {

        if(isset($_POST['contact_phone1'])){$contact_phone1 = $_POST['contact_phone1'];}else{$contact_phone1 = "";};
        if(isset($_POST['contact_phone2'])){$contact_phone2 = $_POST['contact_phone2'];}else{$contact_phone2 = "";};
        if(isset($_POST['contact_address'])){$contact_address = $_POST['contact_address'];}else{$contact_address = "";};
        if(isset($_POST['contact_url_facebook'])){$contact_url_facebook = $_POST['contact_url_facebook'];}else{$contact_url_facebook = "";};
        if(isset($_POST['contact_url_instagram'])){$contact_url_instagram = $_POST['contact_url_instagram'];}else{$contact_url_instagram = "";};
        if(isset($_POST['contact_url_linkedin'])){$contact_url_linkedin = $_POST['contact_url_linkedin'];}else{$contact_url_linkedin = "";};
        if(isset($_POST['contact_email'])){$contact_email = $_POST['contact_email'];}else{$contact_email = "";};
 

        if(isset($_POST['update_contact_address'])){

	        $query = "UPDATE contact SET ";
		    $query .="ADDRESS = '{$contact_address}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$contact_update_username}' ";

        } else if(isset($_POST['update_contact_phone'])){

        	$query = "UPDATE contact SET ";
		    $query .="PHONE1 = '{$contact_phone1}', ";
		    $query .="PHONE2 = '{$contact_phone2}', ";
		    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
		    $query .="UPDATE_USERNAME = '{$contact_update_username}' ";

        	} else if(isset($_POST['update_contact_email'])){

        		$query = "UPDATE contact SET ";
			    $query .="EMAIL = '{$contact_email}', ";
			    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
			    $query .="UPDATE_USERNAME = '{$contact_update_username}' ";

        		} else if(isset($_POST['update_contact_url'])){

		    		$query = "UPDATE contact SET ";
				    $query .="URL_FACEBOOK = '{$contact_url_facebook}', ";
				    $query .="URL_INSTAGRAM = '{$contact_url_instagram}', ";
				    $query .="URL_LINKEDIN = '{$contact_url_linkedin}', ";
				    $query .="UPDATE_DATE = CURRENT_TIMESTAMP, ";
				    $query .="UPDATE_USERNAME = '{$contact_update_username}' ";

        			}

        $update_contact = mysqli_query($connection, $query);
        if(!$update_contact) {
            die('QUERY FAILED = ' . mysqli_error($connection));
        } else {
        	header("Location: contato.php?source=editar");
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

		<div class="col-sm-6"> 
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Telefones
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="contact_phone1">Telefone 1:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="contact_phone1" value="<?php if(isset($contact_phone1)){echo $contact_phone1;} else {echo '';} ?>">
					    </div>
						<label for="contact_phone2">Telefone 2:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="contact_phone2" value="<?php if(isset($contact_phone2)){echo $contact_phone2;} else {echo '';} ?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_contact_phone" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> 

		<div class="col-sm-6">
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Endereço
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="contact_address">Endereço:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="contact_address" value="<?php if(isset($contact_address)){echo $contact_address;} else {echo '';} ?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_contact_address" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-sm-6"> <!--Coluna 3 Painel Objetivos: INÍCIO -->
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Redes Sociais
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="contact_url_facebook">Facebook URL:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="contact_url_facebook" value="<?php if(isset($contact_url_facebook)){echo $contact_url_facebook;} else {echo '';}?>">
					    </div>
						<label for="contact_url_instagram">Instagram URL:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="contact_url_instagram" value="<?php if(isset($contact_url_instagram)){echo $contact_url_instagram;} else {echo '';}?>">
					    </div>
					    <label for="contact_url_linkedin">Linkedin URL:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="contact_url_linkedin" value="<?php if(isset($contact_url_linkedin)){echo $contact_url_linkedin;} else {echo '';}?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_contact_url" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 3 Painel Objetivos: FIM -->

		<div class="col-sm-6">
			<div class="panel panel-default">
			    <div class="panel-heading">
			        Email
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
					<form action="" method="post">
						<label for="contact_email">Email:</label>
					    <div class="form-group">
					        <input type="text" class="form-control" name="contact_email" value="<?php if(isset($contact_email)){echo $contact_email;} else {echo '';} ?>">
					    </div>
					    <div class="form-group">
					        <input class="btn btn-primary" type="submit" name="update_contact_email" value="Atualizar">
					    </div>
					</form>
				</div>
				<!-- Panel Body End -->
			</div>
		</div> <!--Coluna 2 Painel Visão: FIM -->
	</div>

	<?php if(isset($contact_update_date) && isset($contact_update_username)) { ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="well"><?php echo "Última atualização realizada em $contact_update_date por $contact_update_username."?></div>
		</div>
	</div>
	<?php } ?>

</div>

<?php } ?>   