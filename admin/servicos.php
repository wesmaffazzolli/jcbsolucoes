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
							include "pages/adicionar_servico.php";
							break;
						case 'editar':
							include "pages/editar_servico.php";
							break;
						case 'editar_cabecalho':
							include "pages/editar_cabecalho_servicos.php";
							break;
						case 'delete':
				            $the_service_id = $_GET['p_id'];
				            $query = "DELETE FROM services WHERE ID = {$the_service_id} ";
				            $delete_service_query = mysqli_query($connection, $query);
				            confirmQuery($delete_service_query);

						    header("Location: servicos.php"); 
						    break;
						case 'view_images':
							include "pages/listar_imagens_servicos.php";
							break;
						default:
							include "pages/listar_servicos.php";
							break;
					}
				} else {
					include "pages/listar_servicos.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
