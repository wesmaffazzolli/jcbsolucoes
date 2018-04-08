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
						case 'editar':
							include "pages/contato.php";
							break;
						default:
							include "pages/contato.php";
							break;
					}

				} else {
					include "pages/contato.php";
				}

				?>

			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
