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
							include "pages/adicionar_categoria.php";
							break;
						case 'editar':
							include "pages/editar_categoria.php";
							break;
						case 'delete':
						    $the_category_id = $_GET['p_id'];
						    echo $the_category_id;
						    $query = "DELETE FROM categories WHERE ID = {$the_category_id} ";
						    $delete_category_query = mysqli_query($connection, $query);
						    confirmQuery($delete_category_query);

						    header("Location: categorias.php");
						    break;
						default:
							include "pages/listar_categorias.php";
							break;
					}
				} else {
					include "pages/listar_categorias.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
