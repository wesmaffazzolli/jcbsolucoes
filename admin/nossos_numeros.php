<?php include "includes/admin_header.php"; ?>    
    <div id="wrapper">

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel de Controle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
				<?php 

				if(isset($_GET['source'])) {
					$option = escape($_GET['source']);

					switch ($option) {
						case 'atualizar_numeros':
							include "pages/editar_nossos_numeros.php";
							break;
						case 'editar':
							include "pages/editar_imagens_nossos_numeros.php";
							break;
						case 'trocar_status':
							$the_nossos_numeros_imagens_id = escape($_GET['img_id']);
				            $the_nossos_numeros_imagens_status = escape($_GET['status']);

				            if($the_nossos_numeros_imagens_status == 'A'){
				            	$query = "UPDATE nossos_numeros_imagens SET ";
					        	$query .= "STATUS = 'I' ";  
					            $query .= "WHERE ID = '{$the_nossos_numeros_imagens_id}' ";
				            } else {
					           	$query = "UPDATE nossos_numeros_imagens SET ";
					        	$query .= "STATUS = 'A' ";  
					            $query .= "WHERE ID = '{$the_nossos_numeros_imagens_id}' ";
				            }

				           	$change_status_nossos_numeros_imagens_query = mysqli_query($connection, $query);
				            confirmQuery($change_status_nossos_numeros_imagens_query);
				            
						    header("Location: nossos_numeros.php?source=listar"); 
						    break;
						case 'listar':
							include "pages/listar_imagens_nossos_numeros.php";
							break;
						default:
							include "pages/nao_encontrado.php";
							break;
					}
				} else {
					include "pages/nao_encontrado.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
