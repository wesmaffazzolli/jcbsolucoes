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
							include "pages/adicionar_novidade.php";
							break;
						case 'editar':
							include "pages/editar_novidade.php";
							break;
						case 'delete':
				            $the_post_id = $_GET['p_id'];
				            $query = "DELETE FROM posts WHERE ID = {$the_post_id} ";
				            $delete_query = mysqli_query($connection, $query);
				            confirmQuery($delete_query);

						    header("Location: novidades.php"); 
						    break;
						default:
							include "pages/listar_novidades.php";
							break;
					}
				} else {
					include "pages/listar_novidades.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
