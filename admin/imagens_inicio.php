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
					$option = $_GET['source'];

					switch ($option) {
						case 'adicionar':
							include "pages/adicionar_imagens_inicio.php";
							break;
						case 'editar':
							include "pages/editar_imagens_inicio.php";
							break;
						case 'trocar_status':
							$the_home_id = $_GET['h_id'];
				            $the_status = $_GET['status'];

				            if($the_status == 'A'){
				            	$query = "UPDATE mainpage_data SET ";
					        	$query .= "STATUS = 'I' ";  
					            $query .= "WHERE MAINPAGE_DATA_ID = '{$the_home_id}' ";
				            } else {
					           	$query = "UPDATE mainpage_data SET ";
					        	$query .= "STATUS = 'A' ";  
					            $query .= "WHERE MAINPAGE_DATA_ID = '{$the_home_id}' ";
				            }

				           	$change_status_home_query = mysqli_query($connection, $query);
				            confirmQuery($change_status_home_query);
				            
						    header("Location: imagens_inicio.php?source=listar"); 
						    break;
						case 'delete':
							/*$query = "DELETE FROM mainpage_images WHERE ID = {$the_img_home_id} ";
				            $delete_img_home_query = mysqli_query($connection, $query);
				            confirmQuery($delete_img_home_query);

				            $query = "DELETE FROM mainpage_data WHERE ID = {$the_home_id} ";
				            $delete_home_query = mysqli_query($connection, $query);
				            confirmQuery($delete_home_query);*/

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
