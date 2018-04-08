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
							include "pages/adicionar_cliente.php";
							break;
						case 'editar':
							include "pages/editar_cliente.php";
							break;
						case 'delete':
				            $the_client_id = escape($_GET['c_id']);
				            $query = "DELETE FROM clients WHERE CLIENTS_ID = {$the_client_id} ";
				            $delete_client_query = mysqli_query($connection, $query);
				            confirmQuery($delete_client_query);

						    header("Location: clientes.php?source=listar");
						    break;
						case 'view_images':
							include "pages/listar_imagens_servicos.php";
							break;
						default:
							include "pages/listar_clientes.php";
							break;
					}
				} else {
					include "pages/listar_clientes.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
