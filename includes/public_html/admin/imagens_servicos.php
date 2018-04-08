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
						case 'adicionar':
							include "pages/adicionar_imagens_servico.php";
							break;
						case 'editar':
							include "pages/editar_imagens_servico.php";
							break;
						case 'delete':
							$the_service_id = escape($_GET['s_id']);
				            $the_img_id = escape($_GET['img_id']);
				            $query = "DELETE FROM services_images WHERE ID = {$the_img_id} ";
				            $delete_img_service_query = mysqli_query($connection, $query);
				            confirmQuery($delete_img_service_query);

						    header("Location: imagens_servicos.php?source=listar&s_id=$the_service_id"); 
						    break;
						case 'listar':
							include "pages/listar_imagens_servicos.php";
							break;
						default:
							include "pages/listar_imagens_servicos.php";
							break;
					}
				} else {
					include "pages/listar_imagens_servicos.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
