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
						/*case 'adicionar':
							include "pages/adicionar_imagens_inicio.php";
							break;*/
						case 'editar':
							include "pages/editar_imagens_inicio.php";
							break;
						case 'trocar_status':
							$the_home_id = escape($_GET['h_id']);
				            $the_status = escape($_GET['status']);

				            if($the_status == 'A'){
				            	$query = "UPDATE inicio SET ";
					        	$query .= "STATUS = 'I' ";  
					            $query .= "WHERE INICIO_ID = '{$the_home_id}' ";
				            } else {
					           	$query = "UPDATE inicio SET ";
					        	$query .= "STATUS = 'A' ";  
					            $query .= "WHERE INICIO_ID = '{$the_home_id}' ";
				            }

				           	$change_status_home_query = mysqli_query($connection, $query);
				            confirmQuery($change_status_home_query);
				            
						    header("Location: imagens_inicio.php?source=listar"); 
						    break;
						case 'listar':
							include "pages/listar_imagens_inicio.php";
							break;
						default:
							include "pages/listar_imagens_inicio.php";
							break;
					}
				} else {
					include "pages/listar_imagens_inicio.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
